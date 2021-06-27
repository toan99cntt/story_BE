<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::paginate(10);
        return view('Admin.category.index',compact('category')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruly=[
            'name'=>'required|unique:category'
            
        ];
        $msg=[
            'name.required'=>'Tên đanh mục không được bỏ trống',
            'name.unique'=>'Tên danh mục bị trùng lặp'
        ];
        $message=[];
        $this->validate(request(),$ruly,$msg);
        Category::create([
            'name'=>request()->name,
            'status'=>request()->status

        ]);
        // dd(request()->all());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        return view('Admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ruly=[
            'name'=>'required|unique:category'
        ];
        $msg=[
            'name.required'=>'Tên danh mục không được để trống',
            'name.unique'=>'Tên danh mục trùng lặp'
        ];
        $message=[];
        $this->validate(request(),$ruly,$msg);
        Category::where('id',$id)->update([
            'name'=>request()->name,
            'status'=>request()->status
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('category.index');
    }
}
