<?php
	include "koneksi.php";
	
	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$noktp = $_POST['noktp'];
	$alamat = $_POST['alamat'];
	$uker = $_POST['uker'];

	$cek = "SELECT nik FROM canggota WHERE nik = '$nik'";
	$verif = mysql_query($cek) or die(mysql_error());
	$total = mysql_num_rows($verif);
	
	if($total=="0"){
		$add = mysql_query("INSERT INTO canggota ( nama , nik , no_ktp , alamat , uker) VALUES ('$nama', '$nik', '$noktp', '$alamat', '$uker')") or die (mysql_error());
		
		echo "<script>alert('Data Telah Terdaftar dengan Nama :".$nama."')</script>";
		
		echo "<script>window.location='registrasi.php'</script>";
	}

?>