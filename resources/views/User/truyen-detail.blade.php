@extends('master')

@section('title','Thông tin truyện')
@section('main')
<main class="body">
	<p class="scrollTop btn"><i class="fas fa-arrow-up"></i></p>
	<div class="container main">
		<div class="col-md-12 back">
			<p><i class="fas fa-home"></i></i><a href="{{route('home')}}" title="trang chủ"> Trang chủ </a> <i class="fas fa-caret-right"></i><a href="{{route('list.story',$story->id_genre)}}" title=""> {{$story->genre->name}}</a> <i class="fas fa-caret-right"></i><a href="{{route('story.detail',$story->id)}}" title=""> {{$story->name}}</a></p>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12">
					<div class="tttruyen">
						<p>thông tin truyện</p>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="image">
								<img src="{{url('public/images/story')}}/{{$story->image}}" width="100%" alt="">
							</div>
							<div class="thongtintruyen mt-4" style="font-size: 12px">
								<label><i class="fas fa-folder-open"></i> Thể loại: {{$story->genre->name}}</label>
								<label><i class="fas fa-user"></i> Tác giả: {{$story->author->name}}</label>
								<label><i class="far fa-eye"></i> Lượt xem: {{number_format($story->count)}}</label>
								<label><i class="fas fa-star"></i> Trạng thái: {{$story->status?"Còn tiếp...":"Hoàn thành"}}</label>
								<label><i class="fas fa-sync-alt"></i>{{$story->created_at}}</label>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tentruyen">
								<p>{{$story->name}}</p>
							</div>
							<div class="danhgia">
								<a href="" title="" class="star-1"><i class="fas fa-star"></i></a>
								<a href="" title="" class="star-2"><i class="fas fa-star"></i></a>
								<a href="" title="" class="star-3"><i class="fas fa-star"></i></a>
								<a href="" title="" class="star-4"><i class="fas fa-star"></i></a>
								<a href="" title="" class="star-5"><i class="fas fa-star"></i></a><label>Đánh giá: 9/10 từ 3 lượt</label>
								
							</div>
							
							<div class="thongtintruyen">
								<p>Giới thiệu với các bạn bộ truyện cực hot: {{$story->name}}</p>
								<p>Mời các bạn cùng theo dõi</p>
								<p style="font-weight: bold;">TÓM TẮT TRUYỆN:</p>
								<p>{!! nl2br(e($story->content)) !!}</p>
								
							</div>
							<div class="btn-story text-center">
								<a class="btn-chapter btn" title=""><i class="fas fa-indent"></i> Danh sách chương</a>
								<a class="btn" href="" title=""><i class="far fa-eye"></i> Đọc truyện</a>
								@if(Auth::guard('employer')->check())
								<a class="btn" href="{{route('love',$story->id)}}" title=""><i class="fas fa-heart {{$love==1?'text-danger':''}}"></i> Thêm Yêu thích</a>
								@else
								<a class="btn" href="{{route('love',$story->id)}}" title=""><i class="fas fa-heart"></i> Thêm Yêu thích</a>
								@endif

							</div>
						</div>
					</div>
					<div class="danhsach">
						<ul>
							<li style="text-transform: uppercase; font-size: 17px; border-bottom: 1px solid #D2CFCF"><i class="fas fa-indent"></i> 5 chương mới nhất của truyện {{$story->name}}</li>
							<?php foreach ($chapter_new as $value): ?>
								<li><a href="{{route('chapter',['id_chap'=>$value->number_chap,'id_story'=>$value->id_story])}}" title="">Chương {{$value->number_chap}} - {{$value->name_chap}}</a></li>
							<?php endforeach ?>
							
							
						</ul>
						<ul>
							<li style="text-transform: uppercase; font-size: 17px; border-bottom: 1px solid #D2CFCF"><i class="fas fa-indent"></i> danh sách chương truyện {{$story->name}}</li>
							<?php foreach ($chapter as $chap): ?>

								<li>
									<a href="{{route('chapter',['id_chap'=>$chap->number_chap,'id_story'=>$chap->id_story])}}" title="">Chương {{$chap->number_chap}} - {{
										$chap->name_chap}}</a>
									</li>

								<?php endforeach ?>

							</ul>

						</div>
						<div style="margin-bottom: 60px; border: none; font-size: 10px">{{ $chapter->links('vendor.pagination.simple-bootstrap-4') }}</div>
							<div class="comment">
								<div class="tttruyen">
									<p><i class="fas fa-comments"></i> bình luận truyện</p>
								</div>
								<div class="nhapcmt">
									<form action="{{route('comment',$story->id)}}" method="post" accept-charset="utf-8">
										@csrf
										<textarea class="area p-2" name="content" placeholder="Nhập tối thiểu 3 ký tự và tối đa 500 ký tự"></textarea>
										@error('content')
										<small class="text-danger">{{$message}}</small>
										@enderror
										<button type="submit" class="btn btn-primary gui"  title="Gửi"><i class="fas fa-paper-plane"></i> Gửi</button>
									</form>
								</div>
								<div class="nguoicmt">
									<table class="table table-inverse">
										<tbody>
											<?php foreach ($cmt as $val): ?>
												<tr>
													<td style="width: 50px; "><img style="padding:2px;border-radius: 49%; border:3px solid #EEDA33; " src="{{url('public/images/employer')}}/{{$val->employer->avatar}}" alt="" width="60px"></td>
													<td><a class="font-weight-bold text-decoration-none text-dark" style=" font-size: 16px">{{$val->employer->username}}</a><br><label style="font-size: 11px; color:#D2CFCF "><i class="far fa-clock"></i> {{$val->created_at}}</label><br><label style="font-size: 14px">{!! nl2br(e($val->content)) !!}</label></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
									<div style="margin-bottom: 60px; border: none; font-size: 10px">{{ $cmt->links('vendor.pagination.simple-bootstrap-4') }}</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="rank col-md-12 ">
							<th>TRUYỆN HOT</th>
						</div>
						<table class="table table-striped">
							<tbody>
								<tr></tr>
								<?php $i=1; foreach ($story_hot as $value): ?>
								<tr>
									<td style="padding-top:11px"><label  class="btn {{$i==1?'btn-danger':''}} 
										{{$i==2?'btn-warning':''}} {{$i==3?'btn-success':''}}">{{$i}}</label></td>
										<td><a class="font-weight-bold text-decoration-none text-dark" href="{{route('story.detail',$value->id)}}" style=" font-size: 14.5px">{{$value->name}}</a><br><label style="font-size: 12px">{{$value->genre->name}}</label></td>
									</tr>
									<?php $i++; endforeach ?>

								</tbody>
							</table>
						</div>
					</div>
					@stop()