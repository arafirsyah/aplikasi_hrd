<?php
	session_start();

	if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser]))
	{
		echo "<center>Untuk mengakses halaman ini, Anda harus login terlebih dahulu<br>";
		echo "<script>window.location='login.php'</script>";
	}
	else {
		include("koneksi.php");
		
		if ($_SESSION['leveluser']=='admin'){
		$sql=mysql_query("SELECT * FROM login WHERE type='admin'");
		$level=mysql_num_rows($sql);
		$r=mysql_fetch_array($sql);

			include "admin.php";
		}
		else if ($_SESSION['leveluser']=='hrd'){
				$sql=mysql_query("SELECT * FROM login WHERE type='hrd'");
				$level=mysql_num_rows($sql);
				$r=mysql_fetch_array($sql);
	
			include "hrd.php";
		}
		elseif ($_SESSION['leveluser']=='sa'){
		$sql=mysql_query("SELECT * FROM login WHERE type='sa'");
		$level=mysql_num_rows($sql);
		$r=mysql_fetch_array($sql);

			include "sa.php";
		}
	}
	
?>