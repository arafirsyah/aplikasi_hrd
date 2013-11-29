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
						<li><a href="index.php" alt="Beranda" title="Beranda">Beranda</a></li>
						<li><a alt="Pendaftaran Anggota" title="Pendaftaran Anggota">Pendaftaran Anggota</a></li>
						<li><a href="informasi.php" alt="Informasi Penggunaan" title="Informasi Penggunaan">Informasi Penggunaan</a></li>
						<li><a href="login.php" alt="Login" title="Login">Login</a></li>
					</ul>
				</td>
				<td align="center" valign="top">
					<form action="proses.php" method="post" name="registrasi">
						<table border="1" width="700">
							<tr>
								<th colspan="3" align="center">Form Pendaftaran</th>
							</tr>
							<tr>
								<td>Nama</td>
								<td width="4">:</td>
								<td><input type="text" name="nama" /></td>
							</tr>
							
							<tr>
								<td>NIK</td>
								<td width="4">:</td>
								<td><input type="text" name="nik" /></td>
							</tr>
							
							<tr>
								<td>No. KTP</td>
								<td width="4">:</td>
								<td><input type="text" name="noktp" /></td>
							</tr>
							
							<tr>
								<td>Alamat</td>
								<td width="4">:</td>
								<td><textarea name="alamat" cols="30" rows="5"></textarea></td>
							</tr>
							
							<tr>
								<td>Unit Kerja</td>
								<td width="4">:</td>
								<td><input type="text" name="uker" /></td>
							</tr>
							
							<tr>
								<td colspan="3">
									<input type="submit" name="submit" value="Daftar" />
									<input type="reset" name="reset" value="Hapus" />
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