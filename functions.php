<?php
$conn=mysqli_connect("localhost","root","","lokerku");

function query($query ){
	global $conn;  
	$result = mysqli_query($conn,$query);
	$rows=[];
	while 	($row = mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}

function tambah($data){
	//ambil data dari tiap elemen
	global $conn;	

 date_default_timezone_set('Asia/Jakarta');
  // Hasil: 20-01-2017 05:32:15
 $nama=htmlspecialchars($data["nama"]);
 $ciri=htmlspecialchars($data["ciri"]);
 $idloker=htmlspecialchars($data["idloker"]);
 $gambar = addslashes(upload());
 $status=$data["status"];
 $waktuS=date('Y-m-d H:i:s');		


 if (!$gambar){
 	return false;	
 }
 else{
	$query="INSERT INTO barang VALUES('','$nama','$ciri','$idloker','$gambar','$status','$waktuS','')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
 }
}

function cari($keyword){
	$query="SELECT * FROM barang 
	WHERE 
		idbarang LIKE '%$keyword%' OR
		nama LIKE '%$keyword%%' OR
		ciri LIKE '%$keyword%' OR
		idloker LIKE '%$keyword%' OR
		status LIKE '%$keyword%' OR
		waktuS LIKE	'%$keyword%' OR
		waktuA LIKE '%$keyword%'
		";
	return query($query);
}
// function cariLoker($keyword){
// 	$query="SELECT loker.no_loker,loker.idloker,loker.idmhs,mahasiswa.nama,mahasiswa.prodi FROM loker
//    		 INNER JOIN mahasiswa ON loker.idloker = mahasiswa.idmhs 
// 	WHERE 
// 		idloker LIKE '%$keyword%' OR
// 		idmhs LIKE '%$keyword%%' OR
// 		no_loker LIKE '%$keyword%' 
// 		";
// 	return query($query);
// }
function cariA($keyword){
	$query="SELECT * FROM mahasiswa 
	WHERE 
		idmhs LIKE '%$keyword%' OR
		nama LIKE '%$keyword%%' OR
		prodi LIKE '%$keyword%' 
		
		";
	return query($query);
}
function cariL($keyword){
	$query="SELECT * FROM loker 
	WHERE 
		idloker LIKE '%$keyword%' OR
		idmhs LIKE '%$keyword%%' OR
		no_loker LIKE '%$ keyword%' 
		";
	return query($query);
}

function registrasiA($data){
	global $conn;

	$username = strtolower(stripslashes( $data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2= mysqli_real_escape_string($conn,$data["password2"]);
	$nama = strtolower(stripslashes( $data["nama"]));
	$email= strtolower(stripslashes( $data["email"]));

	//cek usernmae sudah ada 
	$result =mysqli_query($conn, "SELECT username FROM keasramaan WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Username sudah terdaftar!');
			</script>
		";
		return false;
	}

	//enkripsi passwrod
	$pwd=password_hash($password,PASSWORD_DEFAULT);
	// $password=md5();
	//tambah user baru
	mysqli_query($conn, "INSERT INTO keasramaan VALUES ('','$username','$pwd','$nama','$email')");
	return mysqli_affected_rows($conn);
	//cek konfirmasi password
	if ($password !== $password2) {
		echo "
			<script>
				alert ('konfirmasi password tidak sesuai');
			</script>
		";
		return false;
	}
}

function ambil($data){
	date_default_timezone_set('Asia/Jakarta');
	global $conn;
	$waktuA=date('Y-m-d H:i:s');
 	$query='UPDATE barang SET
 	status = 1, waktuA = "'.$waktuA.'" WHERE idbarang = '.$data;
	mysqli_query($conn,$query);

 	return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile= $_FILES['gambar']['size'];
	$error=$_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	//cek apakah tidak ada gmabar di upload

	if ($error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu!');
		</script>";
 		return false;
	}
//cek apakah yang di upload memang gambar
	$ekstensiGambarValid=['jpg','jpeg','png','gif','jfif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar =strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			 	alert('Yang anda upload bukan gambar!');
			 </script>";
		return false;
	} 

	//cek jika tapi ukurannya terlalu besar
	if ($ukuranFile > 4000000 ) {
		echo "<script>
			alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}
	//lolos pengecekan,siap upload

	$namaFileBaru = uniqid();
	
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
	return $namaFileBaru;
}

function tambahloker($data){
	global $conn;

	$idloker = strtolower(stripslashes( $data["idloker"]));
	$pin = mysqli_real_escape_string($conn,$data["pin"]);
	$pin2= mysqli_real_escape_string($conn,$data["pin2"]);
	$no_loker = strtolower(stripslashes( $data["no_loker"]));
	$idmhs= strtolower(stripslashes( $data["idmhs"]));

	//cek usernmae sudah ada 
	$result =mysqli_query($conn, "SELECT * FROM loker WHERE idloker = '$idloker'");

	if (mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Username sudah terdaftar!');
			</script>
		";
		return false;
	}
	if ($pin !== $pin2) {
		echo "
			<script>
				alert ('konfirmasi password tidak sesuai');
			</script>
		";
		return false;
	}
	$pwd = password_hash($pin, PASSWORD_DEFAULT);
	// $password=md5();
	//tambah user baru
	mysqli_query($conn, "INSERT INTO loker VALUES ('$no_loker','$idloker','$idmhs','$pwd')");
	return mysqli_affected_rows($conn);
	//cek konfirmasi password
	
}

?>	