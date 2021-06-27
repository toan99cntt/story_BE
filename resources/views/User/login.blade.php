@extends('master')
@section('title','Đăng nhập & đăng ký')
@section('main')
<main class="body">
		<div class="container main">
			<div class="col-md-12 dangnhap">
				<th>Đăng nhập</th>
			</div>
			
			<div class="row">
				<div class="col-md-6 from from-login">
					<form method="POST" action="">
						@csrf
						
						<fieldset class="form-group">
							<label>Tên đăng nhập</label>
							<input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
							@error('username')
								<small style="color: red">{{$message}}</small>
							@enderror
						</fieldset>
						<fieldset class="form-group">
							<label>Mật khẩu</label>
							<input type="password" class="form-control" placeholder="Mật khẩu" name="password">
							@error('password')
								<small style="color: red">{{$message}}</small>
							@enderror
						</fieldset>
						<fieldset class="form-group">
							<input type="checkbox" name="remember" > Ghi nhớ mật khẩu
						</fieldset>

						<button type="submit" class="btn">Đăng nhập</button>
						<a href="{{route('sign')}}"  class="btn1" title="">Đăng ký</a>
					</form>
				</div>
				<div class="col-md-6">
					<div class="col-md-8">
						<p class="fb"><i class="fab fa-facebook-f"></i> Đăng nhập bằng tài khoản Facebook</p>
					</div>
					<div class="col-md-8">
						<p class="gg"><i class="fab fa-google"></i> Đăng nhập bằng tài khoản Google</p>
					</div>
				</div>
			</div>
@stop()