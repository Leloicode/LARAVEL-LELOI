@section('css')
    
@endsection
@extends('layout.index')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
	@if (Session::has('cart'))
    		
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-6">
    <div class="form-block">
        
       
        <form action="{{ route('getCouPonProduct')}}" method="post" >
            @csrf
            <label for="notes">Mã giảm giá</label>
            <input 
             {{-- @if(Session::has('magiamgiatrue')) readonly="{{ Session::get('magiamgiatrue') }}" @endif  --}}
            type="text" style="max-width: 245px" id="adress" name="name_coupon" placeholder="Chỉ áp dụng được 1 mã giảm giá" required >
            <button type="submit" 
            {{-- @if(Session::has('magiamgiatrue')) 
            disabled="{{ Session::get('magiamgiatrue') }}" 
            @endif  --}}
            style="margin-left: 450px;margin-top: -62px; height: 40px;border: 0.5px"  class="btn btn-primary">Áp dụng</button>
        </form>
    </div>
        </div>
    </div>
        <form action="{{ route('postdat_hang') }}" method="post" class="beta-form-checkout">
            @csrf
           
                   
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
                                    
                    </div>

                    {{-- <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                    </div> --}}

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" name="address" placeholder="Street Address" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone"name="phone" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="note"></textarea>
                    </div>
                    
                    <input type="hidden" name="magiamgiatrue" @if (Session::has('magiamgiatrue')) value="true" @else  value="false"    @endif>
               
                    
                    <input type="hidden" name="valuegiamgia" @if (Session::has('valuegiamgia')) value="{{Session::get('valuegiamgia')}}" @else value="0"   @endif>
                  
                </div>
                <div class="col-sm-6">
                    

                              
                                    
                         
                    <div class="your-order" style="margin-top: -80px">
                        @if (session('thongbao'))
                                    <div class="alert alert-success">
                                        {{ session('thongbao') }}
                                    </div>
                                @endif
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                @if (Session::has('cart'))
                                @foreach ($product_cart as $product)
                                    <div class="media">
                                        <img width="25%" src="/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$product['item']['name']}}</p>
                                            <div class="flash-sale"><span>@if ($product['item']['promotion_price'] === 0.0)
                                                {{number_format($product['item']['unit_price'])}}
                                                @else
                                                {{number_format($product['item']['promotion_price'])}}
                                            @endif đ</span></div>
                                           
                                            <div><span>Sl: {{$product['qty']}}</span></div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @if (Session::has('valuegiamgia'))
                            <div class="your-order-item">
                                
                                <div class="pull-left"><p class="your-order-f18">Giảm giá:</p></div>
                                <div class="pull-right"><h5 style="color: red" class="color-black">- {{number_format(Session::get('valuegiamgia'))}} đ</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                            <div class="your-order-item">
                                
                                <div class="pull-left"><p class="your-order-f18">Phí ship:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{number_format(25000)}} vnđ</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice - Session::get('valuegiamgia') + 25000)}} vnđ</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li>

                                {{-- <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: block;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 56110001344010
                                        <br>- Chủ TK: Lê Lợi
                                        <br>- Ngân hàng BIDV
                                    </div>						
                                </li> --}}
                                
                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" style="padding: 15px; background-color: brown; color: white">Đặt hàng</button></div>
                    </div> <!-- .your-order -->
           

                </div>
            </div>
        </form>
 <!-- #content -->
    @else
    <div class="khongcosanpham" style="background-color: rgb(237, 235, 235); padding: 100px;margin-bottom: 20px">
        <p style=" text-align: center; font-size: 30px">Vui lòng chọn sản phẩm vào giỏ hàng để đặt hàng!!!</p>


    </div>
    @endif  
</div> 
</div> <!-- .container -->
@endsection

@section('js')
    
@endsection

