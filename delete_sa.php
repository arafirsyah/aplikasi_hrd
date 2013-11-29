<?php 
/*Sisipkan file untuk koneksi ke database*/
include 'koneksi.php';
/*
Buat Variable dari data yang dikirim sebelumnya
trim() merupakan fungsi untuk menghilangkan spasi sebelum dan sesudah string
strip_tags() merupakan fungsi php untuk memfilter dan menghilangkan tags html jika ada yang memasukan tag html
*/

	/*Dibawah ini proses update ke dalam database */
	mysql_query("DELETE FROM canggota WHERE nik = '$_GET[nik]'");

	echo "<script>alert('NIK : ".$_GET['nik']." Telah Berhasil dihapus')</script>";
		
	/*Setelah proses update selesai data di kembalikan ke form input*/
	//header('location:admin.php');
	echo "<script>window.location='view_data.php'</script>";

?>