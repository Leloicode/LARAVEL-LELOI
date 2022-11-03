@extends('layout.index')
@section('content')
<div id="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('signup') }}" method="post" class="beta-form-checkout">
       @csrf
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h4>Đăng kí</h4>
                <div class="space20">&nbsp;</div>

                
                <div class="form-block">
                    <label for="email">FULL_NAME</label>
                    <input type="text" id="name" name="full_name"  required>
                </div>

                <div class="form-block">
                    <label for="your_last_name">EMAIL</label>
                    <input type="email" id="email" name="email" required>
                </div>

        


                <div class="form-block">
                    <label for="phone">PHONE</label>
                    <input type="number" id="phone" name="phone" required>
                </div>
                <div class="form-block">
                    <label for="phone">ADDRESS</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-block">
                    <label for="adress">PASSWORD</label>
                    <input type="password" id="adress"  name="password" required>
                </div>
                <div class="form-block">
                    <label for="phone">Re password*</label>
                    <input type="password" id="phone" name="repassword" required>
                </div>
                <div class="form-block">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div> <!-- #content -->
@endsection