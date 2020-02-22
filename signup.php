<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
    <style type="text/css">
    	/* SIGNUP STYLE */
		body {
			color: #999;
			background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(image/loker2.jpg);
			font-family: 'Fredoka One', cursive;
			background-size: cover;
		}

		.form-control {
			min-height: 41px;
			box-shadow: none;
			border-color: #e1e1e1;
		}

		.form-control:focus{
			border-color: #e67e22;
		}

		.form-control, .btn{
			border-radius: 3px;
		}

		.form-header {
			margin: -30px -30px 20px;
			padding: 30px 30px 10px;
			text-align: center;
			background: #e67e22;
			border-bottom: 1px solid #eee;
			color: #fff;
		}

		.form-header h2{
			font-size: 34px;
			font-weight: bold;
			margin: 0 0 10px;
			font-family: 'Quicksand', sans-serif;
		}

		.form-header p{
			margin: 20px 0 15px;
			font-size: 17px;
			line-height: normal;
			font-family: 'Fredoka One', cursive;
		}

		.signup-form {
			width: 390px;
			margin: 0 auto;
			padding: 30px 0;
		}

		.signup-form form{
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #f0f0f0;
			box-shadow: 0px 2px 2px rgba(0,0,0,0.3);
			padding: 30px;
		}

		.signup-form .form-group{
			margin-bottom: 20px;
		}

		.signup-form label{
			font-weight: normal;
			font-size: 13px;
		}

		.signup-form .btn{
			font-size: 16px;
			font-weight: bold;
			background: #e67e22;
			border: none;
			min-width: 200px;
		}

		.signup-form .btn:hover, .signin-form .btn:focus{
			background: #00b073 !important;
			outline: none;
		}

		.signup-form a{
			color: #00cb82;
		}

		.signup-form a:hover {
			text-decoration: underline;
		}
    </style>
</head> 
<body>
	<div class="signup-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Isi format dibawah ini</p>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="user_name" placeholder="masukkan username" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="user_email" placeholder="josxxx@gmail.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
			</div>
			<?php include("signup_user.php"); ?>
		</form>
		<div class="text-center small" style="color: #e67e22;">Sudah punya akun? <a href="signin.php">Masuk disini</a></div>
	</div>
	
</body>
</html>