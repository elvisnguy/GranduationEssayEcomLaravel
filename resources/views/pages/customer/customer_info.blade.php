@extends('welcome')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
<title>New Shop a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Contact :: w3layouts</title>
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

		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Trang chủ</a> / <span>Thông tin khách hàng</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<!--contact-->
					<div class="mail-w3ls">
						<div class="container">
							<div class="order_history">
									<span><a href="{{URL::to('/order-history')}}">Lịch sử đặt hàng</a></span>
								</div>
							<div class="form-info-customer">
								<h2>THÔNG TIN KHÁCH HÀNG</h2>
								
								@php 
									 $id = Session::get('customer_id');
									 $customer = \App\Customer::find($id);
								@endphp
								<form action="{{ route('change-info') }}" method="POST">

									<span>Tên khách hàng:</span><input value="{{ $customer->customer_name }}" name="customer_name"  placeholder="" rows="16"></input>
									<span>Giới tính:</span><select  name="customer_gender" id="gender">
												  <option @if($customer->customer_gender == 'nam') selected @endif value="nam">Nam</option>
												  <option @if($customer->customer_gender == 'nu') selected @endif value="nu">Nữ</option>
												</select>
									<span>Địa chỉ:</span><input value="{{ $customer->customer_address}}" name="customer_address"  placeholder="" rows="16"></input>
									<span>Email:</span><input  value="{{ $customer->customer_email }}" name="customer_email"  placeholder="" rows="16"></input>
									<span>Số điện thoại:</span><input value="{{ $customer->customer_phone}}" name="customer_phone"  placeholder="" rows="16"></input>
									<span>Ngày sinh:</span><input value="{{ $customer->customer_birth}}" name="customer_birth"  type="date" placeholder="" rows="16"></input>
									
									<input type="submit" value="Sửa thông tin cá nhân" name="send_order" class="btn btn-primary btn-sm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							</div>
						
							</div>
						</div>
					</div>
				<!--contact-->
			</div>
		<!--content-->
		
</body>
</html>
@endsection