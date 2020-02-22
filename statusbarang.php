 <?php
 require'functions.php';

 //ambil data dari URL
 $id=$_GET["idbarang"];
 //query data mahasiswa berdasarkan id
 $mhs=query("SELECT * FROM barang WHERE idbarang=$id")[0];

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Data Barang Saya</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
    
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
	<style type="text/css">
	table{
	border-color: transparent;
	color: white;
	
	}

	th, td {
	    text-align: center;
	    padding: 8px;
	    color: white;	
	}

	tr:nth-child{background-color: #f2f2f2}

	th {
	    color: white;

	}
	</style>
</head>
<center>
<body style="background-image:url(image/loker2.jpg);background-size: cover;">
	<br><br><h1 style="color:  #ff9800">Data Barang Saya</h1><hr style="border-width: 2px ;width: 200px;border-color: #ff9800;"><br><br><br>
	<form action="" method="post">
		<fieldset style="background-color: #ff9800;width: 50%">
		<table border="">
			<tr>
				<th>ID Barang</th>				
				<td></td>
				<td><?php echo $mhs["idbarang"]; ?></td>
			</tr>
			<tr>
				<th>Nama Barang</th>
				<td></td>
				<td><?php echo $mhs["nama"]; ?></td>
			</tr>
			<tr>
				<th>Ciri-ciri</th>
				<td></td>
				<td><?php echo $mhs["ciri"]; ?><br></td>
			</tr>
			<tr>
				<th>ID Loker</th>
				<td></td>
				<td><?php echo $mhs["idloker"]; ?><br></td>
			</tr>
			<tr>
				<th>Gambar</th>
				<td></td>
				<td><img src="img/<?php echo $mhs["gambar"] ?>" style="width:120px"></td>
			</tr>
			<tr>
				<th>Status</th>
				<td></td>
				<td><?php
					if ($mhs["status"] == 0) {
						echo "Belum diambil";
					}
					else{
						echo "sudah diambil";
					}

				 ?></td>
			</tr>
		</table>
		</fieldset>
	</form>
</body>
</center>
</html>