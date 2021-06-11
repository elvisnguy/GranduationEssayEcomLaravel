@extends('welcome')
@section('content')
     <!--content-->
        <div class="content"> 
            <!--banner-bottom-->         
                <div class="ban-bottom-w3l">
                    <div class="container">
                            <div class="fb-share-button" data-href="http://localhost/LVTN/trang-chu" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                          <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
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
                                          <a href="">Nam</a>
                                        </li>
                                        <li>
                                          <a href="">Nữ</a>
                                        </li>
                                        <li>
                                          <a href="">Unisex</a>
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
                                          <a href="">Nam</a>
                                        </li>
                                        <li>
                                          <a href="">Nữ</a>
                                        </li>
                                        <li>
                                          <a href="">Unisex</a>
                                        </li>
                                          <li>
                                          <a href="">Áo</a>
                                        </li>
                                        <li>
                                          <a href="">Quần</a>
                                        </li>
                                        <li>
                                          <a href="">Áo khoát</a>
                                        </li>
                                      </ul>
                                    </ul>
                                    </ul>
                                   @endforeach
                                </div>
                                 <div class="brand-w3l">
                                    <h3>Giới tính</h3>
                                    
                                    <ul>
                                        <li><a href="">Nam</a>
                                        
                                        </li>
                                         <li><a href="">Nữ</a>
                                        
                                        </li>
                                        <li><a href="">Unisex</a>
                                        
                                        </li>
                                    </ul>
                                    </ul>
                                   
                                </div>
                                <div class="cat-img">
                                    <img class="img-responsive " src="images/45.jpg" alt="">
                                </div>
                                </div>
                        </div>
                       <div class="col-md-9 product-agileinfo-grid">
                        @foreach($brand_name as $key => $name)
                        <h2 class="tittle">{{($name->brand_name)}}</h2>
                        @endforeach
                            @foreach($brand_by_id as $key => $product)
                            <div class="col-md-4 arrival-grid simpleCart_shelfItem">
                                <div class="grid-arr">
                                    <div  class="grid-arrival">
                                        <figure>        
                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                <div class="grid-img">
                                                    <img  src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="img-responsive" alt="">
                                                </div>
                                                <div class="grid-img">
                                                    <img  src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="img-responsive"  alt="">
                                                </div>          
                                            </a>        
                                        </figure>   
                                    </div>
                                    @if ($product->discount > 0 )
                                    <div class="ribben1">
                                        <p>SALE</p>
                                        </div>
                                    @endif
                                    <div class="women">
                                        <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{ \Illuminate\Support\Str::words($product->product_name, 2, '...') }}</a></h6>
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="pagi">
                                        {!! $brand_by_id->links() !!}
                                    </div>
                </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
              
            
            <!--banner-bottom-->
<!--new-arrivals-->
                
<!--new-arrivals-->

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="BitUsyqT"></script>
            <!--Best Seller-->
@endsection