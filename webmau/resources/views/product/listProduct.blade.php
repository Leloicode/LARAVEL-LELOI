@section('css')
    
@endsection
@extends('layout.index')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Danh sách sản phẩm yêu thích</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    @if(Session::has('thongbao'))

	
	<div class="tbpopup" id="tbpopup-1">
		<div class="tboverlay"></div>
		<div class="tbcontent">
		<div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
		<div style="font-size:10px;font-weight:bold; height:80px; margin-top: 40px">{{ Session::get('thongbao') }}</div>
		
		</div>
		</div>


	@endif
@if ($count_list_product_like != 0 )
    

						<div class="beta-products-list">
							<h4>Sản phẩm yêu thích</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{$count_list_product_like}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($products_list_product_like as $product_km)
								<div class="col-sm-3">
									<div class="single-item">
										@if ($product_km->Product->promotion_price != 0)
										<div class="ribbon-wrapper" style="z-index: 2;"><div class="ribbon sale">Sale</div></div>
										@endif
									
										<div class="single-item-header">
											<a href="{{ route('Products.show', $product_km->id_product) }}"><img src="/image/product/{{$product_km->Product->image}}" alt="" style="width:300px; height:255px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product_km->Product->name}}</p>
											<p class="single-item-price">
											@if ($product_km->Product->promotion_price == 0.0)
												<span class="flash-sale">{{number_format($product_km->Product->unit_price)}}.vnđ</span>
											@else
											<span class="flash-del">{{$product_km->Product->unit_price}}</span>
											<span class="flash-sale">{{number_format($product_km->Product->promotion_price)}}.vnđ</span>
											
											@endif
												
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$product_km->id_product ) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('Products.show',$product_km->id_product) }}">Xem chi tiết<i class="fa fa-chevron-right"></i></a>
											<a href="{{ route('deleteProductLike',$product_km->id_product) }}" class="remove" title="Remove this item"  style="margin-bottom: -10px; margin-left: 50px "><svg style="margin-bottom: -10px;  " xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
												<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
											  </svg></a>
										
                      <div class="clearfix"></div>
										</div>
								</div>
								</div>
								@endforeach
							</div>
                            <div class="pager"> {{$products_list_product_like->links("pagination::bootstrap-4")}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->

                        @else
                        <div class="khongcosanpham" style="background-color: rgb(237, 235, 235); padding: 100px;margin-bottom: 20px">
                            <p style=" text-align: center; font-size: 30px">Danh sách sản phẩm yêu thích trống!!</p>
                    
                    
                        </div>
                        @endif
</div> <!-- .container -->
@endsection

@section('js')
    
@endsection

