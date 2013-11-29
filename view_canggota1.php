<?php
	session_start();

	if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser]))
	{
		echo "<center>Untuk mengakses halaman ini, Anda harus login terlebih dahulu<br>";
		echo "<script>window.location='login.php'</script>";
	}
	else {
		include("koneksi.php");
?>
<html>
<head><title>APLIKASI REGISTRASI ANGGOTA</title>	
</head>
<body>

	<table border="1" width="1300" align="center">
			<tr>
				<th height="50" colspan="2">
					APLIKASI REGISTRASI ANGGOTA
				</th>
			</tr>
			<tr>
				<td width="200" valign="top">
					<center>::Menu::</center><hr/>
					<ul>
						<li><a href="admin.php" alt="Beranda" title="Beranda">Beranda</a></li>
						<li><a alt="Lihat Calon Anggota" title="Lihat Calon Anggota">Lihat Calon Anggota</a></li>
						<li><a href="logout.php" alt="Logout" title="Logout">Logout</a></li>
					</ul>
				</td>
				<td valign="top" align="center">
					<?php
						$sql = "SELECT * FROM calonanggota";
						$hasil = mysql_query($sql) or die(mysql_error());
					?>
					<table border="1" width="1100">
						<tr>
							<th colspan="12">
								Data Calon Anggota
							</th>
						</tr>
						<tr>
							<td align="center">NO</td>
							<td align="center">Nama</td>
							<td align="center">NIK</td>
							<td align="center">NO KTP</td>
							<td align="center">Alamat</td>
							<td align="center">Unit Kerja</td>
							<td align="center">No.Anggota</td>
							<td align="center">Copy KTP</td>
							<td align="center">Jml Setoran</td>
							<td align="center">Tgl Setoran</td>
							<td align="center">Status</td>
							<td align="center">Aksi</td>
						</tr>
						<?php
						
							  	$i =0;
								while ($row=mysql_fetch_array($hasil)) {
								$i++ ;
								//$sql2="select * from detail_canggota where nik='$row[nik]'";
								//$hasil2=mysql_query($sql2);
								//while ($row2=mysql_fetch_array($hasil2)) {
							echo"<tr>
									<td align=center>$i</td>
									<td align=center>$row[nama]</td>
									<td align=center>$row[nik]</td>
									<td align=center>$row[no_ktp]</td>
									<td align=left>$row[alamat]</td>
									<td align=left>$row[uker]</td>
									<td align=right>$row[no_anggota]</td>
									<td align=right>$row[copy_ktp]</td>
									<td align=right>$row[jml_setoran]</td>
									<td align=center>$row[tgl_setoran]</td>";
									if($row2[status]=='N')
										$s="Tidak Sah";
									else
										$s="Sah";
								echo "<td align=center>$s</td>
										<td align=center>
											<a href=edit1.php?nik=$row[nik]>Edit</a>
										</td>";
										// edit.php?nik=$row[nik] ==> variabel nik nanti akan dilempar ke file edit.php, 
										// variabel nik sebelumnya menangkap/menyimpan data NIK disetiap baris
							echo "</tr>" ;
							}
							//}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					Copyright @ 2013
				</td>
			</tr>
	</table>

</body>
</html>

<?php
}
?>