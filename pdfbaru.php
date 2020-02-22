<?php
require'functions.php';
require_once ("fpdf.php");

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$loker=mysqli_query($conn,"select * from barang");
        while($row=mysqli_fetch_array($loker)){



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100 ,5,'LAPORAN PENYIMPANAN DAN PENGAMBILAN BARANG MAHASISWA',0,1);//end of line
$pdf->Cell(100 ,5,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'ID Barang',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5, $row['idbarang'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Nama Barang',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['nama'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Jenis Barang',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['ciri'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'ID Loker',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['idloker'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Status Barang',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['status'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Status Barang',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['status'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Gambar',0,0);


$gambar=$row['gambar'];
$pdf->Image('img/' . $gambar,140,140,50,30);
$pdf->Cell(100 ,2,'',0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(182,4,"Di Cetak Pada : ".date("D-d/m/Y"),0,0,'R');
//set font to arial, bold, 14pt



}

$pdf->Output();
?>