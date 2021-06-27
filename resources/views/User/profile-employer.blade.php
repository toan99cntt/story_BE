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
					@if(Session::has('yes'))
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong></strong>{{Session::get('yes')}}
					</div>
					@endif
					<form>
						
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Tên đăng nhập</label>
							<label class="col-sm-4 col-form-label">{{Auth::guard('employer')->user()->username}}</label>
							
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Email</label>
							<label class="col-sm-4 col-form-label">{{Auth::guard('employer')->user()->email}}</label>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Chức vụ</label>
							<label class="col-sm-4 col-form-label">Member</label>
							
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Ảnh đại diện</label>
							<div class="col-sm-8">
								<div >
									<img style="border-radius: 50%; border: 2px solid #E3E46B; width: 70px; height: 70px"  src="{{url('public/images/employer')}}/{{Auth::guard('employer')->user()->avatar}}" width="100%" alt="">
								</div>
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text">Ngày tạo</label>
							<label class="col-sm-4 col-form-label">{{Auth::guard('employer')->user()->created_at}}</label>
							
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