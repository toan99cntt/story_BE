<?php

namespace App\Http\Controllers;

use App\Employer;
use File;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer= Employer::paginate(10);
        return view('Admin.employer.index',compact('employer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.employer.create');
        
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
        
        "username"=>'required|unique:employer',
        "password"=>'required',
        "avatar"=>'required',
        "email"=>'required|unique:employer'

    ];
    $msg=[
        
        "avatar.required"=>'Ảnh đại diện không được bỏ trống',
        "username.required"=>'Tên tài khoản không được bỏ trống',
        "username.unique"=>'Tên tài khoản đã được đăng ký',
        "password.required"=>'Mật khẩu không được bỏ trống',
        "email.required"=>'Email không được bỏ trống',
        "email.unique"=>'Email đã được đăng ký'
    ];
    $message=[];
    $this->validate(request(),$rule,$msg);
    $image=request()->avatar->getClientOriginalName();
    $images=time().$image;
        // dd(request()->all());
    request()->avatar->move(public_path('images/employer'),$images);
    Employer::create([
       
        "username"=> request()->username,
        "password"=> bcrypt($request->password),
        "email"=> request()->email,
        "avatar"=>$images

    ]);
    return redirect()->route('employer.index');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = Employer::find($id);
        return view('Admin.employer.edit',compact('employer'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $employer = Employer::find($id);

        $rule=[
           
            "username"=>'required',
            "password"=>'required',
            "email"=>'required'

        ];
        $msg=[
           
            "username.required"=>'Tên tài khoản không được bỏ trống',
            "username.unique"=>'Tên tài khoản đã được đăng ký',
            "password.required"=>'Mật khẩu không được bỏ trống',
            "email.required"=>'Email không được bỏ trống',
            "email.unique"=>'Email đã được đăng ký'
        ];
        $message=[];
        $this->validate(request(),$rule,$msg);

        if(empty(request()->avatar)){
            $images= $employer->avatar;
        }
        else{
            $image=request()->avatar->getClientOriginalName();
            $images=time().$image;
            request()->avatar->move(public_path('images/employer'),$images);
        }
        Employer::where('id',$id)->update([
            
            "username"=> request()->username,
            "password"=> bcrypt(request()->password),
            "email"=> request()->email,
            "avatar"=>$images

        ]);
        return redirect()->route('employer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer = Employer::find($id);
        $img=public_path('images/story').$employer->avatar;
        if(File::exists($img)){
            File::delete($img);
        }
        $employer->delete();
        return redirect()->route('employer.index');

    }
}
