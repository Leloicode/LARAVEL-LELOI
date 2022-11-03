<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand ms-4" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{-- <img src="/assetadmin/assets/images/logobakery.png" width="50px" height="50px" alt="homepage" class="dark-logo" /> --}}
                    <p>BAKERY LELOI</p>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white "
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0 ">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                <li class="nav-item search-box">
                    <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search" style="display: none;">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                            class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <div class="menu">
                    
                {{-- @if (Route::has('login'))
            
                    
                @auth
                <img src="assetadmin/assets/images/users/1.jpg" style="width: 50px;height: 50px;border-radius: 50px" alt="user" class="profile-pic me-2">@if(Session::has('user')) {{Session::get('user') }} @endif

                    <ul class="dropdown">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
          
                            <li><button type="submit" style="background-color: white; color:black; border-radius:0; border: 0.1px; height: 46px ; opacity: 0.5;" class="btn btn-primary">Đăng xuất</button></li>
                           
                        </form>
                      </ul>
             
               
               
                @else
                    <li><a href="/signup">Đăng kí</a></li>
                    <li><a href="/login">Đăng nhập</a></li>
                
                @endauth
            </ul>
        @endif --}}
                <div class="profile_info">
                    <img src="/assetadmin/assets/images/users/1.jpg" alt="#">
                    <div class="profile_info_iner">
                    <div class="profile_author_name">
                    
                    <h5>@isset(Auth::user()->full_name)
                        {{Auth::user()->full_name}}
                    @endisset
                
                        </h5>
                        
                 
                    </div>
                    <div class="profile_info_details">
                    <a href="#">My Profile </a>
                    <a href="#">Settings</a>
                    <form action="{{ route('postlogout') }}" method="post">
                        @csrf
                           <button type="submit" style="background-color: white; border: none">Log Out</button> 
                    </form>
                    </div>
                    </div>
                    </div>
        
        </div>
    </nav>
</header>