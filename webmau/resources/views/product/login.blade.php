@extends('layout.index')

@section('content')

    <form action="{{ route('login') }}" method="post" class="beta-form-checkout">
        @csrf
     
        <div class="row">
            <div id="content">
             
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                @if (session('message'))
                <div class="alert alert-success">
        {{session('message')}}
                </div>
    @endif
                @if (session('dx'))
                
                    {{ session('dx') }}
                </div>
            @endif
            @if (session('dk'))
            <div class="alert alert-success">
                {{ session('dk') }}
            </div>
        @endif
        @if (session('yes'))
        <div class="alert alert-success">
            {{ session('yes') }}
        </div>
    @endif
                <h4>Đăng nhập</h4>
                <div class="space20">&nbsp;</div>

                
                <div class="form-block">
                    <label for="email">Email address*</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-block">
                    <label for="phone">Password*</label>
                    <input type="password" id="phone" name="password" required>
                </div>
                <div class="form-block">
                    <a href="/input-email">Quên mật khẩu</a>
                </div>
 
                @error('newpass')
                    {{$message}}
                @enderror
                <div class="form-block">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div> <!-- #content -->     

@endsection