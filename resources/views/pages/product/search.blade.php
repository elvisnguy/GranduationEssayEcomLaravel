@extends('welcome')
@section('content')
<!--header-->
<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Trang chủ</a> / <span>Tìm kiếm</span></h3>
			</div>
		</div>
        <!--banner-->
             <!--banner-->
            <!--content-->
        <div class="content">
            <!--banner-bottom-->
    
                
                <div class="ban-bottom-w3l">
                    <div class="container">
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
                               <!--  <div class="cat-img">
                                    <img class="img-responsive " src="images/45.jpg" alt="">
                                </div> -->
                                </div>
                        </div>
                        <div class="col-md-9 ban-bottom">
                            <div class="ban-top">
                                 <h2 class="tittle">Kết quả tìm kiếm</h2>
                            @foreach($search_product as $key => $product )
                            <div class="col-md-4 arrival-grid simpleCart_shelfItem">
                                <div class="grid-arr">
                                    <div  class="grid-arrival">
                                        <figure>        
                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal111">
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
                                        <!-- <span class="size"></span> -->
                                         @php 
                                        $giagoc = $product->product_price;
                                          @endphp
                                         @if($product->discount > 0)
                                           @php
                                           
                                           $giagiam = $product->product_price-$product->product_price*$product->discount / 100;
                                           @endphp
                                           <p ><del>{{number_format($giagoc).'VNĐ'}}</del><em class="item_price">{{number_format($giagiam).' '.'VNĐ'}}</em></p>                                           
                                           @else
                                           <p ><em class="item_price">{{number_format($giagoc).' '.'VNĐ'}}</em></p> 
                                           @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           <div class="pagi">
                                        {!! $items->appends(request()->input())->links() !!}
                                    </div>
                            <div class="clearfix"></div>
                        </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
@endsection