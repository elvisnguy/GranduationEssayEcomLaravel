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
				<h3><a href="index.html">Trang chủ</a> / <span>Tin tức</span></h3>
			</div>
		</div>
	<!--banner-->
		<!--content-->
			<div class="content">
				<!--contact-->
					<div class="mail-w3ls">
						<div class="container">
							<h2 class="tittle">Tin tức về thời trang</h2>
							<div class="mail-grids">
								<div class="mail-top">
									@foreach($news as $k => $item)
									<div class="col-md-4 mail-grid">
										@php 
											$link = route('detail_news', ['news_id' => $item->news_id ])
										@endphp
										<a href="{{ $link }}"><img src="public/uploads/news/{{ $item->news_image}}"></a>
										<a href="{{ $link }}"><h5>{{ $item->news_name }}</h5></a>
										<p>{!! $item->news_desc !!}</p>

									</div>
									@endforeach
									<div class="clearfix"></div>
								</div>
								<div class="center">
									{!! $news->links() !!}
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