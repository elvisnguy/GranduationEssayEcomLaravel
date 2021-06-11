@extends('welcome')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
<title>New ShopS a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Checkout :: w3layouts</title>
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
				<h3><a href="">Trang chủ</a> / <span>Thanh toán</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="cart-items">
				<div class="container">
					 <h2>Giỏ hàng của bạn</h2>
						<!-- <script>$(document).ready(function(c) {
							$('.close1').on('click', function(c){
								$('.cart-header').fadeOut('slow', function(c){
									$('.cart-header').remove();
								});
								});	  
							});
					   </script> -->
					   <?php
					   $content = Cart::content();
					   ?>
					<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="discount">% Giảm</td>
							<td class="size">Kích cỡ</td>
							<td class="quantity">Số lượng</td>
							<td class="total-temp">Tạm tính</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						@php 
							$totalPrice = 0;
						@endphp
						@foreach($content as $v_content)
						@php 
								$product = \App\Product::find($v_content->id);
						@endphp
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('/public/uploads/product/'.$v_content->options->image)}}" width="200px" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_discount">
								<p>{{ $product->discount }}%</p>
							</td>
							<td class="cart_size">
								@php 
			
									$sizeModel = \App\Size::where('size_id',$v_content->options->size)->first();
								@endphp
								<p>{{$sizeModel->name}}</p>
								
							</td>
							<td class="cart_quantity">
								<span>{{$v_content->qty}} cái</span>
							</td>
							<td class="cart_total">
								
								<p class="cart_total_price">
									<?php
									$subtotal= $v_content->price * $v_content->qty;
									$tong = $subtotal - $subtotal * $product->discount / 100;
							$totalPrice += $tong;

									echo number_format($subtotal).' '.'VNĐ';
									?>
								</p>
							</td>
							<td>
								<p>{{ number_format($tong) }} vnđ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li><span class="txt-left">Tổng:</span><span class="txt-right">{{ number_format($totalPrice) }} vnđ</span></li>
						
						@php 
						    $total = $totalPrice;
						    $thanhtien = $total;
							$discount = 0;
						@endphp
						@if(Session::has('discount'))
						@php 
							$discount = Session::get('discount');
							$total = $totalPrice;
							$thanhtien =$total - $total * $discount / 100;

						@endphp
						<li><span class="txt-left">Giảm Coupon:</span><span class="txt-right">{{ Session::get('discount') }}%</span></li>
						@endif
						<li><span class="txt-left">Thành tiền:</span><span class="txt-right">{{ number_format($thanhtien) }} vnđ</span></li>
					</ul>
					    <form method="POST" action="{{URL::to('/check-coupon')}}">
					    <input name="coupon" type="text" placeholder="Nhập mã coupon">
					    <button>Áp dụng</button>
					    {{csrf_field()}} 
					    </form>
					 <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id!=NULL){
                        ?> 
                      <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                        <?php
                        }else{
                        ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                        <?php
                    }
                    ?>
					
				</div>
			</div>
					 <script>$(document).ready(function(c) {
							$('.close2').on('click', function(c){
									$('.cart-header2').fadeOut('slow', function(c){
								$('.cart-header2').remove();
							});
							});	  
							});
					 </script>
				</div>
			</div>
	<!-- checkout -->	
		</div>
					<!---footer--->
					
				<!--copy-->
				
</body>
</html>
@endsection