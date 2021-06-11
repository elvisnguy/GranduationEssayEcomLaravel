@extends('welcome')
@section('content')
<!--header-->
        <!--banner-->
        <div class="banner-w3">
            <div class="demo-1">            
                <div id="example1" class="core-slider core-slider__carousel example_1">
                    <div class="core-slider_viewport">
                        <div class="core-slider_list">
                            @foreach(\App\Banner::where('banner_status','1')->get() as $k => $item)
                            <div class="core-slider_item">
                                <img src="{{('public/uploads/banner/' . $item->banner_image )}}" class="img-responsive" alt="" height="100%" width="100%">
                            </div>
                            @endforeach
                             
                         </div>
                    </div>
                    <div class="core-slider_nav">
                        <div class="core-slider_arrow core-slider_arrow__right"></div>
                        <div class="core-slider_arrow core-slider_arrow__left"></div>
                    </div>
                    <div class="core-slider_control-nav"></div>
                </div>
            </div>
            <link href="{{('public/frontend/css/coreSlider.css')}}" rel="stylesheet" type="text/css">
            <script src="{{('public/frontend/js/coreSlider.js')}}"></script>
            <script>
            $('#example1').coreSlider({
              pauseOnHover: false,
              interval: 3000,
              controlNavEnabled: true
            });

            </script>

        </div>  
        <!--banner-->
            <!--content-->
        <div class="content">
            <!--banner-bottom-->
    
                
                <div class="ban-bottom-w3l">
                    <div class="container">
                        <div class="col-md-2 product-agileinfo-grid">
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
                               
                                <!-- <div class="cat-img">
                                    <img class="img-responsive " src="images/45.jpg" alt="">
                                </div> -->
                                </div>
                        </div>
                        <div class="col-md-8 product-agileinfo-grid custom">
                             <h2>TIN TỨC</h2>
                             @php 
                                $itemNews = \App\News::orderBy('news_id','DESC')->limit(10)->get();
                                 $oneNew = [];
                                if(count($itemNews) > 0){
                                    $oneNew = $itemNews[0];
                                    unset($itemNews[0]);
                                }
                             @endphp
                             <div class="col-md-9">
                                 <div class="mainNews">
                                        @php 
                                            $link = route('detail_news', ['news_id' => $oneNew->news_id  ]);
                                        @endphp
                                       <a href="{{ $link }}"><img src="/LVTN/public/uploads/news/{{ $oneNew->news_image}}" width="100%" height="300"></a>
                                        <a href="{{ $link }}">{{ $oneNew->news_name }}</h5></a><h5>
                                        <p>{!! $oneNew->news_desc !!}</p>
                                 </div>
                             </div>

                             <div class="col-md-3">
                                 <ul class="subNews">
                                    @foreach($itemNews as $item)
                                        @php 
                                            $link = route('detail_news', ['news_id' => $item->news_id  ]);
                                        @endphp
                                     <li>
                                        <a href="{{ $link }}"><img src="/LVTN/public/uploads/news/{{ $item->news_image }}" width="100" height="auto"></a>
                                        <a href="{{ route('detail_news', ['news_id' => $item->news_id ]) }}">
                                            <h5>{{ \Illuminate\Support\Str::words($item->news_name, 4, '...') }}</h5>
                                        </a>
                                        
                                        <p>{!! $item->news_desc !!}</p>
                                     </li>
                                    @endforeach
                                 </ul>
                             </div>
                                <div class="moreNews">
                                    <a href="{{URL::to('tin-tuc')}}">Xem thêm</a>
                                </div>
                        </div>
                        <div class="col-md-2 product-agileinfo-grid">
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
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
              
            
            <!--banner-bottom-->
<!--new-arrivals-->
                <div class="new-arrivals-w3agile">
                    <div class="container">
                        <h2 class="tittle">Sản phẩm mới</h2>
                            @foreach($all_product as $key => $product )
                            <div class="col-md-3 arrival-grid simpleCart_shelfItem">
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
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                    
                                    
                                    @if ($product->discount > 0)
                                    <div class="ribben1">
                                        <p>SALE</p>
                                        </div>
                                    @endif
                                    <div class="women">
                                        <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{ \Illuminate\Support\Str::words($product->product_name, 2, '...') }}</a></a></h6>
                                         <h5><a href="#">{{($product->product_gender)}}</a></h5>
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
                             <div class="moreProduct">
                                      <span><a href="{{URL::to('/tat-ca-san-pham')}}">Xem thêm</a></span>
                                    </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
<!--new-arrivals-->
<!--Products-->
                <div class="product-agile">
                    <div class="container">
                        <h3 class="tittle1"> Sản phẩm đang khuyến mãi</h3>
                       @foreach($khuyenmai_product as $key => $product )
                            <div class="col-md-3 arrival-grid simpleCart_shelfItem">
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
                             <div class="moreProduct">
                                      <span><a href="{{URL::to('/san-pham-khuyen-mai')}}">Xem thêm</a></span>
                                    </div>  
                            <div class="clearfix"></div>
                    </div>
                </div>
<!--Products-->
<!--Lates-->
            <!--Lates-->
              <!--Best Seller-->
                
            <!--Best Seller-->
@endsection