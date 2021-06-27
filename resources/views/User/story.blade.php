@extends('master')

@section('title','Chương: ')
@section('main')
<main class="body">
	<p class="scrollTop btn"><i class="fas fa-arrow-up"></i></p>
	<div class="container main">
		
		<div class="col-md-12 back">
			<p><i class="fas fa-home"></i><a href="{{route('home')}}" title="trang chủ">Trang chủ </a> <i class="fas fa-caret-right"></i><a href="{{route('list.story',$chapter->story->genre->id)}}" title=""> {{$chapter->story->genre->name}} </a><i class="fas fa-caret-right"></i><a href="{{route('story.detail',$chapter->id_story)}}" title=""> {{$chapter->story->name}} </a><i class="fas fa-caret-right"></i><a  title=""> Chương 1</a></p>
		</div>

		<div class="col-md-12">

			<div class="row">
				<div class="col-md-1">
					
				</div>
				<div class="col-md-10">
					<div class="col-md-12 tuychinh">
						<div class="row">
							<div class="col-md-6">
								<form method="" action="">
									<select class="form-control select c-select1">
										<option selected>Chỡ chữ</option>
										
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="20">20</option>
										
									</select>
								</form>
								
							</div>
							<div class="col-md-6">
								<form method="" action="">
									<select class=" form-control select c-select2">
										<option selected>Màu nền</option>
										<option value="color-trang">Trắng</option>
										<option value="color-den">Đen</option>
										<option value="color-hong">Hồng nhạt</option>
										<option value="color-vang">Vàng nhạt</option>
										<option value="color-xam">Xám nhạt</option>
										<option value="color-xanh">Xanh nhạt</option>
									</select>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1">
					
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row next-chuong">
				<div class="col-md-12">
					<a href="{{$chapter->number_chap-1>=1?route('chapter',['id_chap'=>$chapter->number_chap-1,'id_story'=>$chapter->id_story]):''}}"  class="btn {{$chapter->number_chap==1?'text-muted':''}} se" title="" ><i class="fas fa-long-arrow-alt-left"></i> Chương trước</a>
					<a href="{{$chapter->number_chap+1<=$count?route('chapter',['id_chap'=>$chapter->number_chap+1,'id_story'=>$chapter->id_story]):''}}" class="btn float-right {{$chapter->number_chap==$count?'text-muted':''}}" title=""> Chương sau <i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="tentruyen">
				<p>{{$chapter->story->name}}</p>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="tenchuong">
				<p>Chương {{$chapter->number_chap}}: {{$chapter->name_chap}}</p>
				<img src="images/kks-removebg-preview.png" alt="">
			</div>
			<div class="content">
				
				{!! nl2br(e($chapter->content)) !!}
			</div>
			<div class="row next-chuong">
				<div class="col-md-12">
					<a href="{{$chapter->number_chap-1>=1?route('chapter',['id_chap'=>$chapter->number_chap-1,'id_story'=>$chapter->id_story]):''}}"  class="btn {{$chapter->number_chap==1?'text-muted':''}} se" title="" ><i class="fas fa-long-arrow-alt-left"></i> Chương trước</a>
					<a href="{{$chapter->number_chap+1<=$count?route('chapter',['id_chap'=>$chapter->number_chap+1,'id_story'=>$chapter->id_story]):''}}" class="btn float-right {{$chapter->number_chap==$count?'text-muted':''}}" title=""> Chương sau <i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
				
			</div>
		</div>

		@stop()