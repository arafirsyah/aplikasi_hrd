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
<body bgcolor="#00CED1"> <!--memberikan warna pada halaman web -->

	<table border="1" width="1300" align="center">
			<tr>
				<th height="50" colspan="2">
					APLIKASI PENDAFTARAN <br/>
					KARYAWAN PT.MAJU MUNDUR GAK KENA GROUP
				</th>
			</tr>
			<tr>
				<td width="200" valign="top">
					<center>::Menu::</center><hr/>
					<ul>
						<li><a href="sa.php" alt="Beranda" title="Beranda">Beranda</a></li>
						<li><a href="view_data.php" alt="Lihat Daftar Anggota" title="Lihat Daftar Anggota">Lihat Daftar Anggota</a></li>
						<li><a alt="Manajemen User" title="Manajemen User">Manajemen User</a></li>
						<li><a href="logout.php" alt="Logout" title="Logout">Logout</a></li>
					</ul>
				</td>
				<td valign="top" align="center">
					<?php
						$sql = "SELECT * FROM login ORDER BY id";
						$hasil = mysql_query($sql) or die(mysql_error());
						$jml = mysql_num_rows($hasil);
					?>
					<table border="1" width="500">
						<tr>
							<td colspan="6">
								<a href="tambah_manajemen_user.php" alt="Tambah Data User" title="Tambah Data User">Tambah Data</a>
							</td>
						</tr>
						<tr>
							<th colspan="12">
								Data Login User
							</th>
						</tr>
						<tr>
							<td align="center">No</td>
							<td align="center">Username</td>
							<td align="center">Password</td>
							<td align="center">Level</td>
							<td colspan="2" align="center">Aksi</td>
						</tr>
						<?php
						
							  	$i =0;
								while ($row=mysql_fetch_array($hasil)) {
								$i++ ;
							echo"<tr>
									<td align=center>$i</td>
									<td align=center>$row[username]</td>
									<td align=center>$row[password]</td>
									<td align=center>$row[type]</td>";
									
								echo "<td align=center>
											<a href=edit_manajemen_user.php?username=$row[username]>Edit</a>
										</td>
										<td align=center>
											<a href=delete_manajemen_user.php?username=$row[username] onClick=\"return confirm('Apakah anda yakin akan menghapus username:$row[username]?')\">Delete</a>
										</td>";
										// edit.php?nik=$row[nik] ==> variabel nik nanti akan dilempar ke file edit.php, 
										// variabel nik sebelumnya menangkap/menyimpan data NIK disetiap baris
							echo "</tr>" ;
							}
						?>
						<tr>
							<td colspan="6">
								<?php
									echo "Banyak Data : ".$jml;
								?>
							</td>
						</tr>
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