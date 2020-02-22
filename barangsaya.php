<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

$loker = query("SELECT loker.no_loker,loker.idloker,loker.idmhs,barang.idbarang,barang.nama,barang.ciri,barang.gambar,barang.status,barang.waktuS,barang.waktuA FROM loker INNER JOIN 
		barang ON loker.idloker = barang.idloker ");

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
	<a href="cetak.php" target="_BLANK" class="print">print</a>
	<table border="1">
		<tr>
			<td>No Loker</td>
			<td>ID Loker</td>
			<td>ID Mahasiswa</td>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>Status Barang</th>
			<th>Gambar</th>
			<th>Waktu Simpan</th>
			<th>Waktu Ambil</th>
		</tr>
		<?php foreach ($loker as $row):?> 
	
		<tr>
			<td><?php echo $row["no_loker"]; ?></td>
			<td><?php echo $row["idloker"]; ?></td>
			<td><?php echo $row["idmhs"]; ?></td>	
			<td><?php echo $row["idbarang"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["ciri"]; ?></td>
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
</body>
</html>
