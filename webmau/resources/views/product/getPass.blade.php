@extends('layout.index')

@section('content')

    <form action="" method="post" class="beta-form-checkout">
        @csrf
     
        <div class="row">
            <div id="content">
             
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                @foreach ($errors->all() as $error)
                <div class="alert alert-success">
                    {{ $error }}
                </div>
            @endforeach
            
                <h4>Đặt lại mật khẩu</h4>
                <div class="space20">&nbsp;</div>

                
                <div class="form-block">
                    <label for="email">New Password</label>
                    <input type="password" id="email" name="newpass" required>
                </div>
                <div class="form-block">
                    <label for="phone">Re password</label>
                    <input type="password" id="phone" name="repass" required>
                </div>
               
              
               
                <div class="form-block">
                    <button type="submit" class="btn btn-primary">Lấy lại mật khẩu</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div> <!-- #content -->     

@endsection