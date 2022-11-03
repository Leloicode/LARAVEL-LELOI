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
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                        <h4 class="card-title">Danh sách người dùng</h4>
                        <h6 class="card-subtitle">user</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Permission</th>
                                        <th class="border-top-0">Full_name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Address</th>
                                        <th class="border-top-0">Create</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        
                                 
                                    <tr  @if ($user->level == 1) style="background-color: #ccc;" @endif>
                                        <td>{{$user->id}}</td>
                                        <td>@if ($user->level == 1)
                                            Admin
                                            @elseif ($user->level == 3)
                                            User
                                        @endif</td>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td style="display: flex; padding: 10px">
                                            <!-- Button trigger modal -->
                                            <button type="button" id="quyenbt" class="btn btn-primary mr-1" data-toggle="modal" value="{{$user->level}}" onclick="quyen()" data-target="#modelquyen{{$user->id}}">
                                              Bậc
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="modelquyen{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Quyền hạng</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <form action="{{ route('admin.ChangeLogin',$user->id) }}" method="POST">  
                                                            @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group"> 
                                                              <label for="">Chọn quyền hạng</label>
                                                              <select class="form-control" name="level" id="level" onchange="Changesave()" >
                                                                <option  @if ($user->level == 1) selected @endif value="1" >1 - Admin</option>
                                                                <option @if ($user->level == 3) selected @endif value="3" >3 - User</option>
                                                              
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                           
                                                                
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                 
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($user->level == 3)  <a href="{{ route('admin.edituser', $user->id) }}"> @endif  <button type="submit" @if ($user->level == 1) disabled @endif class="btn btn-primary">Sửa</button> @if ($user->level == 3) </a> @endif
                                          
                                     
                                        <form action="{{ route('deleteuser',$user->id) }}" method="POST">  
                                            @csrf
                                            
                                        <button type="submit"  @if ($user->level == 1) disabled @endif class="btn btn-outline-primary" style="margin-left: 5px">Xóa</button>
                                    </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$users->Links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

</div>

@endsection
@section('js')
{{-- <script>
    function quyen() {
        const quyenbt = document.getElementById("quyenbt").value;
        alert(quyenbt);
    }
    
    function Changesave() {
        const quyen = document.getElementById("level").value;
        
        alert(quyen);
        if (quyenbandau == quyen) {
           return alert('bằng nhau');
        }
        else{
            return alert('không bằng');
        }
        }
        //alert(quyen.value);

    
</script> --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection