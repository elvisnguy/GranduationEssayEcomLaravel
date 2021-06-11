@extends('welcome')
@section('content')
<!--css-->
<link href="{{('/LVTN/public/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{('/LVTN/public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{('/LVTN/public/frontend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{('/LVTN/public/frontend/css/jquery-ui.css')}}">
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
	<script src="{{('/LVTN/public/frontend/js/main.js')}}"></script>
<!--search jQuery-->

 <!--mycart-->
<script type="text/javascript" src="{{('/LVTN/public/frontend/js/bootstrap-3.1.1.min.js')}}"></script>
 <!-- cart -->
<script src="{{('/LVTN/public/frontend/js/simpleCart.min.js')}}"></script>
<!-- cart -->
  
</head>
<body>
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Trang chủ</a> / <span>Hướng dẫn mua hàng</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<div class="products-agileinfo">
						<h2 class="tittle">Hướng dẫn</h2>
					<div class="container">
<img src="/LVTN/public/uploads/stuff/huongdan.jpg">
		<span><ul class="parent">
			<li>Bước 1: Tìm kiếm sản phẩm yêu thích tại web

</li>
			<li>Bước 2: Xem thông tin / hình ảnh sản phẩm và đặt mua hàng</li>
			<li>Bước 3 : Thanh toán-->Phương thức thanh toán
			 <ul class="sub">
				<li>Họ & tên người nhận</li>
				<li>Email người nhận để có thể theo dõi đơn hàng</li>
				<li>Số điện thoại di động chính xác</li>
				<li>Địa chỉ</li>
			</ul>
		</li>
			<li> Bước 4: Đặt hàng</li>
			<li>Bước 5 : Chờ shop điện thoại và gửi email xác nhận đơn hàng cho quý khách.</li>
		</ul></span>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		<!--content-->
	
</body>
</html>
@endsection