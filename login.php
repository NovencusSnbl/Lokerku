
<?php
session_start();
require 'functions.php';	
	if (isset($_POST["login"])) {
		
		$idloker = $_POST["idloker"];
		$pin = $_POST["pin"];
		
		//username udah ada apa belum
		$result = mysqli_query($conn, "SELECT * FROM loker WHERE idloker='$idloker'");

		//cek username
		if (mysqli_num_rows($result) === 1) {
			//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($pin,$row["pin"])) {
			//set session
			$_SESSION["login"] = true;
				header("Location: barangmahasiswa.php?idloker=$idloker");
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
     <link rel="stylesheet" type="text/css" href="css/signin.css">
    <style type="text/css">
    	/* SIGNIN STYLE */
		body {
			color: #999;
			background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(image/loker2.jpg);
			font-family: 'Fredoka One', cursive;
			background-size: cover;
		}

		
    </style>
<body>
	<div> 
        <ul class="main-nav" style="margin-right: 20px;margin-top: 0px"	>
          <li><a href="index.php">BERANDA</a></li>
          <li><a href="penyimpanan.php">PENYIMPANAN</a></li>
          <li><a href="#">PESAN</a></li>
          <li><a href="#">TENTANG</a></li>
    
        </ul>
      </div>
	<h1></h1>
	<?php if (isset($error) == true) :?>
		<p style="color: white; font-style: italic;"><fieldset style="background-color: hsl(0, 80%, 50%)"><center>Username atau password salah</center></fieldset></p>
	<?php endif ; ?>
	<div class="signin-form">

	<form action="" method="post">
			<div class="form-header">
				<h2>Silahkan Masuk Sebagai Mahasiswa</h2>
			</div>			
		<table>
		<tr>
			<div class="form-group" style="margin-bottom: 20px;">
				<td>Username</td>
				<td></td>
				<td><input type="text" name="idloker" id="username" class="form-control" placeholder="Username"></td>
			</div>
		</tr>
		<tr>
			<div class="form-group">
				<td>Password&nbsp&nbsp&nbsp&nbsp</td>
				<td></td>
				<td><input type="password" name="pin" id="pasword" class="form-control" placeholder="password" autocomplete="off" style="margin-top: 20px;" required></td>
			</div><br
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" name="login" class="btn btn-primary btn-block btn-lg" placeholder="Password" autocomplete="off" style="margin-top: 20px;color: white">Login</button></td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>
