@extends('welcome')
@section('content')
<!--css-->
<link href="{{('/LVTN/public/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{('/LVTN/public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{('/LVTN/public/frontend/css/font-awesome.css')}}" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{('/LVTN/public/frontend/js/jquery.min.js')}}"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="{{('/LVTN/public/frontend/js/main.js')}}"></script>
<!--search jQuery-->
<script type="text/javascript" src="{{('/LVTN/public/frontend/js/bootstrap-3.1.1.min.js')}}"></script>
 <!-- cart -->
<script src="{{('/LVTN/public/frontend/js/simpleCart.min.js')}}"></script>
<!-- cart -->
  <script defer src="{{('/LVTN/public/frontend/js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{('/LVTN/public/frontend/css/flexslider.css')}}" type="text/css" media="screen" />
<script src="{{('/LVTN/public/frontend/js/imagezoom.js')}}"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

  <!--mycart-->
  <!--start-rate-->
<script src="{{('/LVTN/public/frontend/js/jstarbox.js')}}"></script>
	<link rel="stylesheet" href="{{('/LVTN/public/frontend/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->
<link href="{{('/LVTN/public/frontend/css/owl.carousel.css')}}" rel="stylesheet">
<script src="{{('/LVTN/public/frontend/js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
	</script>
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Trang chủ</a> / <span>Chi tiết sản phẩm</span></h3>
			</div>
		</div>
	<!--banner-->	

	<!--content-->

		<div class="content">
			<!--single-->
			<div class="single-wl3">
				<div class="container">
					<div class="single-grids">
						  <div class="col-md-3  single-grid">

                            <div class="ban-top">
                                 <div class="brand-w3l">
                                    
                                    <h3>Danh mục sản phẩm</h3>
                                    @foreach($category as $key => $cate)
                                    <ul>
                                        <li >
                                          <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}
                                          </a>
                                          <span class="items-sidebar">v</span>
                                        </li>
                                      <ul class="gender_category">
                                          <li>
                                          <a href="{{ route('allProduct', 'gender=nam&cate=' .$cate->category_id ) }}">Nam</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=nu&cate='.$cate->category_id) }}">Nữ</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=unisex&cate='.$cate->category_id) }}">Unisex</a>
                                        </li>

                                      </ul>
                                        <ul class="type_category">
                                        
                                      </ul>
                                    </ul>
                                   @endforeach
                                </div>
                                <div class="brand-w3l">
                                    <h3>Thương hiệu sản phẩm</h3>
                                    @foreach($brand as $key => $brand)
                                    <ul>
                                        <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a>
                                          <span class="items-sidebar">v</span>
                                        </li>
                                          <ul class="gender_category">
                                          <li>
                                          <a href="{{ route('allProduct', 'gender=nam&brand=' .$brand->brand_id ) }}">Nam</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=nu&brand=' .$brand->brand_id ) }}">Nữ</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=unisex&brand=' .$brand->brand_id ) }}">Unisex</a>
                                        </li>
                                          @foreach($category as $key => $cate)
                                   
                                       <li>
                                          <a href="{{ route('allProduct', 'cate='.$cate->category_id.'&brand=' .$brand->brand_id ) }}">{{ $cate->category_name }}</a>
                                        </li>
                                         @endforeach
                                      </ul>
                                    </ul>
                                    </ul>
                                   @endforeach
                                </div>
                                 <div class="brand-w3l">
                                    <h3>Giới tính</h3>
                                    
                                    <ul>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=nam') }}">Nam</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=nu') }}">Nữ</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'gender=unisex') }}">Unisex</a>
                                        </li>
                                    </ul>
                                    </ul>
                                   
                                </div>
                                 <div class="brand-w3l">
                                    <h3>Tìm kiếm sản phẩm theo giá</h3>
                                    
                                    <ul>
                                        <li>
                                          <a href="{{ route('allProduct', 'price=500000-1500000') }}">Từ 500K -> 1tr5 VNĐ</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'price=1500000-3000000') }}">Từ 1tr5 -> 3tr VNĐ</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'price=3000000-5000000') }}">Từ 3tr -> 5tr VNĐ</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('allProduct', 'price=5000000') }}">Từ 5tr trở lên </a>
                                        </li>
                                    </ul>
                                    </ul>
                                   
                                </div>
	                                <!-- <div class="cat-img">
	                                    <img class="img-responsive " src="images/45.jpg" alt="">
	                                </div> -->
                                </div>
                        </div>
						<div class="col-md-9 single-grid">
							 <div class="fb-share-button" data-href="http://localhost/LVTN/trang-chu" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                          <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
							<div clas="single-top">
								<div class="single-left">
									<div class="flexslider">
										<ul class="slides">
											<li data-thumb="{{('/LVTN/public/uploads/product/'.$product_details->product_image)}}">
												 <div class="thumb-image"> <img src="{{('/LVTN/public/uploads/product/'.$product_details->product_image)}}" data-imagezoom="true" class="img-responsive"></div>
											</li>
											
										 </ul>
									</div>
								</div>
								<div class="single-right simpleCart_shelfItem">
									<h4>{{$product_details->product_name}}</h4>
									<p class="product-id">Mã sản phẩm:{{$product_details->product_id}}</p>
									<p class="product-content">Tổng quan:{!!$product_details->product_content!!}</p>
									<p class="product-brand">Thương hiệu:{{$product_details->brand_name}}</p>
									<p class="product-cate">Danh mục:{{$product_details->category_name}}</p>
									<p class="product-gender">Giới tính:{{$product_details->product_gender}}</p>
									<div class="women">
										<p class="size">Kích cỡ:
											@php 
                                            $productModel = \App\Product::find($product_details->product_id);
                                            $getSize = $productModel->sizes;
                                            $giagoc = $product_details->product_price;
                                           
                                          @endphp
                                          @foreach($getSize as $k => $size)
                                          
                                          <span data-max="{{ $size->pivot->quantity }}" data-id="{{ $size->size_id }}" class="check-size">{{ $size->name }} <br>({{ $size->pivot->quantity }})</span>
                                          @endforeach
										</p>
									<form action="{{URL::to('/save-cart')}}" method="POST">
										<input type="hidden" name="hidden_size">
										{{csrf_field()}}
									<p class="price item_price">
										Giá:@if($product_details->discount > 0)
                                           @php
                                           $giagiam = $product_details->product_price-$product_details->product_price*$product_details->discount / 100;
                                           @endphp
                                           <span></span><del>{{number_format($giagoc).'VNĐ'}}</del><em class="gia-giam">{{number_format($giagiam).' '.'VNĐ'}}</em></span>                                           
                                           @else
                                           <p ><em class="gia-goc">{{number_format($giagoc).' '.'VNĐ'}}</em></p> 
                                           @endif
                                       </p>
									<div class="color-quality">
										<label>Số lượng :</label>
											<input name="qty" type="number" min="1" max="" value="1" />
											<input name="productid_hidden" type="hidden" value="{{$product_details->product_id}}"/>
											<button type="submit" class="my-cart-b item_add cart">
												<i class="fa fa-shopping-cart"></i>
												Thêm vào giỏ hàng
											</button>
										</form>
									</div>
									</div>
									<div class="social-icon">
										<a href="#"><i class="icon"></i></a>
										<a href="#"><i class="icon1"></i></a>
										<a href="#"><i class="icon2"></i></a>
										<a href="#"><i class="icon3"></i></a>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					<!--day la end foreach-->
						<div class="col-md-3 single-grid1">
							
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!--Product Description-->
						<div class="product-w3agile">
							<h3 class="tittle1">Mô tả sản phẩm</h3>
							<div class="product-grids">
								<div class="col-md-4 product-grid">
									<div id="owl-demo" class="owl-carousel">
										<div class="item">
											<h3>Sản phẩm liên quan</h3>
							@foreach($relate as $key => $lienquan)
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="javascript:void">{{$lienquan->product_name}} </a></h6>

									<span class=" price-in1"> <p class="price item_price">
										Giá:@if($product_details->discount > 0)
                                           @php
                                           $giagiam = $product_details->product_price-$product_details->product_price*$product_details->discount / 100;
                                           @endphp
                                           <span></span><del>{{number_format($giagoc).'VNĐ'}}</del><em class="gia-giam-lq">{{number_format($giagiam).' '.'VNĐ'}}</em></span>                                           
                                           @else
                                           <p ><em class="gia-goc-lq">{{number_format($giagoc).' '.'VNĐ'}}</em></p> 
                                           @endif
                                       </p></span>
									<div class="block">
										<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}" data-text="Add To Cart" class="my-cart-b item_add">	<i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
									</div>
								</div>

								<div class="clearfix"> </div>
							</div>
							@endforeach
										</div>
										<div class="item">
											<h3>Sản phẩm liên quan</h3>
							@foreach($relate as $key => $lienquan)
							<div class="recent-grids">
								<div class="recent-left">
									<a href="single.html"><img class="img-responsive " src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt=""></a>	
								</div>
								<div class="recent-right">
									<h6 class="best2"><a href="javascript:void">{{$lienquan->product_name}} </a></h6>

									<span class=" price-in1"> <p class="price item_price">
										Giá:@if($product_details->discount > 0)
                                           @php
                                           $giagiam = $product_details->product_price-$product_details->product_price*$product_details->discount / 100;
                                           @endphp
                                           <span></span><del>{{number_format($giagoc).'VNĐ'}}</del><em class="gia-giam-lq">{{number_format($giagiam).' '.'VNĐ'}}</em></span>                                           
                                           @else
                                           <p ><em class="gia-goc-lq">{{number_format($giagoc).' '.'VNĐ'}}</em></p> 
                                           @endif
                                       </p></span>
									<div class="block">
										<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}" data-text="Add To Cart" class="my-cart-b item_add">	<i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
									</div>
								</div>

								<div class="clearfix"> </div>
							</div>
							@endforeach
										</div>
									</div>
								</div>
								<div class="col-md-8 product-grid1">
									<div class="tab-wl3">
										<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
											<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
												<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Mô tả sản phẩm</a></li>
												<li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Bình luận Facebook</a></li>
												<li role="presentation"><a href="#binhluan" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Bình luận</a></li>

											</ul>
											<div id="myTabContent" class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
													<div class="descr">
														<h4> Mô tả sản phẩm </h4>
														<section class="quote">{!! $product_details->product_desc !!}</section>
													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
													<div class="descr">
														<div class="fb-comments" data-href="{{$url_canonical}}" data-numposts="20" data-width=""></div>
													</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="binhluan" aria-labelledby="custom-tab">
													<h4>BÌNH LUẬN CỦA KHÁCH HÀNG</h4>
													@php 
														$productModel = \App\Product::find($product_details->product_id);
														$params = \Request::all();
														$sort = isset($params['sort']) ? $params['sort'] : "desc";
														$comments = $productModel->comments()->orderBy('created_at',$sort)->get();

													@endphp	
								                    @foreach($comments as $comment)

								                        <div class="display-comment">
								                            <strong>{{ $comment->customer->customer_name }} <span class="timer"><i>{{ $comment->created_at->format('d/m/Y h:i:s') }}</i></span></strong>
								                            <p>{{ $comment->body }}</p>
								                        </div>

								                    @endforeach
								                     <div class="sortTimeComment">
								                        	<span>Sắp xếp theo:</span>
								                        	<form id="frmSort" action="#" method="GET">
								                        	<select name="sort" id="sort">
															  <option @if($sort == "desc") selected @endif value="desc">Mới nhất</option>
															  <option @if($sort == "asc") selected @endif value="asc">Cũ nhất</option>
															</select>
														</form>
								                        </div>
								                    <hr />
													<h4>Bình Luận</h4>
								                    <form method="post" action="{{ route('comment.add') }}">
								                        
								                        <div class="form-group">
								                            <input type="text" name="comment_body" class="form-control" />
								                            <input type="hidden" name="product_id" value="{{ $product_details->product_id }}" />
								                        </div>
								                        <div class="form-group">
								                            <input type="submit" class="btn btn-warning" value="Gửi bình luận" />
								                        </div>
								                        {{ csrf_field() }}
								                    </form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					<!--Product Description-->
				</div>
			</div>
		</div>
		<!--content-->
		
</body>
</html>
<script type="text/javascript">
	$(".check-size").click(function(){
		$(".check-size").removeClass("active");
		$(this).toggleClass("active");
		var idSize = $(this).data("id");
		var maxSize = $(this).data("max");
		$("input[name='qty']").prop("max", maxSize);
		$("input[name='hidden_size']").val(idSize);
	});
	$("#sort").change(function(){
		$("#frmSort").submit();
	});
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="BitUsyqT"></script>
@endsection