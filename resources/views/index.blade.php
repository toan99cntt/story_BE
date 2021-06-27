@extends('master')
@section('title','Trang chủ')
@section('main')
<script type="text/javascript">
	document.cookie = "genre=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	document.cookie = "hot=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	function de_cu(val) {
		document.cookie = "genre=" +val;
		location.reload();
		// document.cookie = "genre=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	}
	function hot(val) {
		document.cookie = "hot=" +val;
		location.reload();
		// document.cookie = "genre=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
	}


</script>
<main class="body">
	<p class="scrollTop btn"><i class="fas fa-arrow-up"></i></p>
	<div class="container main p-3 ">
		<div class="row">
			<div class="focus">
				<div class="f1">
					<th>TRUYỆN ĐỀ CỬ</th>
				</div>
				<div class="f2">
					<form action="{{route('home')}}" method="POST" accept-charset="utf-8" name="form">
						
						<select name="de-cu" onchange="de_cu(this.value)" class="form-control de-cu">
							<option value="-1">TÙY CHỌN</option>
							<option value="0">TẤT CẢ</option>
							<?php foreach ($genre as $gen): ?>
								<option style="text-transform: uppercase;" value="{{$gen->id}}">{{$gen->name}}</option>
							<?php endforeach ?>
						</select>
					</form>
					
				</div>

			</div>
		</div>
		<div class="row">
			<?php foreach ($story as $story): ?>

				<div class="sp">
					<div class="item">
						<img src="{{url('public/images/story')}}/{{$story->image}}" width="100%" alt="">
					</div>
					<div class="title">
						<a href="{{route('story.detail', $story->id)}}" title="">{{$story->name}}</a>
					</div>
				</div>
				
			<?php endforeach ?>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="focus_2">
					<th>MỚI CẬP NHẬT</th>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-inverse table-hover">
							<thead>
								<tr>
									<th>Tên truyện</th>
									<th>Chương mới</th>
									<th>Thời gian</th>
								</tr>
							</thead>
							<tbody>
								<?php $date= getdate(); foreach ($chapter_new as $value): ?>
								<tr>
									<td><a class="text-dark text-decoration-none font-weight-bold" href="{{route('story.detail', $value->story->id)}}" title="">{{$value->story->name}}</a></td>
									<td>Chương {{$value->number_chap}}</td>
									<td>{{$value->created_at}}</td>
								</tr>
								<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div>
				<div class="focus_2">
					<th>ĐÃ HOÀN THÀNH</th>
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
				<div class="focus_2 mb-2">
					<th>TRUYỆN AUDIO</th>
				</div>
				<div class="row">
					<?php foreach ($audio as $value): ?>
						<div class="col-sm-6 audio">
							<iframe  src="{{$value->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					<?php endforeach ?>
				</div>
			</div>

		<div class="col-lg-4">
			<div class="focus_3">
				<div class="f1">
					<th>TRUYỆN HOT</th>
				</div>
				<div class="f2">
					<select onchange="hot(this.value)" class="form-control">
						<option value="">TÙY CHỌN</option>
						<option value="0">TẤT CẢ</option>
						<?php foreach ($genre as $gen): ?>
							<option style="text-transform: uppercase;" value="{{$gen->id}}">{{$gen->name}}</option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="list-top">
				<table class="table table-inverse table-hover">
					<tbody>
						<?php $i=1; foreach ($story_hot as $a): ?>
						
						<tr>
							<td style="padding-top:11px"><label  class="btn {{$i==1?'btn-danger':''}} 
								{{$i==2?'btn-warning':''}} {{$i==3?'btn-success':''}}">{{$i}}</label></td>
								<td><a class="font-weight-bold text-decoration-none text-dark" href="{{route('story.detail',$a->id)}}" style=" font-size: 14.5px">{{$a->name}}</a><br><label style="font-size: 12px">{{$a->genre->name}} • {{number_format($a->count)}} lượt xem</label></td>
							</tr>




							<?php $i++; endforeach ?>
						</tbody>

					</table>
				</div>
				<div class="comment-fb" style="width: 100%">
					<div class="fb-comments" data-href="https://www.facebook.com/permalink.php?story_fbid=730661647820495&amp;id=100026299986775" data-width="100%" data-numposts="5"></div>
				</div>

			</div>
		</div>

		@stop()