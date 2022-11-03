@section('css')
    
@endsection
@extends('layout.index')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giở hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Chi tiết giỏ hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        @if (Session::has('cart'))
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
  
                        <th class="product-quantity">Qty.</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Remove</th>
                    </tr>
                </thead>
                <tbody>
            
                    @foreach ($product_cart as $product)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="/image/product/{{$product['item']['image']}}" width="100px">
                                <div class="media-body">
                                    <p class="font-large table-title">{{$product['item']['name']}}</p>
                                    
                                </div>
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">@if ($product['item']['promotion_price'] === 0.0)
                                {{number_format($product['item']['unit_price'])}}
                                @else
                                {{number_format($product['item']['promotion_price'])}}
                            @endif</span>
                        </td>

                        

                        <td class="product-quantity"style="">
                            <a href="{{ route('deleteonecart', $product['item']['id']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                              </svg></a>
                           <input type="number" style="width: 45px; text-align: center; margin-top: -15px"   readonly="true" value="{{$product['qty']}}">
                            <a href="{{ route('raiseonecart', $product['item']['id']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg></a>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount">@if ($product['item']['promotion_price'] === 0.0)
                                {{number_format($product['item']['unit_price'] * $product['qty'])}}
                                @else
                                {{number_format($product['item']['promotion_price']* $product['qty'])}}
                            @endif</span>
                        </td>

                        <td class="product-remove">
                            <a href="{{ route('deletecart', $product['item']['id']) }}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                 
                </tbody>

             

                           
        <!-- End of Cart Collaterals -->
                      
                         

                        
            </table>
            <!-- End of Shop Table Products -->
        </div>
        <div class="cart-totals pull-right" style="margin-top: 13px;">
                                
            <div class="cart-totals-row"><h5 class="cart-total-title">Đơn hàng</h5></div>
            <div class="cart-totals-row" ><span >Tổng :</span> <b><span >@isset(Session('cart')->totalPrice) {{number_format(Session('cart')->totalPrice)}} vnđ @endisset </span></b></div>
            {{-- <div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div> --}}
            {{-- <div class="cart-totals-row"><span>Order Total:</span> <span>$188.00</span></div> --}}
            <a href="{{ route('dat_hang') }}"><button style=" width:265px; border-radius: 5px; margin-top: 2px" type="submit" class="beta-btn primary" name="proceed">Đặt hàng <i class="fa fa-chevron-right"></i></button></a>
        </div>
        @else
        <div class="khongcosanpham" style="background-color: rgb(237, 235, 235); padding: 100px;margin-bottom: 20px">
            <p style=" text-align: center; font-size: 30px">Giỏ hàng của bạn trống!!!</p>
    
    
        </div>  
        @endif
       

        
        <div class="clearfix"></div>

    </div> <!-- #content -->

</div> <!-- .container -->
@endsection

@section('js')
    
@endsection

