@extends('master')
@section('title','Đăng nhập & đăng ký')
@section('main')
<main class="body">
		<div class="container main">
			<div class="col-md-12 dangnhap">
				<th>Đăng nhập</th>
			</div>
			
			<div class="row">
				<div class="col-md-6 from from-sign">
					<form method="POST" action="{{route('sign_post')}}">
						@csrf
						
						
						<fieldset class="form-group">
							<label>Tên đăng nhập</label>
							<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
							@error('username')
							<small style="color: red">{{$message}}</small>
							@enderror
						</fieldset>
						<fieldset class="form-group">
							<label>Mật khẩu</label>
							<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
							@error('password')
							<small style="color: red">{{$message}}</small>
							@enderror
						</fieldset>
						<fieldset class="form-group">
							<label>Nhập lại mật khẩu</label>
							<input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu">
							@error('repassword')
							<small style="color: red">{{$message}}</small>
							@enderror
						</fieldset>
						<fieldset class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email" placeholder="Email">
							@error('email')
							<small style="color: red">{{$message}}</small>
							@enderror
						</fieldset>
						
						<a href="{{route('login')}}" class="btn2 " title="">Đăng nhập</a>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Launch demo modal
				</button>
				<!-- Modal -->
				
						<!-- <a  type="submit" class="btn btn3" title="">Đăng ký</a> -->
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
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

							</div>
						</div>
					</div>
				</div>
@stop()