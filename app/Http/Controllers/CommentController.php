<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Story;
use App\Employer;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmt= Comment::paginate(10);
        return view('Admin.comment.index',compact('cmt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $story= Story::all();
        $employer= Employer::all();
        return view('Admin.comment.create',compact('story','employer'));

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
            'id_story'=>'required',
            'id_employer'=>'required',
            'content'=>'required',
            
            
        ];
        $msg=[
            'id_employer.required'=>'Tên truyện không được để trống',
            'id_story.required'=>'Ảnh không được để trống',
            'content.required'=>'Mô tả không được để trống'
            
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        Comment::create([
            'id_story'=>request()->id_story,
            'id_employer'=>request()->id_employer,
            'content'=>request()->content,
            'status'=>request()->status
        ]);
        return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story= Story::all();
        $employer= Employer::all();
        $cmt=Comment::find($id);
        return view('Admin.comment.edit',compact('cmt','story','employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ruly=[
            'content'=>'required'
        ];
        $msg=[
            
            'content.required'=>'Mô tả không được để trống'
            
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        Comment::where('id',$id)->update([
            'id_story'=>request()->id_story,
            'id_employer'=>request()->id_employer,
            'content'=>request()->content,
            'status'=>request()->status
        ]);
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id',$id)->delete();
        return redirect()->route('comment.index');
        
    }
}
