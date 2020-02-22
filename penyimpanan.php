<?php

require 'functions.php';
$loker = query("SELECT loker.no_loker,loker.idloker,mahasiswa.nama,mahasiswa.prodi FROM loker
  INNER JOIN mahasiswa ON loker.idloker = mahasiswa.idmhs");

if (isset($_POST["cari"])) {
  $loker = cariL($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Loker_KU</title>
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
    <script src="js/jquery-3.3.1.min.js"></scr  ipt>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/table.css">


</head>
<body style="background-image:url(image/loker2.jpg);background-size: cover;">
          <div class="logo">
            <img src="image/logo.png" class="img-circle">
          </div>
  <div style="float: left;">
        <ul class="main-nav" style="margin-right: 20px;"  >
          <li><a href="index.php">BERANDA</a></li>
          <li><a href="penyimpanan.php">PENYIMPANAN</a></li>
          <li><a href="signin.php">PESAN</a></li>
          <li><a href="about.php">TENTANG</a></li>
        </ul><br><br><br><br><br><br>
        <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <table>
                <tr>
                  <td>
                    <?php foreach ($loker as $row):?>
                    <div class="col-sm-6" style="margin-right: -320px;margin-bottom: 60px;">
                      <div class="row">
                        <div class="col-sm-5">
                          <div class="team-block">
                            <div class="team-man">
                              <img src="image/user.png  ">
                            </div>
                            <div class="team-description text-center">
                              <div class="team-title">
                                <h3><?php echo $row["nama"]; ?></h3>
                                <span>Loker <?php echo $row["no_loker"]; ?></span>
                              </div>
                              <p>
                               Prodi :<?php echo $row["prodi"]; ?><br>
                               NIM :<?php echo $row["idloker"]; ?>
                              </p>
                              
                                <!-- <a href="barangmahasiswa.php?idloker=<?= $row["idloker"]; ?>" class="action2"> -->
                                  <a href="login.php" class="action2">
                                  <div class="team-social-network">
                                  <i class="fab"><span class="glyphicon glyphicon-log-in"></i>                        
                                </div>
                                </a>
                            </div>
                            
                          </div>
                        </div>
         
                        
      <!-- <td><a href="barangsaya.php?idloker=<?= $row["idloker"]; ?>" class="action2">Masuk</a></td> -->
                              
                             </div>

                          </div>

                          <?php endforeach ;?>   
                        </td>
                      </tr>
                    </table>
                 </div>
              </div>
            </div>
          </div>
</div>
</body>
</html>

