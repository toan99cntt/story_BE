@extends('master')
@section('title','Danh sách truyện')
@section('main')
<script>
	document.cookie = "select_1=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	document.cookie = "select_2=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	function select_1(val) {
		document.cookie='select_1='+val;
		location.reload();
	}
	function select_2(val) {
		document.cookie='select_2='+val;
		location.reload();
	}

</script>
<style>
	.page-link{
		color: #6A6868;
	}
</style>
<main class="body">
	<p class="scrollTop btn"><i class="fas fa-arrow-up"></i></p>
	<div class="container main">
		<div class="row">
			<div class="col-md-9">
				<div class="col-md-12 back">
					<p><i class="fas fa-home"></i><a href="index.html" title="trang chủ">Trang chủ</a> <i class="fas fa-caret-right"></i> <a href="" title="">{{$gen->name}}</a></p>
				</div>
				<div class="col-md-12 selected">
					
						<div class="row">
						<div class="col-md-7">
							<select onchange="select_1(this.value)" class="select text-secondary" name="select_1">
								<option >Tùy chọn</option>
								<option value="0">Tất cả</option>
								<option value="1">Truyện mới ra</option>
								<option value="2">Đọc nhiều</option>
								
							</select>
						</div>
						<div class="col-md-5">
							<select onchange="select_2(this.value)" class="select text-secondary" name="select_2">
								<option selected>Sắp xếp</option>
								<option value="0">Tất cả</option>
								<option value="1">Sắp xếp từ A-Z</option>
								<option value="2">Sắp xếp từ Z-A</option>
								
							</select>
							
						</div>
						
					</div>
					
				</div>
				<div class="col-md-12 list">
					<table class="table table-striped">
						<tbody>
							<tr></tr>
							<?php foreach ($story as $value): ?>
								<tr>
									<td><img src="{{url('public/images/story')}}/{{$value->image}}" width="60px" alt=""></td>
									<td><a style="font-size: 14px;font-weight: bold;color: #000" href="{{route('story.detail',$value->id)}}" title="">{{$value->name}}</a> 
										@if($value->status==1)<small style="padding: 2px; border: 1px solid #044678">Full</small> @endif
										<br><small class="font-italic">{{$value->author->name}}</small></td>
									<td style="font-size: 13px; "><i class="fas fa-caravan"></i>{{$value->genre->name}}</td>
								</tr>
							<?php endforeach ?>
							
						</tbody>
					</table>
					<div class="text-dark">
						 {{ $story->links('vendor.pagination.simple-bootstrap-4') }}
					</div>
				</div>
				<div class="col-md-12 mt-5">
					<div class="tttruyen">
						<p style="width: 250px">TRUYỆN ĐÃ HOÀN THÀNH</p>
					</div>
					
					<div class="row">
						<?php foreach ($story_full as $story): ?>
							<div class="sp">
								<div class="item">
									<img src="{{url('public/images/story')}}/{{$story->image}}" width="100%" alt="">
								</div>
								<div class="title">
									<a class="text-decoration-none" href="{{route('story.detail',$story->id)}}" title="">{{$story->name}}</a>
								</div>
							</div>

						<?php endforeach ?>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="rank col-md-12 ">
					<p class="text-uppercase">TRUYỆN {{$gen->name}} HOT</p>
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