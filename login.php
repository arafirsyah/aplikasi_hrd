<html>
<head><title>APLIKASI REGISTRASI ANGGOTA</title>
	
	<script type="text/javascript">
		function validasi(form){
		if (form.cuser.value == ""){
		alert("Anda belum mengisikan Username");
		form.cuser.focus();
		return (false);
		}
			 
		if (form.cpass.value == ""){
		alert("Anda belum mengisikan Password");
		form.cpass.focus();
		return (false);
		}
		return (true);
		}
	</script>
	
</head>
<body bgcolor="#00CED1" OnLoad="document.login.cuser.focus();"> <!--memberikan warna pada halaman web -->
	
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
						<li><a href="registrasi.php" alt="Pendaftaran Anggota" title="Pendaftaran Anggota">Pendaftaran Anggota</a></li>
						<li><a href="informasi.php" alt="Informasi Penggunaan" title="Informasi Penggunaan">Informasi Penggunaan</a></li>
						<li><a alt="Login" title="Login">Login</a></li>
					</ul>
				</td>
				<td align="center" valign="top">
					<form id="form-login" name="login" action="ceklogin.php" method="post" onSubmit="return validasi(this)">
						<table align="center" border="1" width="300">
							<tr>
								<th align="center" colspan="3">
									LOGIN ADMINISTRATOR
								</th>
							</tr>
								
							<tr>
								<td class="textlogin">Username</td>
								<td class="textlogin">:</td>
								<td><input type ="text" name="cuser" class="kotaktext" alt="Masukkan Username" title="Masukkan Username" onfocus="this.select();"/></td>
							</tr>
							
							<tr>
								<td class="textlogin">Password </td>
								<td class="textlogin">:</td>
								<td><input type="password" name="cpass" class="kotaktext" alt="Masukkan Password" title="Masukkan Password" onfocus="this.select();" /> </td>
							</tr>
							
							<tr>
								<td colspan="3" align="center">
									<input type ="submit" name="submit" value="Login" alt="Silahkan Login" title="Silahkan Login">
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