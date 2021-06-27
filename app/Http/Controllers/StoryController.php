<?php

namespace App\Http\Controllers;

use App\Story;
use App\Category;
use App\Author;
use App\Genre;
use App\Chapter;
use Illuminate\Http\Request;
use File;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $story=Story::paginate(10);
        return view('Admin.story.index',compact('story'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        $author=Author::all();
        $genre=Genre::all();
        return view('Admin.story.create', compact('category','author','genre'));
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
            'name'=>'required',
            'image'=>'required',
            'content'=>'required',
            'count'=>'required',
            'id_genre'=>'required',
            'id_author'=>'required',
            'id_category'=>'required'
        ];
        $msg=[
            'name.required'=>'Tên truyện không được để trống',
            'image.required'=>'Ảnh không được để trống',
            'content.required'=>'Mô tả không được để trống',
            'count.required'=>'Lượt xem không được để trống',
            'id_author.required'=>'Tên tác giả không được để trống',
            'id_genre.required'=>'Thể loại không được để trống',
            'id_category.required'=>'Danh mục không được để trống'
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        $image = request()->image->getClientOriginalName();
        $images = time().$image;
        request()->image->move(public_path('/images/story'),$images);
        Story::create([
            'name'=>request()->name,
            'image'=>$images,
            'content'=>request()->content,
            'status'=>request()->status,
            'count'=>request()->count,
            'id_genre'=>request()->id_genre,
            'id_author'=>request()->id_author,
            'id_category'=>request()->id_category

        ]);
        return redirect()->route('story.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story=Story::find($id);
        $category= Category::all();
        $author=Author::all();
        $genre=Genre::all();
        return view('Admin.story.edit', compact('story','category','author','genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $story=Story::find($id);
         $ruly=[
            'name'=>'required',
            
            'content'=>'required',
            'count'=>'required',
            'id_genre'=>'required',
            'id_author'=>'required',
            'id_category'=>'required'
        ];
        $msg=[
            'name.required'=>'Tên truyện không được để trống',
            
            'content.required'=>'Mô tả không được để trống',
            'count.required'=>'Lượt xem không được để trống',
            'id_author.required'=>'Tên tác giả không được để trống',
            'id_genre.required'=>'Thể loại không được để trống',
            'id_category.required'=>'Danh mục không được để trống'
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        if(empty(request()->image)){
            $images=$story->image;
        }else{
            $image=request()->image->getClientOriginalName();
            $images=time().$image;
            request()->image->move(public_path('images/story'),$images);    
        }
        Story::where('id',$id)->update([
            'name'=>request()->name,
            'image'=>$images,
            'content'=>request()->content,
            'status'=>request()->status,
            'count'=>request()->count,
            'id_genre'=>request()->id_genre,
            'id_author'=>request()->id_author,
            'id_category'=>request()->id_category
        ]);
        return redirect()->route('story.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story=Story::find($id);
        $chapter= Chapter::where('id_story',$id)->count();
        if($chapter>0){
            return redirect()->route('story.index');
        }else{
            $img= public_path('images/story').$story->image;
            if(File::exists($img)){
                File::delete($img);
            }
            $story->delete();
                return redirect()->route('story.index');
        }
    }
}
