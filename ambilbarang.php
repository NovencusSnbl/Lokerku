<?php

require 'functions.php';
$idloker=$_GET["idloker"];
$idbarang=$_GET["idbarang"];
if (ambil($idbarang)>0) {
	echo "
 	<script>
 	alert('Barang telah berhasil diambil!');
 	document.location.href = 'barangmahasiswa.php?idloker=$idloker';
 	</script>
 	";

 	
 }
 else{
 	echo "
 	<script>
 	alert('Barang Gagal diambil');
 	document.location.href = 'barangmahasiswa.php?idloker=$idloker';
 	</script>
 	";
 }

?>