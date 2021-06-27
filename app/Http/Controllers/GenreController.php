<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre= Genre::paginate(10);
        return view('Admin.genre.index',compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.genre.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $ruly=[
            'name'=>'required|unique:genre'
        ];

        $msg=[
            'name.required'=>'Tên thể lại không được để trống',
            'name.unique'=>'Tên danh mục bị trùng'
        ];
        $message=[];
        $this->validate(request(),$ruly,$msg);
        // dd(request()->all());
        Genre::create([
            'name'=>request()->name
        ]);
        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre= Genre::find($id);
        return view('Admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ruly=[
            'name'=>'required|unique:genre'
        ];

        $msg=[
            'name.required'=>'Tên thể lại không được để trống',
            'name.unique'=>'Tên danh mục bị trùng'
        ];
        $message=[];
        $this->validate(request(),$ruly,$msg);
        // dd(request()->all());
        Genre::where('id',$id)->update([
            'name'=>request()->name
        ]);
        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::where('id',$id)->delete();
        return redirect()->route('genre.index');

    }
}
