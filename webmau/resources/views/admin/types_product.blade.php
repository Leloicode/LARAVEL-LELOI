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
                            <li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                        <h4 class="card-title">Danh sách danh mục</h4>
                        <h6 class="card-subtitle">type_product</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">Image</th>
                           
                                        <th class="border-top-0">Create</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($type_products as $type)
                                        
                                 
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{$type->name}} </td>
                                        <td>{{$type->description}}</td>
                                        <td><img src="/image/product/{{$type->image}}" width="100" height="100" alt=""> </td>
                                        <td>{{$type->created_at}} </td>
                                       
                                        <td style="justify-content: space-around">
                                           <a href="{{ route('typeproduct.edit', $type->id) }}" >  <button type="submit"  class="btn btn-primary">Sửa</button></a>
                                          
                                     
                                       
                                            
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$type->id}}">
                                                Xóa
                                              </button>
                               
                                    </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{$type->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <b style="color: red;">Nếu bạn xóa #{{$type->id}} các sản phẩm theo danh mục này sẽ bị xóa đi.</b>
                                            <hr>
                                              <p>Bạn chắc chắn muốn xóa?</p>
                                            </div>
                                            <div class="modal-footer">
                                              
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                               <form action="{{ route('typeproduct.destroy',$type->id) }}" method="POST">  
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
                            <div class="pager" style="display: flex;justify-content: space-between;"><div class="page">{{$type_products->Links()}}</div><div class="them"><a href="{{ route('typeproduct.create') }}"><button type="button" style="" class="btn btn-primary">Thêm danh mục</button></a></div> </div>
                            
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