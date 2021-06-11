@extends('welcome')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
<title>New Shop a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Registered :: w3layouts</title>
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
				<h3><a href="index.html">Trang chủ</a> / <span>Đăng kí</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
				<!--login-->
			<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Đăng kí tài khoản</h3>
					<form action="{{URL::to('/add-customer')}}" method="POST">
						{{csrf_field()}}
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Họ và tên" name="customer_name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Họ và tên';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fas fa-venus-mars" aria-hidden="true"></i>
						<select  name="customer_gender" id="gender">
												  <option  value="nam">Nam</option>
												  <option  value="nu">Nữ</option>
												</select>
						</div>
						<div class="key">
							<i class="fas fa-venus-mars" aria-hidden></i>
							<input  type="text" value="Địa chỉ" name="customer_address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Địa chỉ';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="customer_email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Mật khẩu" name="customer_password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" value="Số điện thoại" name="customer_phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Số điện thoại';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fab fa-table" aria-hidden="true"></i>
							<input  type="date" value="Ngày sinh" name="customer_birth" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Ngày sinh';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Đăng kí ngay">
					</form>
				</div>
				
			</div>
		</div>
				<!--login-->
		</div>
		<!--content-->
		
				

</body>
</html>
@endsection