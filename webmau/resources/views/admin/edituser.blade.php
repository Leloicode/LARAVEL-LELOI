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
                            <li class="breadcrumb-item active" aria-current="page">EDIT_USER</li>
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
                    <form class="form-horizontal form-material mx-2" action="{{ route('admin.updateuser', $user->id) }}">
                        @csrf
                        @method('put')
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <h3 style="text-align: center">Cập nhật người dùng</h3>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" max="100" value="{{$user->full_name}}" name="full_name" placeholder="Johnathan Doe"
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" readonly placeholder="johnathan@admin.com" value="{{$user->email}}"
                                    class="form-control ps-0 form-control-line" name="email"
                                    id="example-email" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Phone No</label>
                            <div class="col-md-12">
                                <input type="number" name="phone" placeholder="0357805837" value="{{$user->phone}}"
                                    class="form-control ps-0 form-control-line" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Address</label>
                            <div class="col-md-12">
                                <input rows="5" name="address" max="100" value="{{$user->address}}" class="form-control ps-0 form-control-line" required />
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection