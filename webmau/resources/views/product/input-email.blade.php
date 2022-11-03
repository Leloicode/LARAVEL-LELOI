@extends('layout.index')
@section('content')
<div class="container">
    <div class="row" style="height:300px; max-width: 500px; margin: auto;padding: 10px;">
        <div class="column"> 
            @if (session('message'))
                {{session('message')}}
            @endif
            <div class="login-form" style="background-color: rgb(211, 224, 224);padding: 20px ">
                <form action='{{route('postInputEmail')}}' method='POST'>
                    @csrf
                    <h1>Reset mật khẩu</h1>
                    <div class="input-box">
                        <i ></i>
                        <input style="margin-top: 10px " name="email" type="text" placeholder="Nhập địa chỉ email của bạn để nhận mật khẩu mới" value="{{ isset($request->txtEmail)?$request->txtEmail:'' }}">
                        @error('email')
                        <small class="help-block">{{$message}}</small>
                            
                        @enderror
                        <span class="error"></span>
                    </div>
                    <div class="btn-box">
                        <button  style="margin-top: 10px" class="btn btn-primary" type='submit'  name="btnGetPassword" >Nhận mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- .container -->

@endsection