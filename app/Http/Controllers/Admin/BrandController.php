<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        try {
            $imagename = $request->name.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads',$imagename) ;
            $imageDbPath = 'storage/uploads/'.$imagename;

            Brand::create([
                'name' => $request->name,
                'image' => $imageDbPath
                ]);
            return redirect()->back()->with('success','Brand Item Created...');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Something want wrong .....');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        
        $request->validate([
            'name' => 'required',
            'image' => 'file|max:512'

        ]);
        try {
            if ($request->hasFile('image')) {
                $imagename = $request->name.'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('public/uploads',$imagename) ;
                $imageDbPath = 'storage/uploads/'.$imagename;
                Storage::delete($brand->image);
            }

            $brand->name = $request->name;
            if (isset($imageDbPath)) {
                $brand->image = $imageDbPath ;
            }
            $brand->update();
            return redirect()->back()->with('success','Brand Update Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Something Wrong....');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
