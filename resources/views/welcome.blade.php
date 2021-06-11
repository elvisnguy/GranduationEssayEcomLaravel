
<!DOCTYPE HTML>
<html>
<head>
<title>{{$meta_title}}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--------------------SEO------------------------->
<meta name="description" content="{{$meta_desc}}">
<meta name="keywords" content="{{$meta_desc}}">
<meta name="robots" content="INDEX,FOLLOW"/>
<link rel="canonical" type="" href="{{$url_canonical}}">
<!--------------------SEO------------------------->
<!--css-->
<link href="{{('/LVTN/public/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{('/LVTN/public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{('/LVTN/public/frontend/css/font-awesome.css')}}" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{('/LVTN/public/frontend/js/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
    <script src="{{('/LVTN/public/frontend/js/main.js')}}"></script>
<!--search jQuery-->
<script src="{{('/LVTN/public/frontend/js/responsiveslides.min.js')}}"></script>

<script>
    $(document).ready(function(){

 $('#keywords_submit').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
          url:"{{URL::to('/tim-kiem-auto')}}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
                    $('#countryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#keywords_submit').val($(this).text());  
        $('#countryList').fadeOut();  
    });  

});
</script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="{{('/LVTN/public/frontend/js/bootstrap-3.1.1.min.js')}}"></script>
 <!-- cart -->
