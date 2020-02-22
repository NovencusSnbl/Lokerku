<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}


require 'functions.php';
$id=$_GET["idloker"];
$loker = query("SELECT loker.idloker,barang.nama,barang.idbarang,barang.ciri,barang.gambar,barang.status FROM loker
 INNER JOIN barang ON loker.idloker = barang.idloker WHERE loker.idloker=$id");

if (isset($_POST["cari"])) {
	$loker = cari($_POST["keyword"]);
}

if (isset($_POST["ambil"])) {
	$status = ambil($_POST['status']);
	$waktuA = ambil($_POST['waktuA']);
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loker_KU</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
    
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
	<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
    border-color: white;
    margin-top: 80px;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child{background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
.btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}
.danger {
	background-color: #f44336;
	border-radius: 5px;
	} /* Red */ 
.danger:hover {background: #da190b;}
.cari1{
	background-color:SlateBlue;
	border-radius: 5px;
	margin-left: 5px;
	margin-top: 10px;
}
input[type=text], select {

    width: 40%;
    padding: 14px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.logout {
	background-color:hsl(0, 0%, 50%);
	border-radius: 5px;
	float: left;

	

} /* Orange */
.logout:hover {background: #e68a00;}
	</style>
</head>
<body style="background-image: url(image/loker2.jpg);background-size: cover;color: white;"> 
<div>
        <ul class="main-nav" style="margin-right: 20px;">
          <li><a href="penyimpanan.php">PENYIMPANAN</a></li>
          <li><a href="signin.php">PESAN</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </div>
      
	<br><br>	
	
	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
		<button type="submit" name="cari" class="btn cari1">Cari!</button>
	</form><br>	
	<a href="barangmahasiswa.php?idloker=<?= $_GET["idloker"]; ?>" class="logout"><button style="float: right;" class="btn logout">Kembali</button></a>
	<table border="1">
		<tr>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Ciri - ciri</th>
			<th>Gambar</th>
			<th>ID Loker</th>
			<th>Status Barang</th>
			<th>aksi</th>
		</tr>
		<?php foreach ($loker as $row):?> 
	
		<tr>
			<td><?php echo $row["idbarang"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["ciri"]; ?><br></td>
			<td><img src="img/<?php echo $row["gambar"] ?>" style="width:120px"></td>
			<td><?php echo $row["idloker"]; ?><br></td>
			<td><?php
				
				if ($row["status"] == 0) {
					echo "Belum diambil";
				}
				else
					echo "Sudah diambil";
			 ?><br></td>
		<td><a href="ambilbarang.php?idbarang=<?= $row["idbarang"]; ?>&idloker=<?= $_GET["idloker"]; ?>" onclick="return confirm('Apakah anda yakin?');"><button type="submit" name="ambil" class="btn danger" >Ambil</button></a></td>
		</tr>
		
	<?php endforeach ;?>
	</table>
	
</body>
</html>
