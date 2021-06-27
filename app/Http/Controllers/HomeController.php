<?php

namespace App\Http\Controllers;

use App\Home;
use App\Story;
use App\Audio;
use App\Chapter;
use App\Genre;
use App\Category;
use App\Comment;
use App\Love_list;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB, Session;
use Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(isset($_COOKIE["genre"])){
            $val=$_COOKIE["genre"];
            if($val==0){
                $story=DB::table('story')->inRandomOrder()->limit(12)->get();
            }
            else{
                $story= Story::where('id_genre',$val)->inRandomOrder()->limit(12)->get();
            }
        }else{
            $story=DB::table('story')->inRandomOrder()->limit(12)->get();
        }
        if(isset($_COOKIE["hot"])){
            $hot=$_COOKIE["hot"];
            if($hot==0){
                $story_hot= Story::orderBy('count','DESC')->limit(8)->get();            }
            else{
                $story_hot= Story::where('id_genre',$hot)->orderBy('count','DESC')->limit(8)->get();
            }
        }else{
            $story_hot= Story::orderBy('count','DESC')->limit(8)->get();
        }

        // $story= DB::table('story')->inRandomOrder()->limit(12)->get();
        $genre= Genre::all();
        // $story_hot= Story::orderBy('count','DESC')->limit(8)->get();
        $chapter_new= Chapter::orderBy('created_at','DESC')->limit(5)->get();
        $audio=DB::table('audio')->inRandomOrder()->limit(2)->get();
        $story_full= Story::where('status','0')->inRandomOrder()->limit(4)->get();
        return view('index',compact('story','genre','story_hot','story_full','chapter_new','audio'));
    }
    
    public function story_detail($id_story)
    {
    	$story= Story::find($id_story);
        $story->count= $story->count+1;
        $story->save();
        $cmt=Comment::where('id_story', $id_story)->paginate(8);
        $story_hot= Story::orderBy('count','DESC')->limit(8)->get();
    	$chapter= Chapter::where('id_story',$id_story)->paginate(10);
        $chapter_new= Chapter::where('id_story',$id_story)->orderBy('created_at','DESC')->limit(5)->get();
        if(Auth::guard('employer')->check()){
            $love=DB::table('love_list')->where('id_story',$id_story)->where('id_employer',Auth::guard('employer')->user()->id)->count();
       
            return view('User.truyen-detail', compact('story','chapter','chapter_new','story_hot','love','cmt'));
        }
        
        return view('User.truyen-detail', compact('story','chapter','chapter_new','story_hot','cmt'));


    }
    public function chapter($id_chap,$id_story)
    {
    	$count=Chapter::where('id_story',$id_story)->count();
    	$chapter= Chapter::where('number_chap',$id_chap)->where('id_story',$id_story)->first();
        return view('User.story', compact('chapter','count'));

    }
    public function search()
    {
        // dd(request()->search);
        $story_hot= Story::orderBy('count','DESC')->paginate(8);
        $search= request()->search;
        $search_story= Story::where('name','LIKE','%'.$search.'%')->get();
        return view('User.search',compact('search_story','story_hot'));
    }
    public function list_story($id_gen)
    {
        $gen= Genre::find($id_gen);
        if(isset($_COOKIE["select_1"])){
            $val=$_COOKIE["select_1"];
            if($val==0){
                $story= Story::where('id_genre',$id_gen)->paginate(4);
            }
            else if($val==1){
                $story= Story::where('id_genre',$id_gen)->orderBy('created_at','DESC')->paginate(8);
            }
            else{
                $story= Story::where('id_genre',$id_gen)->orderBy('count','DESC')->paginate(8);
            }
        }
        else if(isset($_COOKIE["select_2"])){
            $val2=$_COOKIE["select_2"];
            if($val2==0){
                $story= Story::where('id_genre',$id_gen)->paginate(8);
            }
            else if($val2==1){
                $story= Story::where('id_genre',$id_gen)->orderBy('name','ASC')->paginate(8);
            }
            else{
                $story= Story::where('id_genre',$id_gen)->orderBy('name','DESC')->paginate(8);
            }
        }else{
            $story= Story::where('id_genre',$id_gen)->paginate(8);
        }

        // $story= Story::where('id_genre',$id_gen)->paginate(4);
        $story_hot= Story::where('id_genre',$id_gen)->orderBy('count','DESC')->limit(6)->get();
        $story_full= Story::where('status','0')->limit(4)->inRandomOrder()->get();
        return view('User.list-truyen',compact('story','story_full','gen','story_hot'));
    }
    
    public function love($id) 
    {
        if(Auth::guard('employer')->check()){
            $id_emp= Auth::guard('employer')->user()->id;
            $love=DB::table('love_list')->where('id_story',$id)->where('id_employer',$id_emp)->count();
            if($love==0){

             Love_list::create([
                'id_story'=>$id,
                'id_employer'=>$id_emp
             ]);
            }
            else{
                DB::table('love_list')->where('id_story',$id)->where('id_employer',$id_emp)->delete();
            }
            
         return redirect()->back();
        }
        else{
             return redirect()->route('login');
        }
       
    }
    public function comment($id_story)
    {
        
        if(Auth::guard('employer')->check()){
                $ruly=[
                'content'=>'required'
            ];

            $msg=[
                'content.required'=>'Nội dung bình luận không được để trống'
                
            ];
            $message=[];
            $this->validate(request(),$ruly,$msg);
            $id_emp= Auth::guard('employer')->user()->id;
             Comment::create([
                'id_story'=>$id_story,
                'id_employer'=>$id_emp,
                'content'=>request()->content
             ]);
            
         return redirect()->back();
        }
        else{
             return redirect()->route('login');
        }
    }
    public function audio()
    {
        $story_hot=Story::orderBy('count','DESC')->paginate(8);
        $audio=Audio::paginate(3);
        return view('User.audio',compact('story_hot','audio'));
    }
}
