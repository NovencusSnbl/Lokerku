<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: loginkeasramaan.php");
  exit;
}
require 'functions.php';
//pagination
//konfigurasi

$jumlahperhalaman =6;
$result=mysqli_query($conn,"SELECT * FROM mahasiswa");
$jumlahdata=count(query("SELECT * FROM mahasiswa"));
$jumlahhalaman = ceil($jumlahdata/$jumlahperhalaman);

$halamanaktif=(isset($_GET["halaman"]))? $_GET["halaman"] : 1;

$awaldata=($jumlahperhalaman * $halamanaktif)-$jumlahperhalaman;

$loker = query("SELECT * FROM mahasiswa LIMIT $awaldata,$jumlahperhalaman");

if (isset($_POST["cari"])) {
	$loker = cariA($_POST["keyword"]);
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
    <div>
        <ul class="main-nav" style="margin-right: 20px;"	>
          <li><a href="index.php">BERANDA</a></li>
          <li><a href="signin.php">PESAN</a></li>
          <li><a href=about.php"#">TENTANG</a></li>
          <li><a href="logoutadmin.php">LOGOUT</a></li>
        </ul>
      </div>
      
	<br><br><br><br><br><br>  
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" class="cari">
		<button type="submit" name="cari" class="btn cari1">Cari!</button>
	</form><br>



	<a href="pdfbarang.php" target="_BLANK" class="print"><button class="btn print">Print</button></a>
	<a href="pengguna.php" class="action1"><button class="btn simpan">List Data Pengguna</button></a>
	<a href="loker.php" class="action2"><button class="btn ambil">List Loker</button></a>
	<a href="tambahloker.php" class="action2"><button class="btn ambil">Tambah Loker</button></a>
	<a href="barang.php" class="action1"><button class="btn simpan">History Loker</button></a>
	
	<a href="barang.php" class="logout" ><button style="float: right;" class="btn logout">Kembali</button></a><br><br><br><br>
	<p style="font-weight: bold;color: white">
		<?php
			echo "Jumlah Pengguna : ".$jumlahdata." Orang";
		?>
	</p>
	<!-- navigasi -->
		<center>
		<?php if($halamanaktif > 1) :?>
			<a href="?halaman=<?= $halamanaktif -1; ?>" class="pagination1">&lt;</a>
		<?php endif ;?>
		<?php for ($i=1; $i <= $jumlahhalaman; $i++ ) :?>
			<?php if ($i == $halamanaktif) :?>
				<a href="?halaman=<?= $i;?>" style="font-weight: bold;color: blue" class="pagination"><?php echo $i; ?></a>
			<?php else :?>
				<a href="?halaman=<?= $i;?>" class="pagination1"><?php echo $i; ?></a>
			<?php endif ;?>
		<?php endfor;?>
		<?php if($halamanaktif < $jumlahhalaman) :?>
			<a href="?halaman=<?= $halamanaktif +1; ?>" class="pagination1">&gt;</a>
		<?php endif ;?>
	</center>
	<div class="table-responsive">
	
	<table border="1">
		<tr>		
			<th>NIM</th>
			<th>Nama</th>
			<th>Program Studi</th>
			

		</tr>
		<?php foreach ($loker as $row):?> 
	
		<tr>
			<td><?php echo $row["idmhs"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["prodi"]; ?></td>
			
		</tr>
		
	<?php endforeach ;?> 
	</table>
	</div>
	
</body>
</html>
