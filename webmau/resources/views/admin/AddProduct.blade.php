@extends('layoutadmin.layoutadmin')
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
                            <li class="breadcrumb-item active" aria-current="page">ADD_PRODUCT</li>
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
                    <form class="form-horizontal form-material mx-2"  method="post" enctype="multipart/form-data" action="{{ route('product.store') }}" >
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
                        <h3 style="text-align: center">Thêm sản phẩm</h3>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Product</label>
                            <div class="col-md-12">
                                
                                    
                                  <select class="form-control" name="id_type" id="">
                                    @foreach ($type_product as $type)
                                   
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                         
                                    @endforeach
                                  </select>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Name</label>
                            <div class="col-md-12">
                                <input type="text" max="100" name="name" placeholder="vd: Bánh Kem Halovi"
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Unit_price</label>
                            <div class="col-md-12">
                                <input type="number" min="1"  name="unit_price" placeholder="Giá gốc"
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Promotion_price</label>
                            <div class="col-md-12">
                                <input type="number" min="0"  name="promotion_price" placeholder="Giá khuyến mãi"
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Unit</label>
                            <div class="col-md-12">
                                <input type="text"  name="unit" placeholder="Đơn vị vd: cái,hộp.."
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="des" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Image</label>
                            <div class="col-md-12">
                                <input type="file" name="img" onchange="Changeimg(event)"
                                    class="form-control ps-0 form-control-line" >
                                    <img width="100"  id="imgg" alt=""><br>
                                    <script type="text/javascript">
                                      const Changeimg = (e) => {
                                          const img = document.getElementById('imgg');
                                          const file = e.target.files[0];
                                          img.src = URL.createObjectURL(file);
                                      }   
                                      
                                  </script>
                            </div>
                        </div>
                       
                      
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Thêm sản phẩm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection