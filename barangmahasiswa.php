<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: login.php");
   exit;
 }
require 'functions.php';
//pagination
//konfigurasi
$id=$_GET["idloker"];
 //query data mahasiswa berdasarkan id

$jumlahperhalaman =6;
$result=mysqli_query($conn,"
	SELECT loker.idloker,barang.nama,barang.idbarang,barang.idloker,barang.ciri,barang.gambar,barang.status FROM loker
 INNER JOIN barang ON loker.idloker = barang.idloker WHERE barang.idloker = $id;
	");
$jumlahdata=count(query("
SELECT loker.idloker,barang.nama,barang.ciri,barang.gambar,barang.status FROM loker
 INNER JOIN barang ON loker.idloker = barang.idloker WHERE barang.idloker = $id;
	"));
$jumlahhalaman = ceil($jumlahdata/$jumlahperhalaman);

$halamanaktif=(isset($_GET["halaman"]))? $_GET["halaman"] : 1;

$awaldata=($jumlahperhalaman * $halamanaktif)-$jumlahperhalaman;

$loker = query("SELECT loker.idloker,barang.idbarang,barang.nama,barang.ciri,barang.gambar,barang.status FROM loker
 INNER JOIN barang ON loker.idloker = barang.idloker WHERE barang.idloker=$id LIMIT $awaldata,$jumlahperhalaman");

if (isset($_POST["cari"])) {
	$loker = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loker_KU</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
    
    
    <script src="js/jquery-3.3.1.min.js"></scr	ipt>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/table.css">
	<style>
	@media print{
		.logout,.action1,.action2,.cari,.print{
			display: none;
		}		
	}
table{
	margin-top: 50px;
	color: white;

	
}
table {
    border-collapse: collapse;
    width: 100%;
    border-color: white;
}

th, td {
    text-align: center;
    padding: 8px;
    
}

tr:nth-child{background-color: #f2f2f2}

th {
    background-color: #ff9800;
    color: white;
}
</style>


</head>
<body style="background-image:url(image/loker2.jpg);background-size: cover;">
	
    <div>         <ul class="main-nav" style="margin-right: 20px;"    >
<li><a href="signin.php">PESAN</a></li>           <li><a
href="logout.php">LOGOUT</a></li>         </ul>       </div>
      
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" class="cari">
		<button type="submit" name="cari" class="btn cari1">Cari!</button>
	</form><br>
	<!-- <a href="tambah.php?idloker=<?= $_GET["idloker"]; ?>" class="action1"><button class="btn simpan">Log Penyimpanan</button></a>
	<a href="ambil.php?idloker=<?= $_GET["idloker"]; ?>" class="action2"><button class="btn ambil">Log Pengambilan</button></a> -->
	<a href="simpan_pin.php?idloker=<?= $_GET["idloker"]; ?>" class="action1"><button class="btn simpan">Log Penyimpanan</button></a>
	<a href="ambil_pin.php?idloker=<?= $_GET["idloker"]; ?>" class="action2"><button class="btn ambil">Log Pengambilan</button></a>
	
<!-- 	<a href="barangmahasiswa.php?idloker=<?= $_GET["idloker"]; ?>" class="logout"><button style="float: right;" class="btn logout">Kembali</button></a><br><br><br><br>
 -->	<!-- navigasi -->
 	<br><br><br><br><br>
	<center>
		<?php if($halamanaktif > 1) :?>
			<a href="?halaman=<?= $halamanaktif -1; ?>&idloker=<?=$_GET['idloker']?>" class="pagination1">&lt;</a>
		<?php endif ;?>
		<?php for ($i=1; $i <= $jumlahhalaman; $i++ ) :?>
			<?php if ($i == $halamanaktif) :?>
				<a href="?halaman=<?= $i;?>&idloker=<?=$_GET['idloker']?>" style="font-weight: bold;color: blue" class="pagination"><?php echo $i; ?></a>
			<?php else :?>
				<a href="?halaman=<?= $i;?>&idloker=<?=$_GET['idloker']?>" class="pagination1"><?php echo $i; ?></a>
			<?php endif ;?>
		<?php endfor;?>
		<?php if($halamanaktif < $jumlahhalaman) :?>
			<a href="?halaman=<?= $halamanaktif -1; ?>&idloker=<?=$_GET['idloker']?>" class="pagination1">&gt;</a>
		<?php endif ;?>
	</center>
	<div class="table-responsive">
	
	<table border="1">
		<tr>
			
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>ID Loker</td>
			<th>Status Barang</th>
			<th>Gambar</th>
			<th>Aksi</th>

		</tr>
		<?php foreach ($loker as $row):?> 
	
		<tr>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["ciri"]; ?></td>
			<td><?php echo $row["idloker"]; ?><br></td>	
			<td><?php
				if ($row["status"] == 0) {
					echo "Belum diambil";
				}
				else
					echo "Sudah diambil";
			 ?><br></td>
			<td><img src="img/<?php echo $row["gambar"] ?>" style="width:120px"></td>
			<td>
				<a href="statusbarang.php?idbarang=<?= $row["idbarang"]; ?>" class="action2"><button class="btn status">Status</button></a>
			</td>
		</tr>
		
	<?php endforeach ;?> 
	</table>
	</div>
	
</body>
</html>
