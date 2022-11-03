<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="/assets/dest/css/style.css">
	<link rel="stylesheet" href="/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="/assets/dest/css/huong-style.css">
	@yield('css')
	<style>
		/* Thong bao Popup  */
	.tbpopup .tboverlay {
	position:fixed;
	top:0px;
	left:0px;
	width:100vw;
	height:300vh;
	background:rgba(0,0,0,0.7);
	z-index:4;
	display:none;
	}
	
	.tbpopup .tbcontent {
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%) scale(0);
	background:#fff;
	max-width:500px;
	z-index:4;
	text-align:center;
	padding:20px;
	box-sizing:border-box;
	font-family:"Open Sans",sans-serif;
	border-radius:20px;
	display: block;
	position: fixed;
	box-shadow:0px 0px 10px #111;
	}
	@media (max-width: 700px) {
	.tbpopup .tbcontent {width:90%;}
	}
	
	.tbpopup .tbclose-btn {
	cursor:pointer;
	position:absolute;
	right:20px;
	top:20px;
	width:35px;
	height:35px;
	color:#ff4444;
	font-size:30px;
	font-weight:600;
	line-height:35px;
	text-align:center;
	border-radius:50%;
	}
	
	.tbpopup.active .tboverlay {
	display:block;
	}
	
	.tbpopup.active .tbcontent {
	transition:all 300ms ease-in-out;
	transform:translate(-50%,-50%) scale(1);
	}
	.tbbuttom{background:#00cc00;color:#fff}
	
	</style>
</head>
<body onload="thongbaopopup()">

	@include('layout.header')
	
	@yield('content')

	@include('layout.footer')

	<!-- include js files -->
	@yield('js')
	<script src="/assets/dest/js/jquery.js"></script>
	<script src="/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="/assets/dest/vendors/animo/Animo.js"></script>
	<script src="/assets/dest/vendors/dug/dug.js"></script>
	<script src="/assets/dest/js/scripts.min.js"></script>
	<script src="/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="/assets/dest/js/waypoints.min.js"></script>
	<script src="/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	
		<script>
			function thongbaopopup(){
			document.getElementById("tbpopup-1").classList.toggle("active");
			}
			</script>
</body>
</html>
