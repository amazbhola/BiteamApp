<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::get()->all();
       return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name'=>'required'
        ]);
     try{
        Categories::create([
            'name' => $request->name
        ]);
        // return redirect(route('categories.create'))->with('status','Category Name Saved');
        return redirect()->back()->with('status','Category Name Saved');
     }catch(\Exception $e){
            Log::error($e->getMessage());
           
            return redirect()->back()->with('error','Something want wrong....');
     }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $editById = Categories::find($id);
            return view('admin.categories.edit',compact('editById'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
    try {
        $catecory = Categories::find($id);
        $catecory->name = $request->name;
        $catecory->update();
        return redirect()->back()->with('success','Category updated..');
    } catch (\Exception $e) {
        Log::error( $e->getMessage());
        return redirect()->back()->with('error','Something want wrong....');
    }
        
       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $catecory = Categories::find($id);
            $catecory->delete();
            return redirect()->back()->with('success','Category deleted..');
        } catch (\Exception $e) {
            Log::error( $e->getMessage());
            return redirect()->back()->with('error','Something want wrong....');
        }
    }
}
