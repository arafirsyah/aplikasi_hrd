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
						<li><a href="admin.php" alt="Beranda" title="Beranda">Beranda</a></li>
						<li><a alt="Lihat Calon Anggota" title="Lihat Calon Anggota">Lihat Calon Anggota</a></li>
						<li><a href="logout.php" alt="Logout" title="Logout">Logout</a></li>
					</ul>
				</td>
				<td valign="top">
					<table border="1" width="1100">
						<tr>
							<th colspan="12">
								Edit Data Calon Anggota
							</th>
						</tr>
						<tr>
							<td>
								<?php 
									include "koneksi.php";
									$q = mysql_query("SELECT * FROM canggota WHERE nik='$_GET[nik]'"); //menampilkan data dimana nilai id = id yang ada di url 
									$r = mysql_fetch_array($q); // Cocokan data dengan data di database
								?>
								<!--Buat Aksinya ke update.php-->
								<form name="formsimpan" method="POST" action="update.php">
								<!--buat nilai idnya dan jangan ditampilkan, hanya untuk dibaca di update.php-->
								<input type="hidden" name="nik" value="<?php echo $_GET['nik'];?>" />
								<input type="hidden" name="status" value="<?php echo $r['status'];?>" />
								<table>
									<tbody>
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td>
												<input type="text" name="nama" value="<?php echo $r['nama'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>NIK</td>
											<td>:</td>
											<td>
												<input type="text" name="nik" value="<?php echo $r['nik'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>No.KTP</td>
											<td>:</td>
											<td>
												<input type="text" name="noktp" value="<?php echo $r['no_ktp'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td>
												<textarea name="alamat" rows="3" cols="25"><?php echo $r['alamat'];?></textarea><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>Unit Kerja</td>
											<td>:</td>
											<td>
												<input type="text" name="uker" value="<?php echo $r['uker'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>No.Anggota</td>
											<td>:</td>
											<td>
												<input type="text" name="no_anggota" value="<?php echo $r['no_anggota'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>Copy KTP</td>
											<td>:</td>
											<td>
												<input type="text" name="copy_ktp" value="<?php echo $r['copy_ktp'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>Jumlah Setoran</td>
											<td>:</td>
											<td>
												<input type="text" name="jml_setoran" value="<?php echo $r['jml_setoran'];?>" /><font color="red" size="2">*) Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td>Tanggal Setoran</td>
											<td>:</td>
											<td>
												<input type="text" name="tgl_setoran" value="<?php echo $r['tgl_setoran'];?>" /><font color="red" size="2">*) - Format yyyy-mm-dd; - Jangan Dikosongkan</font>
											</td>
										</tr>
										<tr>
											<td colspan="3" align="left">
												<input type="submit" name="submit" value="Simpan Data" />
												
												<?php
													if($r['simpan']==1){
												?>
												<!--<a href="approval.php?nik=<?php echo $r['nik'];?>" name="approval" />Approval</a>-->
												<input type="button" onClick="parent.location='approval.php?nik=<?php echo $r['nik'];?>'" name="approval" value="Approval" />
												<?php 
													}
												?>
												<input type="button" name="BATAL" value="Batal" onclick="self.history.back(-1)" />
											</td>
										</tr>
									</tbody>
								</table>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<div>
									<?php
										if($r['status']=='N'){
											echo "Peringatan : Data Masih Belum Terisi dengan Lengkap,&nbsp;Silahkan mengisi data dengan lengkap";
										}
										else {
											echo "Informasi : Silahkan anda Tekan Tombol Approve untuk menyetujui sebagai anggota";
										}
									?>
								</div>
							</div>
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