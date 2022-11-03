@extends('layoutadmin.layoutadmin')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('contentwrapper')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ADD_SLIDE</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2"  method="post" enctype="multipart/form-data" action="{{ route('coupons.store') }}" >
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                        <h3 style="text-align: center">Thêm mã giảm giá</h3>
                        
                       
                        <div class="form-group">
                         
                            <div class="col-md-12">
                    

                                  <input type="text"
                                    class="form-control" name="name_coupon" id="" aria-describedby="helpId" placeholder="Nhập tên mã" required>
                                  
                               
                            </div>
                            <div class="col-md-12">
                    

                                  <input type="text"
                                    class="form-control" name="description" id="" aria-describedby="helpId" placeholder="Mô tả về mã" required>
                                  
                               
                            </div>
                            <div class="col-md-12">
                    
                    
                                  <input type="number"
                                    class="form-control" name="value" min='1000' max='150000' id="" aria-describedby="helpId" placeholder="Giá trị giảm VD: 30000" required>
                                  
                               
                            </div>
                            
                        </div>
                       
                      
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        {{-- @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif --}}
                        <h4 class="card-title">Danh sách mã giảm giá</h4>
                        <h6 class="card-subtitle">Product</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">NAME_COUPON</th>
                                        <th class="border-top-0">DESCRIPTION</th>
                                        <th class="border-top-0">VALUE</th>
                                        <th class="border-top-0">Create</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($CouPons as $CouPon)
                                        
                                 
                                    <tr>
                                         <td>{{$CouPon->id}}</td>
                                        <td>{{$CouPon->name_coupon}}</td>
                                        <td>{{$CouPon->description}}</td>
                                        <td>{{$CouPon->value}} </td>
                                        <td>{{$CouPon->created_at}}</td>

                                        {{--<td>{{$product->unit}}</td>
                                        <td>{{$product->description}}</td>
                                     
                                        <td><img src="/image/product/{{$product->image}}" width="100" height="100" alt=""> </td>
                                        <td>{{$product->created_at}} </td>
                                       
                                     
                                           <a href="{{ route('product.edit', $product->id) }}" >  <button type="submit"  class="btn btn-primary">Sửa</button></a>
                                          
                                     
                                       
                                            
                                           
                               
                                    </td> --}}
                                    <td style="justify-content: space-around">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$CouPon->id}}">
                                        Xóa
                                      </button>
                                    </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{$CouPon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <b style="color: red;">Bạn chắc chắn muốn xóa #{{$CouPon->id}} ?</b>
                                         
                                             
                                            </div>
                                            <div class="modal-footer">
                                              
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                               <form action="{{ route('coupons.destroy',$CouPon->id) }}" method="POST">  
                                            @csrf
                                            @method('delete')
                                              <button type="submit" class="btn btn-primary">YES</button>
                                                   </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pager" style="display: flex;justify-content: space-between;"><div class="page">{{$CouPons->Links()}}</div></div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection