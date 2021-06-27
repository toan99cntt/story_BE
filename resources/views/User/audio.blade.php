@extends('master')

@section('title','Thông tin truyện')
@section('main')
<style>
	.page-link{
		color: #6A6868;
	}
</style>
<main class="body">
	<p class="scrollTop btn"><i class="fas fa-arrow-up"></i></p>
	<div class="container main">
		<div class="col-md-12 back">
			<p><i class="fas fa-home"></i></i><a href="{{route('home')}}" title="trang chủ">Trang chủ </a> <i class="fas fa-caret-right"></i><a  title=""> Truyện audio</a></p>
		</div>
		<div class="row">
			<div class="col-md-8">
				
				<div class="col-md-12">
					
					<table class="table table-striped">
						<tbody>
							<tr></tr>
							<?php $i=0; foreach ($audio as $value): ?>
							<tr>
								<td style="width: 270px"><iframe width="270" height="140" src="{{$value->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br></td>
								<td><a style="font-weight: bold; font-size: 16px; color: #000" title="">{{$value->title}}</a><br><label style="font-size: 12px">{{$value->admin->username}}</label><br><label style="font-size: 12px">{{$value->created_at}}</label></td>

							</tr>
							<?php $i++; endforeach ?>

						</tbody>
					</table>
					<div class="text-dark">
						 {{ $audio->links('vendor.pagination.simple-bootstrap-4') }}
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