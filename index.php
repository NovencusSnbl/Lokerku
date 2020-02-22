<?php
require 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>LokerKu</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">


</head>
<body>
    <header style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(image/loker2.jpg);">
      <div class="row">
          <div class="logo">
            <img src="image/logo.png" class="img-circle">
          </div>
        <ul class="main-nav">
          <li><a href="index.php">BERANDA</a></li>
          <li><a href="penyimpanan.php">PENYIMPANAN</a></li>
          <li><a href="signin.php">PESAN</a></li>
          <li><a href="about.php">TENTANG</a></li>
        </ul>
      </div>
      <div class="hero">
        <h1>PENYIMPANAN BARANG <br>MENJADI LEBIH BAIK DI LOKERKU</h1>
          <div class="button">
            <a href="login.php" class="btn btn-half">Mahasiswa</a>
            <a href="loginkeasramaan.php" class="btn btn-full">Keasramaan</a>
          </div>
      </div>
    </header>

    <section class="features">
          <h3 class="text-center">PENYIMPANAN TERTATA PENGAWASAN TERJAGA</h3>
          <p class="copy">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt hendrerit maximus. Donec consequat urna quis nibh mollis, et sollicitudin eros efficitur. Mauris accumsan facilisis turpis ac tincidunt. Integer et orci nunc. Nam ac magna lorem. Maecenas non mi non lacus scelerisque blandit ac ac nulla.</p>
       <div class="container">
      <div class="row">
          <div class="col-md-3">
            <i class="fas fa-lock"></i>  
            <h4>AMAN</h4>
            <p class="arranging">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt hendrerit maximus. Donec consequat urna quis nibh mollis, et sollicitudin eros efficitur. Mauris accumsan facilisis turpis ac tincidunt.</p>
          </div>
          <div class="col-md-3">
            <i class="fas fa-key"></i>
            <h4>TERKONTROL</h4>
            <p class="arranging">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt hendrerit maximus. Donec consequat urna quis nibh mollis, et sollicitudin eros efficitur. Mauris accumsan facilisis turpis ac tincidunt.</p>
           </div>
           <div class="col-md-3">
            <i class="fas fa-copy"></i>
            <h4>SIMPEL</h4>
            <p class="arranging">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt hendrerit maximus. Donec consequat urna quis nibh mollis, et sollicitudin eros efficitur. Mauris accumsan facilisis turpis ac tincidunt.</p>
          </div>
          <div class="col-md-3">
            <i class="fas fa-thumbs-up"></i>
            <h4>MUDAH</h4>
            <p class="arranging">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt hendrerit maximus. Donec consequat urna quis nibh mollis, et sollicitudin eros efficitur. Mauris accumsan facilisis turpis ac tincidunt.</p>
          </div> 
        </div>
      </div>
    </section>  

      <div class="row no-space">
        <div style="background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(image/loker1.jpg);background-repeat: no-repeat;  background-size: cover" class="col-md-6 no-space">
          <div class="leftside">
            <h1><a href="#">LOKERKU</a></h1>
          </div>
        </div>
        <div style="background-image:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(image/locker3.jpg);background-repeat: no-repeat;  background-size: cover" class="col-md-6 no-space">
          <div class="rightside">
            <h1><a href="#">SEMUA LOKER</a></h1>
          </div>
        </div>
       </div> 

     
<br><br>
    <footer style="background-image: url(image/loker-foot.jpg);
  background-size: cover;
  background-attachment: fixed;
  padding-top: 80px;
  padding-bottom: 80px;
  -webkit-background-size:cover;
  -moz-background-size:cover; " class="footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <div class="social">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-google-plus"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
              <div class="copyright">
              <p>
                &copy; <b>LokerKu2019</b>
              </p>
              <div class="line">
                
              </div>
            </div>
          </div>
        </div>

        </div>
    </footer>

     
 
</body>
</html>