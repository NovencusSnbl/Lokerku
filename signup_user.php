<?php 
	include("include/connection.php");

	if(isset($_POST['sign_up'])) { 
		
		$name  = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
		$pass  = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
		$rand  = rand(1, 2);

		if($name == ''){
			echo"<script>alert('Anda tidak dapat terverifikasi')</script>";
		}
		if(strlen($pass)<8){
			echo"<script>alert('Password harus minimum 8 karakter')</script>";
			exit();
		}

		$check_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($con, $check_email);

		$check = mysqli_num_rows($run_email);

		if($check==1){
			echo "<script>alert('Email sudah ada, silahkan coba kembali')</script>";
			echo "<script>window.open('sign_up.php', '_self')</script>";
			exit();
		}

		if($rand == 1) 
			$profile_pic = "image/user.png";
		else if($rand == 2) 
				$profile_pic = "image/user.png";


		$insert = "insert into users(user_name, user_pass, user_email, user_profile) 
					values('$name', '$pass', '$email', '$profile_pic')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Selamat $name ! Akun anda berhasil didaftarkan')</script>";

			echo "<script>window.open('signin.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registrasi gagal, coba lagi!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}			

	}
 ?>