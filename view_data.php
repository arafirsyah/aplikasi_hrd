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
						<li><a alt="Lihat Daftar Anggota" title="Lihat Daftar Anggota">Lihat Daftar Anggota</a></li>
						<li><a href="manajemen_user.php" alt="Manajemen User" title="Manajemen User">Manajemen User</a></li>
						<li><a href="logout.php" alt="Logout" title="Logout">Logout</a></li>
					</ul>
				</td>
				<td valign="top" align="center">
					<?php
						$sql = "SELECT * FROM canggota WHERE status='N' or status='Y' ORDER BY nama ASC"; // akan menampilkan semua data yang status N ataupun Y
						$hasil = mysql_query($sql) or die(mysql_error());
						$jml = mysql_num_rows($hasil);
						
						$sql2 = "SELECT * FROM canggota WHERE status='N' AND simpan='1' ORDER BY nama ASC"; // akan menampilkan data yang HANYA status N DAN simpan 1(sudah disimpan tetapi belum diapprove)
						$hasil2 = mysql_query($sql2) or die(mysql_error());
						$jml_1 = mysql_num_rows($hasil2);
						
						$sql3 = "SELECT * FROM canggota WHERE status='N' AND simpan='0' ORDER BY nama ASC"; // akan menampilkan data yang HANYA status N DAN simpan 0(data BELUM disimpan, DAN proses APPROVAL akan tampil jika sudah disimpan)
						$hasil3 = mysql_query($sql3) or die(mysql_error());
						$jml_0 =  mysql_num_rows($hasil3);
						
						$sql4 = "SELECT * FROM canggota WHERE status='Y' AND simpan='1' ORDER BY nama ASC"; // akan menampilkan data yang HANYA status Y DAN simpan 1(sudah disimpan dan diapprove)
						$hasil4 = mysql_query($sql4) or die(mysql_error());
						$jml_sah = mysql_num_rows($hasil4);
					?>
					<table border="1" width="1100">
						<tr>
							<th colspan="13">
								Daftar Anggota
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
							<td colspan="2" align="center">Aksi</td>
						</tr>
						<?php
						
							  	$i =0;
								while ($row=mysql_fetch_array($hasil)) {
								$i++ ;
								
								if($row['status']=='N' AND $row['simpan']==1) //jika data status=N dan sudah dilakukan penyimpanan oleh level ADMIN dan data sudah lengkap
									$bg="#FFFF00";
								else if($row['status']=='N' AND $row['simpan']==0) //jika data status=N dan belum dilakukan penyimpanan serta data belum dilengkapi oleh level ADMIN(data baru dilakukan approve oleh level HRD)(dengan status simpan=0)
									$bg="#FF0000";
								else
									$bg="#FFFFFF";
									
							echo"<tr bgcolor='$bg'>
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
									
									if($row['status']=='N')
										$s="Tidak Sah";
									else
										$s="Sah";
										
								echo "<td align=center>$s</td>
										<td align=center>
											<a href=edit_sa.php?nik=$row[nik]>Edit</a>
										</td>
										<td align=center>
											<a href=delete_sa.php?nik=$row[nik] onClick=\"return confirm('Apakah anda yakin akan menghapus data?')\">Delete</a>
										</td>";
										// edit.php?nik=$row[nik] ==> variabel nik nanti akan dilempar ke file edit.php, 
										// variabel nik sebelumnya menangkap/menyimpan data NIK disetiap baris
							echo "</tr>" ;
							}
							
						?>
						<tr><!-- Menampilkan banyaknya data baik yg sudah menjadi anggota ataupun calon anggota -->
							<td colspan="13">
								<?php
									echo "<font size='3' face='arial'><b>Total Data : ".$jml."</b></font>";
								?>
							</td>
						</tr>
						<tr><!-- Menampilkan jumlah data yang sah/sudah menjadi anggota -->
							<td colspan='13'>
								<?php 
									echo "<font size='2' face='arial'><b>&nbsp;# Data Anggota Sah : ".$jml_sah." of ".$jml."</b></font><br/>";
									
									if($jml_sah==0){
										echo "<font size='3' face='calibri'>
											<ul type='disc'>
												<li>Detail Tidak Ada</li>
											</ul>";
									}
									else {
										echo "<font size='3' face='calibri'>
												<ul type='disc'>
													<li>Dengan Detail sebagai berikut : </li>";
										
											echo "<ol >";
										while($detail3=mysql_fetch_array($hasil4)){
												echo "<li>".$detail3['nama']."</li>";
										}
											echo "</ol>";
											echo "</br>";
										echo "</ul>";
										echo "</font>";
										}
								?>
							</td>
						</tr>
						<tr><!-- Menampilkan jumlah data yang tidak sah/calon anggota -->
							<td colspan='13'>
								<?php 
									echo "<font size='2' face='arial'><b>&nbsp;# Data Tidak Sah Dan Belum Di Approve : ".$jml_1." of ".$jml."</b></font><br/>";
									
									if($jml_1==0){
										echo "<font size='3' face='calibri'>
											<ul type='disc'>
												<li>Detail Tidak Ada</li>
											</ul>";
									}
									else {
										echo "<font size='3' face='calibri'>
												<ul type='disc'>
													<li>Dengan Detail sebagai berikut : </li>";
										
											echo "<ol >";
										while($detail=mysql_fetch_array($hasil2)){
												echo "<li>".$detail['nama']."</li>";
										}
											echo "</ol>";
											echo "</br>";
										echo "</ul>";
										echo "</font>";
										}
								?>
							</td>
						</tr>
						<tr><!-- Menampilkan jumlah data yang tidak sah/calon anggota -->
							<td colspan='13'>
								<?php 
									echo "<font size='2' face='arial'><b>&nbsp;# Data Tidak Sah Dan Belum Di Simpan : ".$jml_0." of ".$jml."</b></font><br/>";
									
									if($jml_0==0){
										echo "<font size='3' face='calibri'>
											<ul type='disc'>
												<li>Detail Tidak Ada</li>
											</ul>";
									}
									else {
										echo "<font size='3' face='calibri'>
												<ul type='disc'>
													<li>Dengan Detail sebagai berikut : </li>";
										
											echo "<ol >";
										while($detail2=mysql_fetch_array($hasil3)){
												echo "<li>".$detail2['nama']."</li>";
										}
											echo "</ol>";
											echo "</br>";
										echo "</ul>";
										echo "</font>";
										}
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