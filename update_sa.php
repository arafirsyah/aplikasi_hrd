<?php 
/*Sisipkan file untuk koneksi ke database*/
include 'koneksi.php';
/*
Buat Variable dari data yang dikirim sebelumnya
trim() merupakan fungsi untuk menghilangkan spasi sebelum dan sesudah string
strip_tags() merupakan fungsi php untuk memfilter dan menghilangkan tags html jika ada yang memasukan tag html
*/
$nama = strip_tags(trim($_POST['nama'])); 
$nik = strip_tags(trim($_POST['nik'])); 
$noktp = strip_tags(trim($_POST['noktp'])); 
$alamat = trim($_POST['alamat']); 
$uker = strip_tags(trim($_POST['uker'])); 
$no_anggota = strip_tags(trim($_POST['no_anggota'])); 
$copy_ktp = strip_tags(trim($_POST['copy_ktp'])); 
$jml_setoran = strip_tags(trim($_POST['jml_setoran'])); 
$tgl_setoran = strip_tags(trim($_POST['tgl_setoran'])); 

/*Cek Apakah semua data sudah di isi
	Jika tidak diisi
*/
//if($nama == '' OR $nik == '' OR $noktp =='')
if($nama == '' OR $nik == '' OR $noktp =='' OR $alamat == '' OR $uker == '' OR $no_anggota == '' OR $copy_ktp == '' OR $jml_setoran == '')
{
	//echo "Maaf, Data Tersebut Harus Diisi";
	echo "<script>alert('Maaf Data dengan NIK :".$nik." Belum Lengkap, Silahkan melengkapi pengisian data');self.history.back()</script>";
	//echo "<input type='button' name='BATAL' value='Batal' onclick='self.history.back()' />";
}
else if($tgl_setoran == '0000-00-00') {
	//echo "Tanggal Harus Diisi dengan Bener";
	//echo "<input type='button' name='BATAL' value='Batal' onclick='self.history.back()' />";
	echo "<script>alert('Tanggal Harus Diisi dengan Bener');self.history.back()</script>";
}	
else{
	/*Dibawah ini proses update ke dalam database */
	mysql_query("UPDATE canggota SET nama = '$nama', 
									  nik = '$nik',
									  no_ktp = '$noktp',
									  alamat = '$alamat',
									  uker = '$uker',
									  no_anggota = '$no_anggota',
									  copy_ktp = '$copy_ktp',
									  jml_setoran = '$jml_setoran',
									  tgl_setoran = '$tgl_setoran',
									  simpan = '1'
									  WHERE nik = '$_POST[nik]'");

	echo "<script>alert('Nama : ".$nama." Telah Berhasil diedit');self.history.back()</script>";
		
	/*Setelah proses update selesai data di kembalikan ke form input*/
	//header('location:admin.php');
	//echo "<script>window.location='view_data.php'</script>";
}
?>