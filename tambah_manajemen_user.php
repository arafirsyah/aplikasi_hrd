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
					<form action="proses_tambah_manajemen_user.php" method="post" name="formuser">
						<table border="1" width="500">
							<tr>
								<th colspan="12">
									Tambah Data Login User
								</th>
							</tr>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td>
									<input type="text" name="username" size="25"><font color="#FF0000" size="2">*) Wajib diisi</font>
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td>
									<input type="text" name="password" size="25"><font color="#FF0000" size="2">*) Wajib diisi</font>
								</td>
							</tr>
							<tr>
								<td>Level</td>
								<td>:</td>
								<td>
									<select name="type">
										<option value="admin">Administrator</option>
										<option value="hrd">HRD</option>
										<option value="sa">Administrator System</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<input type="submit" name="submit" value="Simpan Data" />
									<input type="button" name="BATAL" value="Batal" onclick="self.history.back()" />
								</td>
							</tr>
							
						</table>
					</form>
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