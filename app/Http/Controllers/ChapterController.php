<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Story;
use Illuminate\Http\Request;
use DB;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter= Chapter::paginate(10);
        return view('Admin.chapter.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $story= Story::all();
        return view('Admin.chapter.create', compact('story'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $number= DB::table('chapter')->where('id_story', request()->id_story)->max('number_chap');
        $number_chap= $number+1;
        $ruly=[
            'name_chap'=>'required',
            'content'=>'required',
            'id_story'=>'required'
        ];
        $msg=[
            'name_chap.required'=>'Tên chương không được để trống',
            'content.required'=>'Nội dung không được để trống',
            'id_story.required'=>'Truyện không được để trống'
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        Chapter::create([
            'name_chap'=>request()->name_chap,
            'number_chap'=>$number_chap,
            'content'=>request()->content,
            'id_story'=>request()->id_story

        ]);
        return redirect()->route('chapter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story= Story::all();
        $chapter= Chapter::find($id);
        return view('Admin.chapter.edit', compact('story','chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ruly=[
            'name_chap'=>'required',
            'number_chap'=>'required',
            'content'=>'required',
            'id_story'=>'required'
        ];
        $msg=[
            'name_chap.required'=>'Tên chương không được để trống',
            'number_chap.required'=>'Số chương không được để trống',
            // 'number_chap.unique'=>'Số chương không được trùng',
            'content.required'=>'Nội dung không được để trống',
            'id_story.required'=>'Truyện không được để trống'
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        Chapter::where('id',$id)->update([
            'name_chap'=>request()->name_chap,
            'number_chap'=>request()->number_chap,
            'content'=>request()->content,
            'id_story'=>request()->id_story

        ]);
        return redirect()->route('chapter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::where('id',$id)->delete();
        return redirect()->route('chapter.index');

    }
}
