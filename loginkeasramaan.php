<?php
session_start();
require 'functions.php';	
	if (isset($_POST["login"])) {
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		//username udah ada apa belum
		$result = mysqli_query($conn, "SELECT * FROM keasramaan WHERE usernameK = '$username'");

		//cek username
		if (mysqli_num_rows($result) === 1) {
			//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password,$row["passwordK"])) {
			//set session
			$_SESSION["login"] = true;
				header("Location: barang.php");
				// header("Location : awal.php");
				exit;
			}
			else{
				$error = true;	
			}
		}
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
</head>
<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
    	/* SIGNIN STYLE */
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
			font-size: 15px;
			line-height: normal;
			font-family: 'Fredoka One', cursive;
		}

		.signin-form {
			width: 390px;
			margin: 0 auto;
			padding: 30px 0;
		}

		.signin-form form{
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #f0f0f0;
			box-shadow: 0px 2px 2px rgba(0,0,0,0.3);
			padding: 30px;
			margin-top: 100px;
		}

		.signin-form .form-group{
			margin-bottom: 20px;
		}

		.signin-form label{
			font-weight: normal;
			font-size: 13px;
		}

		.signin-form .btn{
			font-size: 16px;
			font-weight: bold;
			background: #e67e22;
			border: none;
			min-width: 200px;
		}

		.signin-form .btn:hover, .signin-form .btn:focus{
			background: #00b073 !important;
			outline: none;
		}

		.signin-form a{
			color: #00b073;
		}

		.signin-form a:hover {
			text-decoration: underline;
		}
    </style>
<body>
	<div> 
        <ul class="main-nav" style="margin-right: 20px;margin-top: 0px"	>
          <li><a href="index.php">BERANDA</a></li>
          <li><a href="penyimpanan.php">PENYIMPANAN</a></li>
          <li><a href="signin.php">PESAN</a></li>
          <li><a href="about.php">TENTANG</a></li>
    
        </ul>
      </div>
	<h1></h1>
	<?php if (isset($error) == true) :?>
		<p style="color: white; font-style: italic;"><fieldset style="background-color: hsl(0, 80%, 50%)"><center>Username atau password salah</center></fieldset></p>
	<?php endif ; ?>
	<div class="signin-form">

	<form action="" method="post">
			<div class="form-header">
				<h2>Silahkan Masuk Sebagai Admin</h2>
			</div>			
		<table>
		<tr>
			<div class="form-group" style="margin-bottom: 20px;">
				<td>Username</td>
				<td></td>
				<td><input type="text" name="username" id="username" class="form-control" placeholder="Username"></td>
			</div>
		</tr>
		<tr>
			<div class="form-group">
				<td>Password&nbsp&nbsp&nbsp&nbsp</td>
				<td></td>
				<td><input type="password" name="password" id="pasword" class="form-control" placeholder="password" autocomplete="off" style="margin-top: 20px;" required></td>
			</div><br
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" name="login" class="btn btn-primary btn-block btn-lg" placeholder="Password" autocomplete="off" style="margin-top: 20px;color: white;">Login</button></td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>
