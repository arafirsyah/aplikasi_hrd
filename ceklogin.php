<?php

	include "koneksi.php";

	$cuser = $_POST[cuser];
	$cpass = $_POST[cpass];

$sql = mysql_query("SELECT * FROM login WHERE username = CAST('$cuser' as BINARY) AND password = '$cpass'") or die (mysql_error());
$level = mysql_num_rows($sql);
$r = mysql_fetch_array($sql);

// Apabila username dan password ditemukan
if ($level > 0){
		//membuat sesi user,level,nama
		session_start();
	
	session_register("namauser");
	session_register("passuser");
	session_register("leveluser");

	$_SESSION[namauser] = $r[username];
	$_SESSION[passuser] = $r[password];
	$_SESSION[leveluser]= $r[type];
  
	header('location:home.php');
}
else{
	echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
        Username atau Password Anda tidak benar.<br>";
	echo "<a href='login.php'>Ulangi Login</a>";
}

mysql_close($conn);

?>