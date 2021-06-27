<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;
use App\admin;
class AudioController extends Controller
{
    public function index()
    {
        $audio=Audio::paginate(10);
        return view('Admin.audio.index',compact('audio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $admin=Admin::all();
        return view('Admin.audio.create', compact('admin'));
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
            'title'=>'required',
            'link'=>'required',
            'id_admin'=>'required'
        ];
        $msg=[
            'title.required'=>'Tên tiêu không được để trống',
            'link.required'=>'Link không được để trống',
            'id_admin.required'=>'Tác giả không được để trống'
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        
        Audio::create([
            'title'=>request()->title,
            'link'=>request()->link,
            'id_admin'=>request()->id_admin,
            'status'=>request()->status

        ]);
        return redirect()->route('audio.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audio=Audio::find($id);
        $admin=Admin::all();
        return view('Admin.audio.edit', compact('audio','admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ruly=[
            'title'=>'required',
            'link'=>'required',
            'id_admin'=>'required'
        ];
        $msg=[
            'title.required'=>'Tên tiêu không được để trống',
            'link.required'=>'Link không được để trống',
            'id_admin.required'=>'Tác giả không được để trống'
        ];
        $messages =[];
        $this->validate(request(), $ruly,$msg);
        
        Audio::where('id',$id)->update([
            'title'=>request()->title,
            'link'=>request()->link,
            'id_admin'=>request()->id_admin,
            'status'=>request()->status

        ]);
        return redirect()->route('audio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audio=Audio::find($id);
        
            $audio->delete();
            return redirect()->route('audio.index');
        
    }
}
