<!doctype html>

<html lang="en">

<head>
    <title>Login Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/foderlogin/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
          
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(/foderlogin/images/imagelogin.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            
                            <div class="d-flex">
                                
                                <div class="w-100">
                                    @if (session('dx'))
                                    <div class="alert alert-success">
                                        {{ session('dx') }}
                                    </div>
                                @endif
                                    <h3 class="mb-4">Sign In</h3>
                                </div>

                            </div>

                            <form action="{{ route('postloginadmin') }}" method="post" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="email" class="form-control" name="email" placeholder="Username" value="" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="" required>
                                </div>
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            @if (session('flag'))
           
                                <p>{{ session('message') }}</p>

                        @endif
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>

                            </form>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/foderlogin/js/jquery.min.js"></script>
    <script src="/foderlogin/js/popper.js"></script>
    <script src="/foderlogin/js/bootstrap.min.js"></script>
    <script src="/foderlogin/js/main.js"></script>

</body>

</html>