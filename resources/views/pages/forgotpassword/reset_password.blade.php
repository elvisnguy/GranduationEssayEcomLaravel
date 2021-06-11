@extends('welcome')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
<title>New Shop a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="js/main.js"></script>
<!--search jQuery-->

 <!--mycart-->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
</head>
<body>
	<!--header-->
		
		<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Trang chủ</a> / <span>Đăng nhập</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
				<!--login-->
			<div class="login">
				<div class="main-agileits">
					<div class="form-w3agile">
						<h3>Thay đổi mật khẩu</h3>
						<?php
			                $message = Session::get('message');
			                if($message){
			                    echo '<span class="text-alert">'.$message.'</span>';
			                    Session::put('message',null);
			                }
		                ?>
		                @if($errors->any())
		                    <div class="alert alert-danger alert-dismissible fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						   	<ul>
						   		@foreach ($errors->all() as $error)
							        <li>{{ $error }}</li>
							    @endforeach
						   	</ul>
						  </div>
							    
							@endif
						<form action="{{URL::to('/reset-password')}}" method="POST">
							{{csrf_field()}}
							<div class="key">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								
								<input  type="password" value="" name="password" required="" placeholder="Mật khẩu mới">
								<div class="clearfix"></div>
							</div>
							<div class="key">
								<i class="fa fa-envelope" aria-hidden="true"></i>

								<input  type="password" value="" name="password_confirmation" required="" placeholder="Xác nhận mật khẩu">
								<div class="clearfix"></div>
							</div>
							<input type="submit" value="Gửi yêu cầu">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="token" value="{{ $token }}">
						</form>
					</div>
					<div class="forg">
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<!--login-->
		</div>
		<!--content-->
		</body>
</html>
@endsection