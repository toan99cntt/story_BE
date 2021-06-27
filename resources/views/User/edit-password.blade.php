@extends('master')
@section('title','Thông tin độc giả')
@section('main')
<main class="body">
	<div class="container main">
		<div class="row">
			<div class="col-md-3 mt-2">
				<ul class="list-group">
					<li><i class="fa fa-address-card"></i> <a href="{{route('em.profile')}}" title="">Thông tin tài khoản</a></li>
					<li><i class="fas fa-edit"></i> <a href="{{route('edit.profile')}}" title="">Thay đổi thông tin</a></li>
					<li><i class="fas fa-key"></i> <a href="{{route('edit.password')}}" title="">Thay đổi mật khẩu</a></li>
					<li><i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/profile.php?id=100026299986775" title="">Hỗ trợ hỏi đáp tróng group 24/24</a></li>
					<li><i class="fa fa-heart"></i> <a href="{{route('love.list')}}" title="">Truyện yêu thích</a></li>
					<li style="border-bottom: 0.5px solid #dddddd"><i class="fa fa-sign-out"></i> <a href="{{route('logout')}}" title="">Thoát</a></li>
				</ul>
			</div>
			<div class="col-md-6">
				<div class="col-md-12 title-profile">
					<th>Thay đổi thông tin tài khoản</th>
				</div>
				<div class="col-md-12 mt-3">
					@if(Session::has('no'))
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Lỗi! </strong> {{Session::get('no')}}
					</div>
					@endif
					<form action="{{route('edit.password.post')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Mật khẩu cũ</label>
							<div class="col-sm-8">
								<input type="password" name="password" class="form-control">
								@error('password')
								<small style="color: red">{{$message}}</small><br>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Mật khẩu mới</label>
							<div class="col-sm-8">
								<input type="password" name="newpassword" class="form-control">
								@error('newpassword')
								<small style="color: red">{{$message}}</small><br>
								@enderror
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Nhập lại mật khẩu</label>
							<div class="col-sm-8">
								<input type="password" name="repassword" class="form-control">
								@error('repassword')
								<small style="color: red">{{$message}}</small><br>
								@enderror
								<button style="font-size: 15px" type="submit" class="btn-edit">Chỉnh sửa</button>
							</div>
						</div>

						
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="col-md-12 title-profile">
					<th>Nội quy</th>
				</div>
				<div class="rule">
					<p>- Các bạn vui lòng tuân thủ nội quy của web truyện</p>
					<p>- Mọi thắc mắc xin vui lòng liên hệ với admin để được giải quyết.</p>
				</div>
			</div>
		</div>
		


		@stop()