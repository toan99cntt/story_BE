@extends('master')

@section('title','Thông tin truyện')
@section('main')
<main class="body">
	<p class="scrollTop btn"><i class="fas fa-arrow-up"></i></p>
	<div class="container main">
		<div class="col-md-12 back">
			<p><i class="fas fa-home"></i></i><a href="{{route('home')}}" title="trang chủ">Trang chủ </a> <i class="fas fa-caret-right"></i><a  title=""> Tìm kiếm</a></p>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12">
					<div class="tt-search">
						<p style="font-size: 17px;">Tìm kiếm với từ khóa" <a style="font-weight: bold;"><?php echo request()->search; ?></a> "</p>
					</div>
					<table class="table table-striped">
					<tbody>
						<tr></tr>
						<?php $i=0; foreach ($search_story as $value): ?>
							<tr>
							<td><img src="{{url('public/images/story')}}/{{$value->image}}" width="50px" alt=""></td>
							<td><a style="font-weight: bold; font-size: 14px; color: #000" href="{{route('story.detail',$value->id)}}" title="">{{$value->name}}</a><br><label style="font-size: 12px">{{$value->genre->name}}</label></td>
							<td style="font-size: 14px">{{$value->author->name}}</td>
						</tr>
						<?php $i++; endforeach ?>
						
					</tbody>
				</table>
				<div>{{ $search_story->links('vendor.pagination.simple-bootstrap-4') }}</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="rank col-md-12 ">
					<th>TRUYỆN HOT</th>
				</div>
				<table class="table table-striped">
					<tbody>
						<tr></tr>
						<?php $i=1; foreach ($story_hot as $story_hot): ?>
						<tr>
							<td style="padding-top:11px"><label  class="btn {{$i==1?'btn-danger':''}} 
								{{$i==2?'btn-warning':''}} {{$i==3?'btn-success':''}}">{{$i}}</label></td>
								<td><a class="font-weight-bold text-decoration-none text-dark" href="{{route('story.detail',$story_hot->id)}}" style=" font-size: 14.5px">{{$story_hot->name}}</a><br><label style="font-size: 12px">{{$story_hot->genre->name}} • {{number_format($story_hot->count)}} lượt xem</label></td>
							</tr>
						<?php $i++; endforeach ?>
						
					</tbody>
				</table>
			</div>
		</div>
		@stop()