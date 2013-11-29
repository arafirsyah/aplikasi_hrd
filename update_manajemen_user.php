<?php 
/*Sisipkan file untuk koneksi ke database*/
include 'koneksi.php';
/*
Buat Variable dari data yang dikirim sebelumnya
trim() merupakan fungsi untuk menghilangkan spasi sebelum dan sesudah string
strip_tags() merupakan fungsi php untuk memfilter dan menghilangkan tags html jika ada yang memasukan tag html
*/
$username = strip_tags(trim($_POST['username'])); 
$password = strip_tags(trim($_POST['password'])); 
$type = strip_tags(trim($_POST['type'])); 

/*Cek Apakah semua data sudah di isi
	Jika tidak diisi
*/
if($password == '')
{
	//echo "Maaf, Data Tersebut Harus Diisi";
	echo "<script>alert('Maaf Password Jangan dikosongkan, Silahkan melengkapi pengisian data');self.history.back()</script>";
	//echo "<input type='button' name='BATAL' value='Batal' onclick='self.history.back()' />";
}
else{
	/*Dibawah ini proses update ke dalam database */
	mysql_query("UPDATE login SET password = '$password', 
									  type = '$type'
									  WHERE username = '$_POST[username]'");

	echo "<script>alert('Username : ".$username." Telah Berhasil diedit')</script>";
		
	/*Setelah proses update selesai data di kembalikan ke form input*/
	//header('location:admin.php');
	echo "<script>window.location='manajemen_user.php'</script>";
}
?>