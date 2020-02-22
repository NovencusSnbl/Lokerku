 <?php
 session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
 require'functions.php';
 if(isset($_POST["submitL"])) {

 //cek apakah data berhasil dikirm atau tidak
 if(tambahloker($_POST)>0) {
    echo "
    <script>
    alert('Data Berhasil ditambahkan');
    
    </script>
    ";
 }
 else{
    echo "
    ";
 }
 }

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
    <link rel="stylesheet" type="text/css" href="css/new.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<style type="text/css">
   *{
    padding: 0; margin: 0;
}

  </style>
<center>
<body style="background-image:url(image/loker2.jpg);background-size: cover;">
    
    <br>
    <br>
    <br>
    <br>
    <a href="barang.php" class="logout" ><button style="float: right;" class="btn logout">Kembali</button></a><br><br><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Tambah Loker Mahasiswa</h1>

        <table>         
            
        <div class="container">
            <label><b>ID Loker</b></label><br>
                <input type="text" name="idloker" required style="width: 100%"><br>
            <label><b>Nomor Loker</b></label><br>
                <input type="text" name="no_loker" required style="width: 100%"><br>
        <br><label><b>ID Mahasiswa</b></label><br>
                <input type="text" name="idmhs" required style="width: 100%">
                <br><br>
            <label><b>PIN</b></label>
                <input type="password" name="pin" >
                <br><br>
            <label><b>Konfirmasi PIN</b></label>
                <input type="password" name="pin2" >
                <br>
        <input type="hidden" name="status">
  </div>
        </table>
        <br>
        <button type="submit" name="submitL">Tambahkan data</button>
    </form>
</body>
</center>
</html>