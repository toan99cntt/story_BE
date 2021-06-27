<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_login()
    {
        return view('Admin.admin.login');
    }
    public function admin_login_post()
    {
        if(Auth::attempt(request()->only('email','password'))){
            return redirect()->route('admin.index');
        }
            return redirect()->back();
    }
    public function index()
    {
        $admin= Admin::paginate(10);
        return view('Admin.admin.index',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.admin.create');
        
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
            
            "username"=>'required|unique:admin',
            "password"=>'required',
            "email"=>'required|unique:admin'

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
        
        Admin::create([
           
            "username"=> request()->username,
            "password"=> bcrypt($request->password),
            "email"=> request()->email
            

        ]);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('Admin.admin.edit',compact('admin'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $admin = Admin::find($id);

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
        Admin::where('id',$id)->update([
            
            "username"=> request()->username,
            "password"=> bcrypt(request()->password),
            "email"=> request()->email

        ]);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.index');

    }
}
