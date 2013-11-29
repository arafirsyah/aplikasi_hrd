<?php
	include "koneksi.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	
	$q = "SELECT username FROM login WHERE username = '$username'";
	$hasil = mysql_query($q) or die(mysql_error());
	$total = mysql_num_rows($hasil);
	
	if($total=="0"){
		$add = mysql_query("INSERT INTO login VALUES ('','$username', '$password', '$type')") or die (mysql_error());
		
		echo "<script>alert('Data Telah Terdaftar dengan Username : ".$username."')</script>";
		
		echo "<script>window.location='manajemen_user.php'</script>";
	}
	else{
		echo "<script>alert('Data Sudah Terdaftar dengan Username : ".$username.",Silahkan gunakan username yang lain.');self.history.back()</script>";
	}

?>