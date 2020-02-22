<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

$loker = query("SELECT idbarang,nama,ciri,idloker,status,waktuS,waktuA FROM barang");

if (isset($_POST["cari"])) {
	$loker = cari($_POST["keyword"]);
}

$judul = "LAPORAN DATA BARANG MAHASISWA";
$header = array(
		array("label"=>"ID Barang", "length"=>20, "align"=>"C"),
		array("label"=>"Nama Barang", "length"=>30, "align"=>"C"),
		array("label"=>"Jenis Barang", "length"=>40, "align"=>"C"),
		array("label"=>"ID Loker", "length"=>40, "align"=>"C"),
		// array("label"=>"Gambar", "length"=>40, "align"=>"C"),
		array("label"=>"Status Barang", "length"=>30, "align"=>"C"),
		array("label"=>"Waktu simpan", "length"=>40, "align"=>"C"),
		array("label"=>"Waktu Ambil", "length"=>40, "align"=>"C")
	);
require_once ("fpdf.php");
$pdf = new FPDF("L","mm","A4");
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->Image('image/logo.png',10,6,30);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($loker as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);	
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}

 
#output file PDF
$pdf->Output();
?>
		