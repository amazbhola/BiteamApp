<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request-> validate([
            'name'=>'required',
            'category_id'=>'required',
            'quantity'=>'required',
            'image' => 'file|max:512'
        ]);
        // dd($request->all()); for chack $request.
       
       try {
            $imagename = $request->name.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads',$imagename);
            $imageDb = 'storage/uploads/'.$imagename;
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'is_active' => $request->is_active,
                'slug' => Str::slug( $request->name),
                'image' => $imageDb
            ]);
            return redirect()->back()->with('success','Product Created Successfully.');
       } catch (\Exception $e) {
           Log::error($e->getMessage());
           return redirect()->back()->with('error','Something want worng...');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Categories::all();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $request-> validate([
            'name'=>'required',
            'category_id'=>'required',
            'quantity'=>'required',
            'image' => 'file|max:512'
        ]);
        // dd($request->all()); for chack $request.
       
       try {
                if ($request->hasFile('image')) {
                    $imagename = $request->name.'.'.$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('public/uploads',$imagename);
                    $imageDb = 'storage/uploads/'.$imagename;
                    Storage::delete($product->image);
                }
                $product->name = $request->name;
                $product->description = $request->description;
                $product->category_id = $request->category_id;
                $product->is_active = $request->is_active;
                $product->price = $request->price;
                $product->quantity = $request->quantity;
                $product->slug = Str::slug( $request->name);
                if (isset($imageDb)) {
                    $product->image = $imageDb ;
                }
                $product->update();

                return redirect()->back()->with('success','Product Update Successfully.');
       } catch (\Exception $e) {
                Log::error($e->getMessage());
                return redirect()->back()->with('error','Something want worng...');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->back()->with('success','Delete Product');
        } catch (\Exception $e) {
           Log::error($e->getMessage());
           return redirect()->back()->with('error','Something want worng');
        }
    }
}
