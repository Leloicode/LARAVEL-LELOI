@section('css')
    
@endsection
@extends('layout.index')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="/">Home</a> / <span>Sản phẩm / {{$name}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    @if(Session::has('yeuthich'))

	
	<div class="tbpopup" id="tbpopup-1">
		<div class="tboverlay"></div>
		<div class="tbcontent">
		<div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
		<div style="font-size:10px;font-weight:bold; height:80px; margin-top: 40px">{{ Session::get('yeuthich') }}</div>
		
		</div>
		</div>


	@endif
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ( $type_products as $type_product)
                        <li><a href="{{ route('Products.type_product', [ 'id' =>$type_product ->id , 'name' =>$type_product ->name] ) }}">{{$type_product->name}}</a></li>
                        
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($count_product_fiter_new)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($product_fiter_new as $product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($product->promotion_price != 0)
										<div class="ribbon-wrapper" style="z-index: 2;"><div class="ribbon sale">Sale</div></div>
										@endif
                                    <div class="single-item-header">
                                        <a href="{{ route('Products.show',$product->id) }}"><img src="/image/product/{{$product->image}}" alt="" style="width:300px; height:255px;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                          
                                                @if ($product->promotion_price == 0)
                                                    <span class="flash-sale">{{number_format($product->unit_price)}}.vnđ</span>
                                                @else
                                                <span class="flash-del">{{number_format($product->unit_price)}}</span>
                                                <span class="flash-sale">{{number_format($product->promotion_price)}}.vnđ</span>
                                                
                                                @endif
                                           
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('themgiohang',$product->id ) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('Products.show',$product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <a href="{{ route('add-productlike',$product->id  ) }}" style=" margin-left: 50px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                                  </svg>
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg> --}}
                                          </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="pager">
                        {{$product_fiter_new->links()}}
                    </div>
                   
                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($count_product_fiter_top)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($product_fiter_top as $product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($product->promotion_price != 0)
										<div class="ribbon-wrapper" style="z-index: 2;"><div class="ribbon sale">Sale</div></div>
										@endif
                                    <div class="single-item-header">
                                        <a href="{{ route('Products.show',$product->id) }}"><img src="/image/product/{{$product->image}}" alt="" style="width:300px; height:255px;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                          
                                            @if ($product->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($product->unit_price)}} vnđ</span>
                                            @else
                                            <span class="flash-del">{{number_format($product->unit_price)}}</span>
                                            <span class="flash-sale">{{number_format($product->promotion_price)}} vnđ</span>
                                            
                                            @endif
                                       
                                    </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('themgiohang',$product->id ) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('Products.show',$product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                         @if (count($productlikes) > 0)
											
                                                    @for ($i = 0; $i < count($productlikes); $i++)
                                                        @if ($product->id == $productlikes[$i]->id_product)
														<a href="{{ route('deleteProductLike',$productlikes[$i]->id_product) }}"
															style=" margin-left: 50px">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                height="22" fill="currentColor" class="bi bi-heart-fill"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                            </svg>
														</a>
                                                        @break
                                                        @endif
														@if (count($productlikes) == $i + 1)
														<a href="{{ route('add-productlike', $product->id) }}"
															style=" margin-left: 50px">
														<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                        fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
												</a>

														@endif
                                                    @endfor
													@else
													<a href="{{ route('add-productlike', $product->id) }}"
														style=" margin-left: 50px">
													<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
													fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
													<path
														d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
												</svg>
											</a>
													@endif
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="pager">
                        {{$product_fiter_top->links()}}
                    </div>
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('js')
    
@endsection

