 <?php
 session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
 require'functions.php';
 $idloker=$_GET["idloker"];
 $loker = query("SELECT loker.idloker,barang.nama,barang.idbarang,barang.ciri,barang.gambar,barang.status FROM loker
 INNER JOIN barang ON loker.idloker = barang.idloker WHERE loker.idloker=$idloker");
 if(isset($_POST["submit"])) {

 //cek apakah data berhasil dikirm atau tidak
 if(tambah($_POST)>0) {
 	echo "
 	<script>
 	alert('Data Berhasil ditambahkan');
 	document.location.href = 'barangmahasiswa.php?idloker=$idloker'
 	</script>
 	";
 }
 else{
 	echo "
 	<script>
 	alert('Data Gagal ditambahkan');
 	document.location.href = 'barangmahasiswa.php?idloker=$idloker'
 	</script>
 	";
 }
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Barang</title>
</head>
<style type="text/css">
   *{
    padding: 0; margin: 0;
}
h2{
  color:#50626C;
  text-align: center;
  font-family: arial;
  text-transform: uppercase;
  border: 3px solid #f1f1f1;
  padding: 5px;
  width: 490px;
  margin: auto;
  margin-bottom: 10px;
    margin-top: 20px;
}
form {
    border: 3px solid #f1f1f1;
    font-family: arial;
    width: 500px;
    margin: auto;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
label{
  color:white;
  text-transform: uppercase;
}
button {
    background-color: #049372;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f03434;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;

}
span{
  color:#50626C;
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
} 
  </style>
<center>
<body style="background-image:url(image/loker2.jpg);background-size: cover;">
	<br>
	<br>
	<br>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<h1>Tambah Barang Mahasiswa</h1>
		<table>			
			
			<div class="container">
	    <label><b>Nama Barang</b></label>
	    <input type="text" name="nama" placeholder="masukkan merek atau nama barang" required><br>

	    <br><label><b>Jenis Barang</b></label><br>
	    <select name="ciri" style="width: 460px;height: 40px;"><br>
	            <option>--Pilih salah satu--</option>
	            <option>Peralatan Mandi</option>
	            <option>Peralatan Mencuci</option>
	            <option>Peralatan Elektronik</option>
	            <option>Pakaian</option>
	            <option>Peralatan Belajar</option>
	            <option>Buku</option>
	            <option>Sendal/Sepatu</option>
	          </select><br>

	    <br><label><b>idloker</b></label>
	    <input type="text" placeholder="masukkan sesuai id loker anda" name="idloker" required>
	    <br><br>
	    <label><b>gambar</b></label><br>
	    <fieldset style="background-color: white">
	    <input type="file" name="gambar" required style="color: black;padding-top: 6px;padding-bottom: 6px;">
	    </fieldset>

	        
	    <input type="hidden" name="status">
  </div>
		</table>
		<br>
		<button type="submit" name="submit" style="width: 93%">Tambahkan data</button>
	</form>
</body>
</center>
</html>