<!DOCTYPE HTML>
<html>
<head>
<title>TRANG QUẢN LÝ ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css')}}" type="text/css"/>
<!-- Graph CSS -->
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/backend/css/jquery-ui.css')}}"> 
<!-- jQuery -->
<script src="{{asset('public/backend/js/jquery-2.1.4.min.js')}}"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/icon-font.min.css')}}" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>ĐĂNG NHẬP</h2>
		<?php
		$message = Session::get('message');
		if($message){
			echo '<span class="text-alert">',$message,'</span>';
			Session::put('message',null);
		}
		?>
		<form action="{{URL::to('/admin-dashboard')}}" method="post">
			{{ csrf_field() }}
			<span class="username">Username:</span>
			<input type="text" name="admin_email" class="name" placeholder="Nhập email" required="">
			<span class="username">Password:</span>
			<input type="password" name="admin_password" class="password" placeholder="Nhập password" required="">
				
			<div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember">Nhớ lần đăng nhập<br>
				<a href="#">Quên mật khẩu</a><br>
			</div>
			<div class="login-w3">
					<input type="submit" class="login" value="Đăng Nhập">
			</div>
			<div class="clearfix"></div>
		</form>
		<!-- <a href="{{url('/login-google')}}">Login Google</a>
 -->				
	</div>
	</div>
</body>
</html>