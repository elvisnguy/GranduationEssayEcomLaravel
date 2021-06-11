@extends('welcome')
@section('content')
<!--css-->
<link href="{{ asset('/LVTN/public/frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('/LVTN/public/frontend/css/style.css ') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/LVTN/public/frontend/css/font-awesome.css ') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/LVTN/public/frontend/css/jquery-ui.css') }}">
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
	<script src="{{ asset('/LVTN/public/frontend/js/main.js') }} "></script>
<!--search jQuery-->

 <!--mycart-->
<script type="text/javascript" src="{{ asset('/LVTN/public/frontend/js/bootstrap-3.1.1.min.js') }}"></script>
 <!-- cart -->
<script src="{{ asset('/LVTN/public/frontend/js/simpleCart.min.js') }}"></script>
<!-- cart -->
  
</head>
<body>
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Trang chủ</a> / <span>Sản phẩm</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<div class="products-agileinfo">
						<h2 class="tittle">{{ $title }}</h2>
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							 <div class="col-md-3  product-agileinfo-grid">
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
							<div class="col-md-9 product-agileinfon-grid1 w3l">
								<div class="product-agileinfon-top">
									@foreach($items as $key => $product )
                            <div class="col-md-4 arrival-grid simpleCart_shelfItem">
                                <div class="grid-arr">
                                    <div  class="grid-arrival">
                                        <figure>        
                                            <a href="#" class="new-gri" data-target="#myModal1">
                                                <div class="grid-img">
                                                    <img  src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="img-responsive" alt="">
                                                </div>
                                                <div class="grid-img">
                                                    <img  src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="img-responsive"  alt="">
                                                </div>          
                                            </a>        
                                        </figure>   
                                    </div>
                                      @if ($product->discount > 0)
                                    <div class="ribben1">
                                        <p>SALE</p>
                                        </div>
                                    @endif
                                    <div class="women">
                                        <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{ \Illuminate\Support\Str::words($product->product_name, 2, '...') }}</a></a></h6>
                                         <h5><a href="single.html">{{($product->product_gender)}}</a></h5>
                                        <span class="size"> 
                                            @php 
                                            $productModel = \App\Product::find($product->product_id);
                                            $getSize = $productModel->sizes;
                                            $giagoc = $product->product_price; 
                                          @endphp
                                          @foreach($getSize as $k => $size)
                                          <span>@if($k > 0), @endif {{ $size->name }}</span>
                                          @endforeach</span>
                                        @if($product->discount > 0)
                                           @php
                                           $giagiam = $product->product_price-$product->product_price*$product->discount / 100;
                                           @endphp
                                           <p ><del>{{number_format($giagoc).'VNĐ'}}</del><em class="item_price">{{number_format($giagiam).' '.'VNĐ'}}</em></p>                                           
                                           @else
                                           <p ><em class="item_price">{{number_format($giagoc).' '.'VNĐ'}}</em></p> 
                                           @endif
                                      <!--   <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Thêm vào giỏ hàng</a> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
									<div class="clearfix"></div>
									<div class="pagi">
										{!! $items->appends(request()->input())->links() !!}
									</div>
								</div>
								
								
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		<!--content-->
	
</body>
</html>
@endsection