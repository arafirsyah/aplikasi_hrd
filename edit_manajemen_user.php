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

<script>
	function approve()
	{
		document.getElementById("approval").innerHTML="Data telah diApprove";
	}
</script>

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
						<li><a href="view_canggota.php" alt="Lihat Calon Anggota" title="Lihat Calon Anggota">Lihat Calon Anggota</a></li>
						<li><a href="logout.php" alt="Logout" title="Logout">Logout</a></li>
					</ul>
				</td>
				<td valign="top">
					<table border="1" width="1100">
						<tr>
							<th colspan="12">
								Edit Data Login User
							</th>
						</tr>
						<tr>
							<td>
								<?php 
									include "koneksi.php";
									$q = mysql_query("SELECT * FROM login WHERE username='$_GET[username]'"); //menampilkan data dimana nilai id = id yang ada di url 
									$r = mysql_fetch_array($q); // Cocokan data dengan data di database
								?>
								<!--Buat Aksinya ke update.php-->
								<form name="formsimpan" method="POST" action="update_manajemen_user.php">
								<!--buat nilai idnya dan jangan ditampilkan, hanya untuk dibaca di update.php-->
								<input type="hidden" name="username" value="<?php echo $_GET['username'];?>" />
								<table align="center">
									<tbody>
										<tr>
											<td>Username</td>
											<td>:</td>
											<td>
												<b><?php echo $r['username'];?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color="red" size="2">*) Username tidak bisa diganti</font>
											</td>
										</tr>
										<tr>
											<td>Password</td>
											<td>:</td>
											<td>
												<input type="text" name="password" /><font color="red" size="2">*) Jangan Dikosongkan</font>
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
											<td colspan="3" align="left">
												<input type="submit" name="submit" value="Simpan Data" />
												<input type="button" name="BATAL" value="Batal" onclick="self.history.back(-1)" />
											</td>
										</tr>
									</tbody>
								</table>
								</form>
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