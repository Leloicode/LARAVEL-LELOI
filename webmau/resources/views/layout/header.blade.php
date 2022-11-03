<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 99 Tô Hiến Thành</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0357 805 837</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                @if (Route::has('login'))
                <ul class="top-details menu-beta l-inline">
                    @auth
                    <li><a href="#"><i class="fa fa-user" type="submit"></i>{{Auth::user()->full_name}}</a></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
      
                        <li><button type="submit" style="background-color: white; color:black; border-radius:0; border: 0.1px; height: 46px ; opacity: 0.5;" class="btn btn-primary">Đăng xuất</button></li>
                       
                    </form>
                   
                    @else
                        <li><a href="/signup">Đăng kí</a></li>
                        <li><a href="/login">Đăng nhập</a></li>
                    
                    @endauth
                </ul>
            @endif
         
                    

           




            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="/assetadmin/assets/images/logobakery.png" width="100px" height="100px" height="" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    
                    @if (Route::has('login'))
                    @auth
                    <div class="cart">
                    <a href="{{ route('getlistproductlike') }}" style="margin-top: 7px">

                        <svg style="margin-top: 7px" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                          </svg>
                          
                    </a>
                    
                </div>
                    @else
                    @endauth
                    @endif
                    
                </div>

                <div class="beta-comp">
                   

                    




                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if (Session::has('cart'))
                            {{Session('cart')->totalQty}}
                            @else
                            Trống
                        @endif) <i class="fa fa-chevron-down"></i></div>
                        @if (Session::has('cart'))
                        <div class="beta-dropdown cart-body">

       
                            @if (Session::has('cart'))
                           @foreach ($product_cart as $product)
                               
                           
                            <div class="cart-item">
                                <div class="media" style="display:  flex;width: 121%;" >
                                    <a class="pull-left" href=" "><img src="/image/product/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body" style="min-width: 200px">
                                        <span class="cart-item-title">{{$product['item']['name']}}  </span>

                                        <span class="cart-item-amount">{{$product['qty']}}*<span>@if ($product['item']['promotion_price'] === 0.0)
                                            {{number_format($product['item']['unit_price'])}}
                                            @else
                                            {{number_format($product['item']['promotion_price'])}}
                                        @endif</span></span>

                                    </div>
                                    <div class="icon-delete" >
                                        <span style="margin-left: 10px">
                                            <a href="{{ route('deletecart', $product['item']['id']) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                              </svg>
                                            </a>
                                        </span>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                            @endif
                         
                           
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@isset(Session('cart')->totalPrice)
                                    
                               {{number_format(Session('cart')->totalPrice)}} @endisset</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{ route('dat_hang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{ route('getgiohang') }}" style="width: 126px " class="beta-btn primary text-center">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div> <!-- .cart -->
                    
                  
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ( $type_products as $type_product)
                            <li><a href="{{ route('Products.type_product', [ 'id' =>$type_product ->id , 'name' =>$type_product ->name] ) }}">{{$type_product ->name}}</a></li>
                            @endforeach
                            
                           
                        </ul>
                    </li>
                    <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                    <li><a href="/lienhe">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->