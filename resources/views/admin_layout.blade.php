<!DOCTYPE HTML>
<html>
<head>
<title>ADMIN PAGE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{asset('public/backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{asset('public/backend/js/jquery-2.1.1.min.js')}}"></script> 
<!--icons-css-->
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="{{asset('public/backend/js/Chart.min.js')}}"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="{{asset('public/backend///cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js')}}" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="{{asset('public/backend/lib/modernizr/modernizr-custom.js')}}"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="{{asset('public/backend/js/chartinator.js')}}" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="{{asset('public/backend/js/skycons.js')}}"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="{{URL::to('/dashboard')}}"> <h1>ADMIN - KT Clothing</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<!--search-box-->
								<div class="search-box">
									<form>
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="{{asset('public/backend/images/p1.png')}}" alt=""> </span> 
												<div class="user-name">
													<p><?php
				$name = Session::get('admin_name');
				if($name){
					echo $name;
				}
				?></p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="{{URL::to('/change-pass-admin')}}"><i class="fa fa-cog"></i>Đổi mật khẩu</a> </li> 
											<!-- <li> <a href="#"><i class="fa fa-user"></i>Thông tin</a> </li> --> 
											<li> <a href="{{URL::to('/logout')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->

<div class="inner-block">


  @yield('admin_content')



<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>

</div>
	<!--slider menu-->
    <div class="sidebar-menu">
		  		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="{{URL::to('/dashboard')}}"><i class="fa fa-tachometer"></i><span>DANH MỤC</span></a></li>
		         <li><a href="#"><i class="fa fa-book nav_icon"></i><span>ĐƠN HÀNG</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>	
		             <li><a href="{{URL::to('/thong-ke')}}">Thống kê doanh thu</a></li>	            
		          </ul>
		      	 </li>
		      	  <li><a href="#"><i class="fa fa-book nav_icon"></i><span>KHÁCH HÀNG</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/all-customer')}}">Liệt kê khách hàng</a></li>		            
		          </ul>
                 </li>
		      	  <li><a href="#"><i class="fa fa-book nav_icon"></i><span>TIN TỨC</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-news')}}">Thêm tin tức</a></li>
		            <li><a href="{{URL::to('/all-news')}}">Liệt kê tin tức</a></li>		            
		          </ul>
                 </li>
		        <li><a href="#"><i class="fa fa-book nav_icon"></i><span>DANH MỤC SẢN PHẨM</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
		            <li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>		            
		          </ul>
                 </li>
		          <li><a href="#"><i class="fa fa-book nav_icon"></i><span>THƯƠNG HIỆU SẢN PHẨM</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
		            <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>	            
		          </ul>
		      	 </li>
		      	  <li><a href="#"><i class="fa fa-book nav_icon"></i><span>SẢN PHẨM</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
		            <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>	            
		          </ul>
		      	 </li>
		      	 <li><a href="#"><i class="fa fa-book nav_icon"></i><span>SIZE</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-size')}}">Thêm size</a></li>
		            <li><a href="{{URL::to('/all-size')}}">Liệt kê size</a></li>	            
		          </ul>
		      	 </li>
		      	 <li><a href="#"><i class="fa fa-book nav_icon"></i><span>COUPON</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-coupon')}}">Thêm coupon</a></li>
		            <li><a href="{{URL::to('/all-coupon')}}">Liệt kê coupon</a></li>	            
		          </ul>
		      	 </li>
		      	  <li><a href="#"><i class="fa fa-book nav_icon"></i><span>BANNER</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{URL::to('/add-banner')}}">Thêm banner</a></li>
		            <li><a href="{{URL::to('/all-banner')}}">Liệt kê banner</a></li>	            
		          </ul>
		      	 </li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"></div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
		<script src="{{asset('public/backend/js/scripts.js')}}"></script>
		<!--//scrolling js-->
<script src="{{asset('public/backend/js/bootstrap.js')}}"> </script>
<!-- ck-editor-->
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.36/jquery.form-validator.min.js"></script>
<script type="text/javascript">
	$.validate({
            
		});

</script>
<script>
	CKEDITOR.replace('ckeditor');
	CKEDITOR.replace('ckeditor1');
	CKEDITOR.replace('ckeditor2');
	CKEDITOR.replace('ckeditor3');
</script>
<script type="text/javascript">
	$(".c_size").change(function(){
		var checked = $(this).prop("checked");
		var value = $(this).val();
		if(checked){
			$(this).parents(".checkbox").append('<input placeholder=0 class="c_quantity" type="number" name="quantity['+value+']">');
		}else{
			$(this).parents(".checkbox").find(".c_quantity").remove();
		}
	});
</script>
</body>
</html>                     