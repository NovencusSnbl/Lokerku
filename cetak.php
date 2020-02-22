<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

$loker = query("SELECT * FROM barang");

if (isset($_POST["cari"])) {
	$loker = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loker_KU</title>
	<style>
	@media print{
		.logout,.action1,.action2,.cari,.print{
			display: none;
		}	

		
	}

	</style>
</head>
<body> 	
	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" class="cari">
		<button type="submit" name="cari" class="cari">Cari!</button>
	</form><br>
	<a href="barang.php" target="_BLANK" class="print">print</a>

	<table border="1">
		<tr>
			<td>ID Barang</td>
			<td>Nama Barang</td>
			<td>Ciri - ciri</td>
			<td>ID Loker</td>
			<td>Status Barang</td>
			<td>Gambar</td>
			<td>Waktu Simpan</td>
			<td>Waktu Ambil</td>

		</tr>
		<?php foreach ($loker as $row):?> 
	
		<tr>
			<td><?php echo $row["idbarang"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["ciri"]; ?><br></td>
			<td><?php echo $row["idloker"]; ?><br></td>	
			<td><?php
				if ($row["status"] == 0) {
					echo "Belum diambil";
				}
				else
					echo "Sudah diambil";
			 ?><br></td>
			<td><img src="img/<?php echo $row["gambar"] ?>" style="width:120px"></td>
			<td><?php echo $row["waktuS"]; ?></td>
			<td><?php echo $row["waktuA"]; ?></td>
		</tr>
		
	<?php endforeach ;?>
	</table>
	<a href="logout.php" class="logout">Logout</a>
	<script>
		window.print();n  
	</script>
</body>
</html>
