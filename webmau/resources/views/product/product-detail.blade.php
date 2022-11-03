<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BetaDesign &mdash; Product</title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" title="style" href="/assets/dest/css/style.css">
	<link rel="stylesheet" href="/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="/assets/dest/css/huong-style.css">
</head>
<body>

	

	@extends('layout.index')

	
	@section('content')
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
	
					<div class="row">
						<div class="col-sm-4">
							<img src="/image/product/{{$product->image}}" style="width:300px; height:250px;" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$product->name}}</p>
								<p class="single-item-price">
									@if ($product->promotion_price == 0.0)
									<span class="flash-sale">{{$product->unit_price}} .vnđ</span>
									@else
									<span class="flash-del">{{number_format($product->unit_price)}}</span>
									<span class="flash-sale">{{number_format( $product->promotion_price)}} .vnđ (khuyến mãi)</span>
									@endif
									
								</p>
							</div>
	
							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>
	
							<div class="single-item-desc">
								
							</div>
							<div class="space20">&nbsp;</div>
	
						
							<div class="single-item-options">
								
								<a class="add-to-cart pull-left" href="{{ route('themgiohang',$product->id ) }}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
	
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>
	
						<div class="panel" id="tab-description">
							@if ($product->description == "")
							<p>No description</p>
							@else
							<p>{{$product->description}}</p>
							@endif
							
							
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					
				</div>
				
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection


	<!-- include js files -->
	<script src="/assets/dest/js/jquery.js"></script>
	<script src="/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="/assets/dest/vendors/animo/Animo.js"></script>
	<script src="/assets/dest/vendors/dug/dug.js"></script>
	<script src="/assets/dest/js/scripts.min.js"></script>

	<!--customjs-->
	<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });


</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';

// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
</body>
</html>
