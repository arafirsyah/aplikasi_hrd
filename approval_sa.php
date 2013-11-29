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
$alamat = trim($_POST['alamat']); 
$uker = strip_tags(trim($_POST['uker'])); 
$no_anggota = strip_tags(trim($_POST['no_anggota'])); 
$copy_ktp = strip_tags(trim($_POST['copy_ktp'])); 
$jml_setoran = strip_tags(trim($_POST['jml_setoran'])); 
$tgl_setoran = strip_tags(trim($_POST['tgl_setoran'])); 
$status = strip_tags(trim($_POST['status'])); 

/*Cek Apakah semua data sudah di isi
	Jika tidak diisi
*/
$q = "SELECT * from canggota";
$r = mysql_query($q);
$b = mysql_fetch_array($r);

if($tgl_setoran == '0000-00-00') {
	echo "<script>alert('Tanggal Harus Diisi dengan Bener');self.history.back()</script>";
}	
else {
	/*Dibawah ini proses update ke dalam database */
	$update = "UPDATE canggota SET status = 'Y' WHERE nik = '$_GET[nik]'";
	//echo $update;
	//exit;
	$sukses = mysql_query($update);
	
	if($sukses){

		echo "<script>alert('Data dengan NIK : ".$_GET['nik']." Telah Berhasil di Approve')</script>";
		/*Setelah proses update selesai data di kembalikan ke view_canggota*/
		//header('location:admin.php');
		echo "<script>window.location='view_data.php'</script>";
	}
	else
	{
		echo "Gagal diapprove";
	}
}
?>