<script src="{{('/LVTN/public/frontend/js/simpleCart.min.js')}}"></script>
<!-- cart -->
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
</head>
<body>
    
    <!--header-->
        <div class="header">

            <div class="header-top">
                <div class="container">
                     <div class="top-left">
                        <a href="#"> Đường dây nóng  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0908 6789 99</a>
                    </div>
                    <div class="top-right">
                    <ul>

                         <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('shipping_id');
                        if($customer_id != NULL && $shipping_id == NULL){
                        ?> 
                        <li><a href="{{URL::to('checkout')}}">Thanh toán</a></li> 
                        <?php
                        }else if($customer_id != NULL && $shipping_id == NULL){
                        ?>
                        <li><a href="{{URL::to('payment')}}">Thanh toán</a></li>
                        <?php
                        }else{
                        ?>
                        <li><a href="{{URL::to('checkout')}}">Thanh toán</a></li>
                        <?php
                        }
                        ?>
                        <li><a href="{{URL::to('show-cart')}}" class="simpleCart_empty">Giỏ hàng</a></li>
                        <li><a href="{{URL::to('register-account')}}"> Tạo tài khoản </a></li>
                        <?php
                        $customer_id = Session::get('customer_id');
                        $customer_name = Session::get('customer_name');

                        if($customer_id!=NULL){
                        ?>
                        <li>Hi <a href="{{URL::to('customer-info')}}">{{ $customer_name }}</a></li>
                        <li><a href="{{URL::to('logout-checkout')}}">Đăng xuất</a></li>
                        <?php
                        }else{
                        ?>
                        <li><a href="{{URL::to('login-checkout')}}">Đăng nhập</a></li>
                        <?php
                    }
                        ?>
                    </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="heder-bottom">
                <div class="container">
                    <div class="logo-nav">
                        <div class="logo-nav-left">
                            <h1><a href="{{URL::to('/trang-chu')}}">KT-Clothing<span>Fashion is Art</span></a></h1>
                        </div>
                        <div class="logo-nav-left1">
                            <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div> 
                            <!-- end -->
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{URL::to('/tin-tuc')}}" class="act">TIN TỨC</a></li>   
                                    <!-- Mega Menu -->
                                    <li>
                                        <a href="{{URL::to('/tat-ca-san-pham')}}" class="act">SẢN PHẨM</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/san-pham-khuyen-mai')}}" class="act">KHUYẾN MÃI</b></a>
                                    </li>
                                </ul>
                            </div>
                            </nav>
                        </div>
                        <div class="logo-nav-right">
                            <ul class="cd-header-buttons">
                                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                            </ul> <!-- cd-header-buttons -->
                            <div id="cd-search" class="cd-search">
                                <form action="{{URL::to('/tim-kiem')}}" method="get">
                                    <input  autocomplete="off" name="keywords_submit" id="keywords_submit" type="text" placeholder="Tìm kiếm sản phẩm">
                                    <div id="countryList"></div>
                                   
                                    <input type="submit" style="visibility: hidden;" />
                                </form>
                            </div>  
                        </div>
                        <div class="header-right2">
                            <div class="cart box_1">
                              
                                <a href="{{URL::to('show-cart')}}">
                                    <h3> <div class="total">
                                        <span class="simpleCart_total12">{{Cart::subtotal().' '.'VNĐ'}}</span> (<span id="simpleCart_quantity123" class="simpleCart_quantity123"></span>{{  \Cart::count() }} Sản phẩm đã chọn)</div>
                                        <img src="{{('/LVTN/public/frontend/images/bag.png')}}" alt="" />
                                    </h3>
                                </a>
                                <div class="clearfix"> </div>
                            </div>  
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
        <!--content-->
        <!---footer--->
                    <div class="footer-w3l">
                        <div class="container">
                            <div class="footer-grids">
                                <div class="col-md-3 footer-grid">
                                    <h4>KT Clothing </h4>
                                    <p>Chuyên cung cấp các sản phẩm thời trang hàng hiệu về Fast Fashion của hơn nhiều thương hiệu nổi tiếng trên thế giới, Luôn cập nhật xu hướng và thông tin nhanh nhất về thời trang cho khách hàng...</p>
                                    <div class="social-icon">
                                        <a href="#"><i class="icon"></i></a>
                                        <a href="#"><i class="icon1"></i></a>
                                        <a href="#"><i class="icon2"></i></a>
                                        <a href="#"><i class="icon3"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3 footer-grid">
                                    <h4>Hỗ trợ khách hàng</h4>
                                    <ul>
                                        <li><a href="{{URL::to('/huong-dan-mua-hang')}}">Hướng dẫn mua hàng</a></li>
                                        <li><a href="{{URL::to('/thanh-toan')}}">Thanh toán</a></li>
                                        <li><a href="{{URL::to('/van-chuyen')}}">Vận chuyển </a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 footer-grid">
                                    <h4>Liên hệ với KT Clothing</h4>
                                    <ul>
                                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="#">Email: cskh@ktclothing.vn</a></li>
                                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">Hotline tư vấn: 0975 078 344</a></li>
                                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">Hotline mua hàng: 0977 776 061</a></li>
                                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">Mở cửa: T2 - CN (10h00 đến 22h00)</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 footer-grid foot">
                                    <h4>Liên hệ</h4>
                                    <ul>
                                        <li><a href="#">Giới thiệu</a></li>
                                        <li><a href="#">Tin tức</a></li>
                                        <li><a href="#">Liên hệ</a></li>
                                        
                                    </ul>
                                </div>
                            <div class="clearfix"> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!---footer--->
                    <!--copy-->
                    <div class="copy-section">
                        <div class="container">
                            <div class="copy-left">
                                <p>&copy; 2020 KT Clothing . All rights reserved | Design by <a href="http://w3layouts.com">Elvis Nguy</a></p>
                            </div>
                            <div class="copy-right">
                                <img src="{{('/LVTN/public/frontend/images/card.png')}}" alt=""/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <!--copy-->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-info">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <div class="modal-body">
                            <div class="news-gr">
                                <div class="col-md-5 new-grid1">
                                <img src="images/p5.jpg" class="img-responsive" alt="">
                                </div>
                                    <div class="col-md-7 new-grid">
                                        <h5>Ten Women's Cotton Viscose fabric Grey Shrug</h5>
                                        <h6>Quick Overview</h6>
                                        <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                        <div class="color-quality">
                                            <div class="color-quality-left">
                                                <h6>Color : </h6>
                                                <ul>
                                                    <li><a href="#"><span></span>Red</a></li>
                                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                                </ul>
                                            </div>
                                            <div class="color-quality-right">
                                                <h6>Quality :</h6>
                                                <div class="quantity"> 
                                                    <div class="quantity-select">                           
                                                        <div class="entry value-minus1">&nbsp;</div>
                                                        <div class="entry value1"><span>1</span></div>
                                                        <div class="entry value-plus1 active">&nbsp;</div>
                                                    </div>
                                                </div>
                                                <!--quantity-->
                                                        <script>
                                                        $('.value-plus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                                            divUpd.text(newVal);
                                                        });

                                                        $('.value-minus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                                            if(newVal>=1) divUpd.text(newVal);
                                                        });
                                                        </script>
                                                    <!--quantity-->
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    <div class="women">
                                        <span class="size">XL / XXL / S </span>
                                        <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                        <div class="add">
                                           <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-info">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <div class="modal-body">
                            <div class="news-gr">
                                <div class="col-md-5 new-grid1">
                                <img src="images/p7.jpg" class="img-responsive" alt="">
                                </div>
                                    <div class="col-md-7 new-grid">
                                        <h5>Ten Women's Cotton Viscose fabric Grey Shrug</h5>
                                        <h6>Quick Overview</h6>
                                        <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                        <div class="color-quality">
                                            <div class="color-quality-left">
                                                <h6>Color : </h6>
                                                <ul>
                                                    <li><a href="#"><span></span>Red</a></li>
                                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                                </ul>
                                            </div>
                                            <div class="color-quality-right">
                                                <h6>Quality :</h6>
                                                <div class="quantity"> 
                                                    <div class="quantity-select">                           
                                                        <div class="entry value-minus1">&nbsp;</div>
                                                        <div class="entry value1"><span>1</span></div>
                                                        <div class="entry value-plus1 active">&nbsp;</div>
                                                    </div>
                                                </div>
                                                <!--quantity-->
                                                        <script>
                                                        $('.value-plus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                                            divUpd.text(newVal);
                                                        });

                                                        $('.value-minus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                                            if(newVal>=1) divUpd.text(newVal);
                                                        });
                                                        </script>
                                                    <!--quantity-->
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    <div class="women">
                                        <span class="size">XL / XXL / S </span>
                                        <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                        <div class="add">
                                           <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-info">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <div class="modal-body">
                            <div class="news-gr">
                                <div class="col-md-5 new-grid1">
                                <img src="images/p10.jpg" class="img-responsive" alt="">
                                </div>
                                    <div class="col-md-7 new-grid">
                                        <h5>Ten Men's Cotton Viscose fabric Grey Shrug</h5>
                                        <h6>Quick Overview</h6>
                                        <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                        <div class="color-quality">
                                            <div class="color-quality-left">
                                                <h6>Color : </h6>
                                                <ul>
                                                    <li><a href="#"><span></span>Red</a></li>
                                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                                </ul>
                                            </div>
                                            <div class="color-quality-right">
                                                <h6>Quality :</h6>
                                                <div class="quantity"> 
                                                    <div class="quantity-select">                           
                                                        <div class="entry value-minus1">&nbsp;</div>
                                                        <div class="entry value1"><span>1</span></div>
                                                        <div class="entry value-plus1 active">&nbsp;</div>
                                                    </div>
                                                </div>
                                                <!--quantity-->
                                                        <script>
                                                        $('.value-plus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                                            divUpd.text(newVal);
                                                        });

                                                        $('.value-minus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                                            if(newVal>=1) divUpd.text(newVal);
                                                        });
                                                        </script>
                                                    <!--quantity-->
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    <div class="women">
                                        <span class="size">XL / XXL / S </span>
                                        <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                        <div class="add">
                                           <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-info">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <div class="modal-body">
                            <div class="news-gr">
                                <div class="col-md-5 new-grid1">
                                <img src="images/p12.jpg" class="img-responsive" alt="">
                                </div>
                                    <div class="col-md-7 new-grid">
                                        <h5>Ten Men's Cotton Viscose fabric Grey Shrug</h5>
                                        <h6>Quick Overview</h6>
                                        <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                        <div class="color-quality">
                                            <div class="color-quality-left">
                                                <h6>Color : </h6>
                                                <ul>
                                                    <li><a href="#"><span></span>Red</a></li>
                                                    <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                                    <li><a href="#" class="purple"><span></span>Purple</a></li>
                                                    <li><a href="#" class="gray"><span></span>Violet</a></li>
                                                </ul>
                                            </div>
                                            <div class="color-quality-right">
                                                <h6>Quality :</h6>
                                                <div class="quantity"> 
                                                    <div class="quantity-select">                           
                                                        <div class="entry value-minus1">&nbsp;</div>
                                                        <div class="entry value1"><span>1</span></div>
                                                        <div class="entry value-plus1 active">&nbsp;</div>
                                                    </div>
                                                </div>
                                                <!--quantity-->
                                                        <script>
                                                        $('.value-plus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                                            divUpd.text(newVal);
                                                        });

                                                        $('.value-minus1').on('click', function(){
                                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                                            if(newVal>=1) divUpd.text(newVal);
                                                        });
                                                        </script>
                                                    <!--quantity-->
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="women">
                                        <span class="size">XL / XXL / S </span>
                                        <p ><del>$100.00</del><em class="item_price"> $70.00 </em></p>
                                        <div class="add">
                                           <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>
<script type="text/javascript">
    $('.items-sidebar').click(function(){
        $(this).parents('ul').find('.gender_category',).toggle();
    });
    $('.items-sidebar').click(function(){
        $(this).parents('ul').find('.type_category',).toggle();
    });
     @if(Session::has('success'))
     alert('Vui lòng nhập size');
     @endif 
@if(Session::has('error'))
     alert('{{ Session::get('error') }}');
     @endif

</script>