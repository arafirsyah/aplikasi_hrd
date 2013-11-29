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
						<li><a alt="Lihat Calon Anggota" title="Lihat Calon Anggota">Lihat Calon Anggota</a></li>
						<li><a href="manajemen_user.php" alt="Manajemen User" title="Manajemen User">Manajemen User</a></li>
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
								<form name="formsimpan" method="POST" action="update_sa.php">
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
												<?php
													if($r['status']=='N' AND $r['simpan']==0){
												?>
													<input type="submit" name="submit" value="Simpan Data" />
													<input type="button" name="BATAL" value="Batal" onclick="self.history.back(-1)" />
												
												<?php
													} else {
													
														if($r['status']=='N' AND $r['simpan']==1){
													?>
													<!--<a href="approval.php?nik=<?php echo $r['nik'];?>" name="approval" />Approval</a>-->
													<input type="button" onClick="parent.location='approval_sa.php?nik=<?php echo $r['nik'];?>'" name="approval" value="Approval" />
													<?php 
														}
														else if($r['status']=='Y' AND $r['simpan']==1){
													?>
													<input type="button" onClick="parent.location='unapprove_sa.php?nik=<?php echo $r['nik'];?>'" name="unapprove" value="UnApprove" />
													<?php 
														}
													?>
													<input type="button" name="BATAL" value="Batal" onclick="self.history.back(-1)" />
												<?php 
													}
												?>
													
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
										if($r['status']=='N' AND $r['simpan']==0){
											
											if(trim($r['nama'])=='' OR trim($r['nik'])=='' OR trim($r['no_ktp'])=='' OR trim($r['alamat'])=='' OR trim($r['uker'])=='' OR trim($r['no_anggota'])=='' OR trim($r['copy_ktp'])=='' OR trim($r['jml_setoran'])=='' OR trim($r['uker'])=='tgl_setoran')
											{
												echo "<font color='#FF0000'><b>PERINGATAN : </b><br/>
														&nbsp;-&nbsp;Data Masih Belum Terisi dengan Lengkap,&nbsp;Silahkan mengisi data dengan lengkap <br />
													</font>";
											}
											
											echo "<font color='#FFFF000'><b>PERHATIAN : </b><br/>";
												echo "&nbsp;-&nbsp;Jika ingin melakukan proses Approval, silahkan anda klik tombol Simpan terlebih dahulu";
											echo "</font>";
											
										}
										else {
											//echo "<font color='#0000FF'>INFORMASI : <br/>&nbsp;-&nbsp;Silahkan anda Tekan Tombol Approve untuk menyetujui sebagai anggota </font><br/>";
											echo "<font color='#0000FF'><b>INFORMASI : </b><br/>&nbsp;-&nbsp;Data sudah lengkap, silahkan ada melakukan proses Approval.</font>";
											
											if($r['status']=='Y' AND $r['simpan']==1){
												echo "<font color='#0000FF'>&nbsp;-&nbsp;Jika anda sudah melakukan Approve maka tidak bisa melakukan Approve lagi.</font>";
											}
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