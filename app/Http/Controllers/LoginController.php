<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use Auth;
use Hash;
use App\Genre;
use App\Love_list;
use App\Category;
class LoginController extends Controller
{
    //function login
	public function login()
	{
        
       return view('User.login');
    }
   
   public function login_post()
   {
    $rule=[
        "username"=>'required',
        "password"=>'required'
    ];
    $msg=[

        "username.required"=>'Tên tài khoản không được bỏ trống',
        "password.required"=>'Mật khẩu không được bỏ trống'

    ];
    $message=[];
    $this->validate(request(),$rule,$msg);
    $check=Auth::guard('employer')->attempt(request()->only('username','password'));

    if($check){
        return redirect()->route('home');
    }
    return redirect()->back();

}

    //function sihn
public function sign()
{
  return view('User.sign');

}

public function sign_post()
{
        	// dd(request()->all());
    $rule=[

        "username"=>'required|unique:employer',
        "password"=>'required',
        "repassword"=>'required|same:password',
        "email"=>'required|unique:employer'

    ];
    $msg=[

        "username.required"=>'Tên tài khoản không được bỏ trống',
        "username.unique"=>'Tên tài khoản đã được đăng ký',
        "password.required"=>'Mật khẩu không được bỏ trống',
        "repassword.required"=>'Mật khẩu không được bỏ trống',
        "repassword.same"=>'Mật khẩu không không giống nhau',
        "email.required"=>'Email không được bỏ trống',
        "email.unique"=>'Email đã được đăng ký'
    ];
    $message=[];
    $this->validate(request(),$rule,$msg);
    Employer::create([
        'name'=>request()->name,
        "username"=> request()->username,
        "password"=> bcrypt(request()->password),
        "email"=> request()->email

    ]);
    return redirect()->route('login');
}

    public function logout()
    {
       Auth::guard('employer')->logout();
       return redirect()->route('home');
    }
    public function em_profile()
    {

        return view('User.profile-employer');
    }
    public function edit_profile()
    {
        return view('User.edit-profile');
    }
    public function edit_profile_post()
    {
        $id=Auth::guard('employer')->user()->id;
        $email=Auth::guard('employer')->user()->email;
        $username=Auth::guard('employer')->user()->username;
        $image=Auth::guard('employer')->user()->avatar;


        $rule=[
            "password"=>'required',
            "username"=>'required',
            "email"=>'required'
        ];
        $msg=[

            "username.required"=>'Tên đăng nhập không được bỏ trống',
            "email.required"=>'Email không được bỏ trống',
            "password.required"=>'Mật khẩu không được bỏ trống'
        ];
        $message=[];

        $this->validate(request(),$rule,$msg);
        
        if(Hash::check(request()->password,Auth::guard('employer')->user()->password)==false){
                return redirect()->route('edit.profile')->with('no','Mật khẩu không chính xác');
        }
        else{
                
            if(empty(request()->image)){
                $images=$image; 
            }
            else{
            $image=request()->image->getClientOriginalName();
            $images=time().$image;
            request()->image->move(public_path('images/employer'),$images);
        }
            if(request()->email==$email && request()->username==$username){
                Employer::where('id',$id)->update([
                    "avatar"=> $images
                ]);
                return redirect()->route('em.profile')->with('yes','Cập nhật thông tin thành công !');
            }
            else if(request()->email==$email){
                Employer::where('id',$id)->update([
                    "username"=> request()->username,
                    "avatar"=> $images
                ]);
                return redirect()->route('em.profile')->with('yes','Cập nhật thông tin thành công !');
                
            }
            else if(request()->username==$username){
                Employer::where('id',$id)->update([
                    "email"=> request()->email,
                    "avatar"=> $images
                ]);
                return redirect()->route('em.profile')->with('yes','Cập nhật thông tin thành công !');
            }
            else{
                Employer::where('id',$id)->update([
                    "email"=> request()->email,
                    "username"=> request()->username,
                    "avatar"=> $images

                ]);
                return redirect()->route('em.profile')->with('yes','Cập nhật thông tin thành công !');

            }
        }
    }
    public function edit_pword()
    {
        return view('User.edit-password');
    }
    public function edit_pword_post()
    {
        $id=Auth::guard('employer')->user()->id;
        $rule=[
            "password"=>'required',
            "newpassword"=>'required',
            "repassword"=>'required|same:newpassword'
        ];
        $msg=[

            "password.required"=>'Mật khẩu không được bỏ trống',
            "newpassword.required"=>'Mật khẩu không được bỏ trống',
            "repassword.required"=>'Mật khẩu không được bỏ trống',
            "repassword.same"=>'Mật khẩu không giống mật khẩu mới'
        ];
        $message=[];

        $this->validate(request(),$rule,$msg);
        if(Hash::check(request()->password,Auth::guard('employer')->user()->password)==false){
            return redirect()->route('edit.password')->with('no','Mật khẩu không chính xác !');
        }else{
            Employer::where('id', $id)->update(['password'=>bcrypt(request()->newpassword)]);
            return redirect()->route('em.profile')->with('yes','Đổi mật khẩu thành công !');
        }
    }
    public function love_list()
    {
        $id= Auth::guard('employer')->user()->id;
        $list= Love_list::where('id_employer',$id)->paginate(5);
        return view('User.love-list', compact('list'));
    }
}
