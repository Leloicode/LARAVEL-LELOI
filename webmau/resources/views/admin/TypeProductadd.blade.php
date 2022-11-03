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
                            <li class="breadcrumb-item active" aria-current="page">ADD_TYPEPRODUCT</li>
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
                    <form class="form-horizontal form-material mx-2"  method="post" enctype="multipart/form-data" action="{{ route('typeproduct.store') }}" >
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
                        <h3 style="text-align: center">Thêm danh mục</h3>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Name</label>
                            <div class="col-md-12">
                                <input type="text" max="100"  name="name" placeholder="vd: Bánh Kem"
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="des" rows="5" id="comment" placeholder="Mô tả sản phẩm" required></textarea>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Image</label>
                            <div class="col-md-12">
                                <input type="file" name="img" required onchange="Changeimg(event)"
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
                                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection