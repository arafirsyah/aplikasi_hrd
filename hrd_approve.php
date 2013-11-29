<?php 
/*Sisipkan file untuk koneksi ke database*/
include 'koneksi.php';
/*
Buat Variable dari data yang dikirim sebelumnya
trim() merupakan fungsi untuk menghilangkan spasi sebelum dan sesudah string
strip_tags() merupakan fungsi php untuk memfilter dan menghilangkan tags html jika ada yang memasukan tag html
*/
$nama = strip_tags(trim($_POST['nama'])); 
$nik = strip_tags(trim($_GET['nik'])); 
$noktp = strip_tags(trim($_POST['noktp'])); 
$alamat = strip_tags(trim($_POST['alamat'])); 
$uker = strip_tags(trim($_POST['uker'])); 

/*Cek Apakah semua data sudah di isi
	Jika tidak diisi
*/
$q = "SELECT * from canggota";
$r = mysql_query($q);
$b = mysql_fetch_array($r);

	/*Dibawah ini proses update ke dalam database */
	$update = "UPDATE canggota SET status = 'N' WHERE nik = '$_GET[nik]'";
	//echo $update;
	//exit;
	$sukses = mysql_query($update);
	
	if($sukses){

		echo "<script>alert('Data dengan NIK : ".$_GET['nik']." Telah Berhasil di Approve. Silahkan hubungi Admin untuk mengaktifkan anggota.')</script>";
		/*Setelah proses update selesai data di kembalikan ke view_canggota*/
		//header('location:admin.php');
		echo "<script>window.location='view_hrd.php'</script>";
	}
	else
	{
		echo "Gagal diapprove";
	}

?>