<?php 
use App\Genre;
use App\Category;
$genre= Genre::all();
$category= Category::all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title');  </title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{url('public/font-end')}}/css.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<script type="text/javascript" src="{{url('public/font-end')}}/jquery-3.6.0.min.js"></script>
</head>
<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="Ekr5euJD"></script>
	<div class="container">
		<div class="mlogo">
			<div class="row">
			</div>
		</div>
	</div>
	<div style="background-image: url('{{url('public/font-end')}}/images/menu (1).png');" class="menu">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light p-1">
				<a class="navbar-brand" href="{{route('home')}}"><img src="{{url('public/font-end')}}/images/logo2.png" width="130px" alt=""></a>
				<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" style="color: #fff" href="{{route('home')}}">TRANG CHỦ </a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" style="color: #fff" aria-expanded="false">THỂ LOẠI</a>
							<div class="dropdown-menu" >
								<?php foreach ($genre as $genre): ?>
									<a class="dropdown-item" href="{{route('list.story',$genre->id)}}">{{$genre->name}}</a>
								<?php endforeach ?>

							</div>
						</li>
						<li class="nav-item dropdown">
							<a href="{{route('audio')}}" class="nav-link" style="color: #fff" title="">TRUYỆN AUDIO</a>
						</li>
						<li class="nav-item dropdown">
							<a href="" class="nav-link" style="color: #fff" title="">LIÊN HỆ</a>
						</li>
					</ul>
					<form style="position: relative;" action="{{route('search')}}" method="POST" class="form-inline my-2 my-lg-0">
						@csrf
						<input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
						<button style="position: absolute; top: 0px; right: 0px " class="btn btn-outline" type="submit"></button>
					</form>
					<div class=" float-left" style=" font-size: 14px">
						@if(Auth::guard('employer')->check())
						<a style="color: #fff; font-weight: bold; float: left;  " href="{{route('em.profile')}}" >
							<i class="fas fa-user"></i>
							{{Auth::guard('employer')->user()->username}}</a>

							@else

							<div style="float: left;">
								<a style="color: #fff" href="{{route('login')}}" title="Đăng kí" >Đăng nhập</a> | 
								<a style="color: #fff" href="{{route('sign')}}" title="Đăng kí" >Đăng ký</a>
							</div>
							@endif


						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>

	@yield('main')


	<div class="footer">
		<div class="row">
			<div class="col-xl-3">
				<div class="title_2">
					<th>thể loại</th>
				</div>
				<div class="index">
					<p>Ngôn Tình • Kiếm Hiệp</p>
					<p>Xuyên Không • Truyện Teen</p>
					<p>Sắc Hiệp • Đô Thị</p>
				</div>
			</div>
			<div class="col-xl-3">
				<div class="title_2">
					<th>danh mục</th>
				</div>
				<div class="index">
					<p>Đọc Truyện Online</p>
					<p>Truyên Hot</p>
					<p>Truyện Full</p>
				</div>
			</div>
			<div class="col-xl-3">
				<div class="title_2">
					<th>tag</th>
				</div>
				<div class="index">
					<p>Ngôn Tình Sủng • Truyenfull</p>
					<p>Ngôn Tình Hài • Goctruyen</p>
					<p>Ngôn Tình He • webtruyen</p>
					<p>Ngôn Tình Hoàn • Sstruyen</p>
				</div>
			</div>
			<div class="col-xl-3">
				<div class="title_2">
					<th>liên hệ admin</th>
				</div>
				<div class="index">
					<p>Ng.toan99cntt@gmaial.com</p>
				</div>
			</div>

		</div>
	</div>
</div>






</main>
</body>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body>
<script>

	$(document).ready(function(){
		$('.c-select1').click(function(event) {
			if($(this).val()=='15'){
				$('.content').css('font-size', '15px');
			}
			if($(this).val()=='17'){
				$('.content').css('font-size', '17px');
			}
			if($(this).val()=='18'){
				$('.content').css('font-size', '18px');
			}if($(this).val()=='16'){
				$('.content').css('font-size', '17px');
			}if($(this).val()=='20'){
				$('.content').css('font-size', '20px');
			}
		});
		$('.c-select2').click(function (argument) {
      // body... 
      if($(this).val()=='color-vang'){
      	$('.main').css('background', '#f4f4e4');
      	$('.body').css('background', '#eae0c3');
      	$('.main').css('color', '#000');
      }
      if($(this).val()=='color-xam'){
      	$('.main').css('background', '#e1e8e8');
      	$('.body').css('background', '#ced9d9');
      	$('.main').css('color', '#000');
      }
      if($(this).val()=='color-xanh'){
      	$('.main').css('background', '#e2eee2');
      	$('.body').css('background', '#ccd8cc');
      	$('.main').css('color', '#000');
      }
      if($(this).val()=='color-trang'){
      	$('.main').css('background', '#fff');
      	$('.body').css('background', '#ebebeb');
      	$('.main').css('color', '#000');
      }
      if($(this).val()=='color-hong'){
      	$('.main').css('background', '#f5e4e4');
      	$('.body').css('background', '#e9d8d8');
      	$('.main').css('color', '#000');
      }
      if($(this).val()=='color-den'){
      	$('.main').css('background', '#222222');
      	$('.body').css('background', '#000');
      	$('.main').css('color', '#fff');
      }
  })
		$(".btn-chapter").click(function() {
			$(window).scrollTop(600);
		})
		$(".scrollTop").click(function() {
			$(window).scrollTop(0);
		})
    // $('.btn1').click(function() {

    //  $('.from-login').css('display','none');
    //  $('.from-sign').css('display','block');
    // });
    // $('.btn2').click(function() {

    //  $('.from-sign').css('display','none');
    //  $('.from-login').css('display','block');
    // });  
    $('.star-1').hover(function() {
    	$(this).css('color', 'red');
    	$('.star-2').css('color', '#e4e4e1');
    	$('.star-3').css('color', '#e4e4e1');
    	$('.star-4').css('color', '#e4e4e1');
    	$('.star-5').css('color', '#e4e4e1');

    })
    $('.star-2').hover(function() {
    	$(this).css('color', 'red');
    	$('.star-1').css('color', 'red');

    	$('.star-3').css('color', '#e4e4e1');
    	$('.star-4').css('color', '#e4e4e1');
    	$('.star-5').css('color', '#e4e4e1');
    })
    $('.star-3').hover(function() {
    	$(this).css('color', 'red');
    	$('.star-2').css('color', 'red');
    	$('.star-1').css('color', 'red');
    	$('.star-4').css('color', '#e4e4e1');
    	$('.star-5').css('color', '#e4e4e1');
    })
    $('.star-4').hover(function() {
    	$(this).css('color', 'red');
    	$('.star-2').css('color', 'red');
    	$('.star-3').css('color', 'red');
    	$('.star-1').css('color', 'red');
    	$('.star-5').css('color', '#e4e4e1');
    })
    $('.star-5').hover(function() {
    	$(this).css('color', 'red');
    	$('.star-2').css('color', 'red');
    	$('.star-3').css('color', 'red');
    	$('.star-4').css('color', 'red');
    	$('.star-5').css('color', 'red');
    })  
    
});


</script>
</html>