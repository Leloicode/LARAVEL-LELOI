<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>ADMIN</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assetadmin/assets/images/favicon.png">
    <!-- chartist CSS -->
    <link href="./assetadmin/assets/plugins/chartist-assetadmin/html/js/dist/chartist.min.css" rel="stylesheet">
    <link href="./assetadmin/assets/plugins/chartist-assetadmin/html/js/dist/chartist-init.css" rel="stylesheet">
    <link href="./assetadmin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="/assetadmin/html/css/styleprofile.css"  rel="stylesheet">
    <link href="/assetadmin/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/assetadmin/html/css/style.min.css" rel="stylesheet">
  
    @yield('css')
    <style>
        .menu li {
 display: block;
 transition-duration: 0.5s;
}

.menu li:hover {
  cursor: pointer;
}

.menu ul li ul {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  transition: all 0.5s ease;
    background-color: #dfe5eb;
    width: 300px;
    
  display: none;
}

.menu ul li:hover > ul,
.menu ul li ul:hover {
  visibility: visible;
  opacity: 1;
  display: block;
}

.menu ul li ul li {
  clear: both;
  width: 100%;
  display: block;
    color: black;
}
    </style>
</head>

<body>
 
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layoutadmin.topbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
      @include('layoutadmin.leftbar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       @yield('contentwrapper')
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @yield('js')
  
    <script src="assetadmin/assets/plugins/jquery/dist/jquery.min.assetadmin/html/js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assetadmin/assets/plugins/bootstrap/dist/assetadmin/html/js/bootstrap.bundle.min.assetadmin/html/js"></script>
    <script src="assetadmin/html/js/app-style-switcher.assetadmin/html/js"></script>
    <!--Wave Effects -->
    <script src="assetadmin/html/js/waves.assetadmin/html/js"></script>
    <!--Menu sidebar -->
    <script src="assetadmin/html/js/sidebarmenu.assetadmin/html/js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="./assetadmin/assets/plugins/chartist-assetadmin/html/js/dist/chartist.min.assetadmin/html/js"></script>
    <script src="./assetadmin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.assetadmin/html/js"></script>
    <!--c3 JavaScript -->
    <script src="./assetadmin/assets/plugins/d3/d3.min.assetadmin/html/js"></script>
    <script src="./assetadmin/assets/plugins/c3-master/c3.min.assetadmin/html/js"></script>
    <!--Custom JavaScript -->
    <script src="./assetadmin/html/js/pages/dashboards/dashboard1.assetadmin/html/js"></script>
    <script src="./assetadmin/html/js/custom.assetadmin/html/js"></script>
</body>

</html>