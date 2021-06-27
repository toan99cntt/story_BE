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
					<table class="table table-inverse">
						<tbody>
							<?php foreach ($list as $list): ?>
								<tr>
									<td><img src="{{url('public/images/story')}}/{{$list->story->image}}" alt="" width="50px"></td>
									<td><a class="text-dark font-weight-bold" style="font-size: 13px;" href="{{route('story.detail',$list->id_story)}}" title="">{{$list->story->name}}</a>
										<br><small>{{$list->story->author->name}}</small></td>
										<td><small>{{$list->story->genre->name}}</small></td>
								</tr>	
							<?php endforeach ?>
							
						</tbody>
					</table>
					<div>{{ $list->links('vendor.pagination.simple-bootstrap-4') }}</div>
				</div>
			</div>
			<div class="col-md-3">
				
			</div>
		</div>
		


		@stop()