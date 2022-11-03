{{-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<!-- sentData được truyền từ app\Mail\SendMail.php -->
	<h1>{{ $sentData['title'] }}</h1>
    <p>{{ $sentData['body'] }}</p>
</body>
</html> --}}
<div style="width: 600px; margin: 0 auto; background-color: rgb(218, 218, 227);padding: 50px; ">
	<div style="text-align: center">
		<h2>Xin chào {{ $sentData['full_name'] }}</h2>
		<p>Email này giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
		<p>Vui lòng click vào nút bên dưới đây để đặt lại mật khẩu</p>
		<p><a href="{{ route('user.getPass', ['user' => $sentData['user']->id , 'token' => $sentData['token']]) }}" style="display: inline-block;background: green;color:#fff;padding: 7px 25px; font-weight: bold">Lấy lại mật khẩu</a></p>
	
	</div>


</div>