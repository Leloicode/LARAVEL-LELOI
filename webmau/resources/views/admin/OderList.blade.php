@extends('layoutadmin.layoutadmin')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .customTable {
            width: 33%;
            float: left;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .customTablesub {
            width: 33%;
            float: left;
            border-bottom: 1px solid #ccc;
            text-align: center;
            Min-height: 70px
        }

        .customTablesub:hover {
            background-color: #ccc;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            @if (session('chuyendon0'))
                <div class="alert alert-success">
                    {{ session('chuyendon0') }}
                </div>
            @endif
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('xoabill0'))
                                <div class="alert alert-success">
                                    {{ session('xoabill0') }}
                                </div>
                            @endif
                            <h4 class="card-title">Danh sách đơn hàng đang chờ</h4>
                            <h6 class="card-subtitle">Oder</h6>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Receiver</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">ToTal</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Note</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Create</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($WaitingBills as $bill)
                                            <tr>
                                                <td>{{ $bill->id }}</td>
                                                <td>{{ $bill->Customer->name }}</td>
                                                <td>{{ $bill->Customer->address }}</td>
                                                <td>{{ number_format($bill->total) }}</td>
                                                <td>{{ $bill->Customer->phone_number }}</td>
                                                <td>{{ $bill->note }}</td>
                                                <td><label class="badge badge-danger">Đang xử lí</label></td>
                                                <td>{{ $bill->created_at }}</td>



                                                <td style="justify-content: space-around">

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalct0{{ $bill->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z" />
                                                        </svg>
                                                    </button>

                                                    <a href="{{ route('admin.chuyendangcho', $bill->id) }}"><button
                                                            class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                class="bi bi-check2-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                                <path
                                                                    d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                            </svg></button></a>


                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal0{{ $bill->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-x-lg"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                        </svg>
                                                    </button>


                                                </td>
                                            </tr>

                                            {{-- xoa don hang --}}
                                            <div class="modal fade" id="exampleModal0{{ $bill->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b style="color: red;">Bạn chắc chắn muốn hủy đơn hàng
                                                                #{{ $bill->id }} ?</b>


                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">NO</button>
                                                            <form action="{{ route('admin.deleteDangCho', $bill->id) }}">

                                                                <button type="submit" class="btn btn-primary">YES</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="exampleModalct0{{ $bill->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn
                                                                hàng</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{-- <div class="product" style="display:flex;">
                                                                <b>Tên sản phẩm</b>&nbsp;&nbsp;
                                                                <b>Giá</b>&nbsp;&nbsp;
                                                                <b>Số lượng</b>&nbsp;&nbsp;

                                                            </div> --}}
                                                            <div class="customTable"><b>Tên sản phẩm</b></div>
                                                            <div class="customTable"><b>Giá</b></div>
                                                            <div class="customTable"><b>Số lượng</b></div>

                                                            @foreach ($bill_details as $bill_detail)
                                                                @if ($bill_detail->id_bill === $bill->id)
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->Product->name }}
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        @if ($bill_detail->Product->promotion_price == 0.0)
                                                                            {{ $bill_detail->Product->unit_price }}
                                                                        @else
                                                                            {{ $bill_detail->Product->promotion_price }}
                                                                        @endif
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->quantity }}
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            {{-- @foreach ($bill_details as $bill_detail)
                                                                <div class="product" style="display:flex;">


                                                                    @if ($bill_detail->id_bill === $bill->id)
                                                                        <p>{{ $bill_detail->Product->name }}</p>
                                                                        &nbsp;&nbsp;
                                                                        <p>
                                                                            @if ($bill_detail->Product->promotion_price == 0.0)
                                                                                {{ $bill_detail->Product->unit_price }}
                                                                            @else
                                                                                {{ $bill_detail->Product->promotion_price }}
                                                                            @endif
                                                                        </p>&nbsp;&nbsp;
                                                                        <p>{{ $bill_detail->quantity }}</p>
                                                                    @endif

                                                                </div>
                                                                </tr>
                                                            @endforeach --}}

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pager" style="display: flex;justify-content: space-between;">
                                    <div class="page">{{ $WaitingBills->Links() }}</div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- VAN CHUYEN --}}
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('xoabill1'))
                                <div class="alert alert-success">
                                    {{ session('xoabill1') }}
                                </div>
                            @endif
                            <h4 class="card-title">Danh sách đơn hàng đang vận chuyển</h4>
                            <h6 class="card-subtitle">Oder</h6>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Receiver</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">ToTal</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Note</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Create</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($BeingTransportedBills as $bill)
                                            <tr>
                                                <td>{{ $bill->id }}</td>
                                                <td>{{ $bill->Customer->name }}</td>
                                                <td>{{ $bill->Customer->address }}</td>
                                                <td>{{ number_format($bill->total) }}</td>
                                                <td>{{ $bill->Customer->phone_number }}</td>
                                                <td>{{ $bill->note }}</td>
                                                <td><label class="badge badge-info">Đang vận chuyển</label></td>
                                                <td>{{ $bill->created_at }}</td>



                                                <td style="justify-content: space-around">

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalct1{{ $bill->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z" />
                                                        </svg>
                                                    </button>

                                                    <a href="{{ route('admin.chuyendangcho', $bill->id) }}"><button
                                                            class="btn btn-primary"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-check2-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                                                <path
                                                                    d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                                            </svg></button></a>


                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal1{{ $bill->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-x-lg"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                        </svg>
                                                    </button>


                                                </td>
                                            </tr>

                                            {{-- xoa don hang --}}
                                            <div class="modal fade" id="exampleModal1{{ $bill->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b style="color: red;">Bạn chắc chắn muốn hủy đơn hàng
                                                                #{{ $bill->id }} ?</b>


                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">NO</button>
                                                            <form action="{{ route('admin.deleteDangCho', $bill->id) }}">

                                                                <button type="submit"
                                                                    class="btn btn-primary">YES</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="exampleModalct1{{ $bill->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn
                                                                hàng</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{-- <div class="product" style="display:flex;">
                                                              <b>Tên sản phẩm</b>&nbsp;&nbsp;
                                                              <b>Giá</b>&nbsp;&nbsp;
                                                              <b>Số lượng</b>&nbsp;&nbsp;

                                                          </div> --}}
                                                            <div class="customTable"><b>Tên sản phẩm</b></div>
                                                            <div class="customTable"><b>Giá</b></div>
                                                            <div class="customTable"><b>Số lượng</b></div>

                                                            @foreach ($bill_details as $bill_detail)
                                                                @if ($bill_detail->id_bill === $bill->id)
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->Product->name }}
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        @if ($bill_detail->Product->promotion_price == 0.0)
                                                                            {{ $bill_detail->Product->unit_price }}
                                                                        @else
                                                                            {{ $bill_detail->Product->promotion_price }}
                                                                        @endif
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->quantity }}
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            {{-- @foreach ($bill_details as $bill_detail)
                                                              <div class="product" style="display:flex;">


                                                                  @if ($bill_detail->id_bill === $bill->id)
                                                                      <p>{{ $bill_detail->Product->name }}</p>
                                                                      &nbsp;&nbsp;
                                                                      <p>
                                                                          @if ($bill_detail->Product->promotion_price == 0.0)
                                                                              {{ $bill_detail->Product->unit_price }}
                                                                          @else
                                                                              {{ $bill_detail->Product->promotion_price }}
                                                                          @endif
                                                                      </p>&nbsp;&nbsp;
                                                                      <p>{{ $bill_detail->quantity }}</p>
                                                                  @endif

                                                              </div>
                                                              </tr>
                                                          @endforeach --}}

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pager" style="display: flex;justify-content: space-between;">
                                    <div class="page">{{ $BeingTransportedBills->Links() }}</div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- THANH CONG --}}
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <h4 class="card-title">Danh sách đơn hàng thành công</h4>
                            <h6 class="card-subtitle">Oder</h6>
                            
                            <div class="table-responsive">
                                
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Receiver</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">ToTal</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Note</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Create</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($SuccessfulApplication as $bill)
                                            <tr>
                                                <td>{{ $bill->id }}</td>
                                                <td>{{ $bill->Customer->name }}</td>
                                                <td>{{ $bill->Customer->address }}</td>
                                                <td>{{ number_format($bill->total) }}</td>
                                                <td>{{ $bill->Customer->phone_number }}</td>
                                                <td>{{ $bill->note }}</td>
                                                <td><label class="badge badge-success">Thành công</label></td>
                                                <td>{{ $bill->created_at }}</td>



                                                <td style="justify-content: space-around">

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalct2{{ $bill->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z" />
                                                        </svg>
                                                    </button>






                                                </td>
                                            </tr>



                                            <div class="modal fade" id="exampleModalct2{{ $bill->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn
                                                                hàng</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                           
                                                            <div class="customTable"><b>Tên sản phẩm</b></div>
                                                            <div class="customTable"><b>Giá</b></div>
                                                            <div class="customTable"><b>Số lượng</b></div>

                                                            @foreach ($bill_details as $bill_detail)
                                                                @if ($bill_detail->id_bill === $bill->id)
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->Product->name }}
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        @if ($bill_detail->Product->promotion_price == 0.0)
                                                                            {{ $bill_detail->Product->unit_price }}
                                                                        @else
                                                                            {{ $bill_detail->Product->promotion_price }}
                                                                        @endif
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->quantity }}
                                                                    </div>
                                                                @endif
                                                            @endforeach


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pager" style="display: flex;justify-content: space-between;">
                                    <div class="page">{{ $SuccessfulApplication->Links() }}</div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Không thành công --}}
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                          
                            <h4 class="card-title">Danh sách đơn hàng không thành công</h4>
                            <h6 class="card-subtitle">Oder</h6>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Receiver</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">ToTal</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Note</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Create</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ApplicationFailed as $bill)
                                            <tr>
                                                <td>{{ $bill->id }}</td>
                                                <td>{{ $bill->Customer->name }}</td>
                                                <td>{{ $bill->Customer->address }}</td>
                                                <td>{{ number_format($bill->total) }}</td>
                                                <td>{{ $bill->Customer->phone_number }}</td>
                                                <td>{{ $bill->note }}</td>
                                                <td><label class="badge badge-warning"  >Không thành công</label></td>
                                                <td>{{ $bill->created_at }}</td>



                                                <td style="justify-content: space-around">

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalct3{{ $bill->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z" />
                                                        </svg>
                                                    </button>






                                                </td>
                                            </tr>



                                            <div class="modal fade" id="exampleModalct3{{ $bill->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn
                                                                hàng</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{-- <div class="product" style="display:flex;">
                                                            <b>Tên sản phẩm</b>&nbsp;&nbsp;
                                                            <b>Giá</b>&nbsp;&nbsp;
                                                            <b>Số lượng</b>&nbsp;&nbsp;

                                                        </div> --}}
                                                            <div class="customTable"><b>Tên sản phẩm</b></div>
                                                            <div class="customTable"><b>Giá</b></div>
                                                            <div class="customTable"><b>Số lượng</b></div>

                                                            @foreach ($bill_details as $bill_detail)
                                                                @if ($bill_detail->id_bill === $bill->id)
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->Product->name }}
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        @if ($bill_detail->Product->promotion_price == 0.0)
                                                                            {{ $bill_detail->Product->unit_price }}
                                                                        @else
                                                                            {{ $bill_detail->Product->promotion_price }}
                                                                        @endif
                                                                    </div>
                                                                    <div class="customTablesub">
                                                                        {{ $bill_detail->quantity }}
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            {{-- @foreach ($bill_details as $bill_detail)
                                                            <div class="product" style="display:flex;">


                                                                @if ($bill_detail->id_bill === $bill->id)
                                                                    <p>{{ $bill_detail->Product->name }}</p>
                                                                    &nbsp;&nbsp;
                                                                    <p>
                                                                        @if ($bill_detail->Product->promotion_price == 0.0)
                                                                            {{ $bill_detail->Product->unit_price }}
                                                                        @else
                                                                            {{ $bill_detail->Product->promotion_price }}
                                                                        @endif
                                                                    </p>&nbsp;&nbsp;
                                                                    <p>{{ $bill_detail->quantity }}</p>
                                                                @endif

                                                            </div>
                                                            </tr>
                                                        @endforeach --}}

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pager" style="display: flex;justify-content: space-between;">
                                    <div class="page">{{ $ApplicationFailed->Links() }}</div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
