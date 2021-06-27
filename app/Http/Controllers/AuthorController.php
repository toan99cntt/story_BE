<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $author= Author::paginate(10);
        return view('Admin.author.index',compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.author.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rule=[
            "name"=>'required',
            "username"=>'required|unique:author',
            "password"=>'required',
            "email"=>'required|unique:author'

        ];
        $msg=[
            "name.required"=>'Tên người dùng không được bỏ trống',
            "username.required"=>'Tên tài khoản không được bỏ trống',
            "username.unique"=>'Tên tài khoản đã được đăng ký',
            "password.required"=>'Mật khẩu không được bỏ trống',
            "email.required"=>'Email không được bỏ trống',
            "email.unique"=>'Email đã được đăng ký'
        ];
        $message=[];
        $this->validate(request(),$rule,$msg);
        Author::create([
            "name"=> request()->name,
            "username"=> request()->username,
            "password"=> bcrypt(request()->password),
            "email"=> request()->email
        ]);
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      

        $author=Author::find($id);
        return view('Admin.author.edit',compact('author'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // dd(request()->all());
        $rule=[
            "name"=>'required',
            "username"=>'required',
            "password"=>'required',
            "email"=>'required'

        ];
        $msg=[
            "name.required"=>'Tên người dùng không được bỏ trống',
            "username.required"=>'Tên tài khoản không được bỏ trống',
            "password.required"=>'Mật khẩu không được bỏ trống',
            "email.required"=>'Email không được bỏ trống',
           
        ];
        
        $message=[];

        $this->validate(request(),$rule,$msg);
        
        Author::where('id',$id)->update([
            "name"=> request()->name,
            "username"=> request()->username,
            "password"=> request()->password,
            "email"=> request()->email
        ]);
        
        return redirect()->route('author.index');
        
        
    }

    public function destroy($id)
    {
        Author::where('id',$id)->delete();
        return redirect()->route('author.index');
        
    }
}
