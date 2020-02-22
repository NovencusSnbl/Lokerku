<?php 
require 'functions.php'; 
if (isset($_POST["register"])) {
	if (registrasiA($_POST) > 0) {
		echo "
			<script>
				alert ('Admin berhasil ditambahkan!');
			</script>
		";
	}
	else {
		echo mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
</head>
<body>

<h1>Halaman Registrasi</h1>
<form action="" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td></td>
			<td><input type="text" name="username" id="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td></td>
			<td><input type="password" name="password" id="pasword"></td>
		</tr>
		<tr>
			<td>Konfirmasi Password</td>
			<td></td>
			<td><input type="password" name="password2" id="password2"></td>
		</tr>
		<tr>
			<td>Nama</td>		
			<td></td>
			<td><input type="nama" name="nama" id="nama"></td>
		</tr>
		<tr>
			<td>email</td>		
			<td></td>
			<td><input type="email" name="email" id="email"></td>
		</tr>
			
			
			<td><button type="submit" name="register">Register</button></td>
		</tr>
	</table>
</form>
</body>
</html>