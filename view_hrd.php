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
						<li><a href="hrd.php" alt="Beranda" title="Beranda">Beranda</a></li>
						<li><a alt="Lihat Calon Anggota" title="Lihat Calon Anggota">Lihat Calon Anggota</a></li>
						<li><a href="logout.php" alt="Logout" title="Logout">Logout</a></li>
					</ul>
				</td>
				<td valign="top" align="center">
					<?php
						$sql = "SELECT * FROM canggota WHERE status='D' or status='P' ORDER BY id";
						$hasil = mysql_query($sql) or die(mysql_error());
						$jml = mysql_num_rows($hasil);
						
						$sql2 = "SELECT * FROM canggota WHERE status='P' ORDER BY id";
						$hasil2 = mysql_query($sql2) or die(mysql_error());
						$jml_p = mysql_num_rows($hasil2);
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
							<td colspan="2" align="center">Status</td>
						</tr>
						<?php
						
							  	$i =0;
								while ($row=mysql_fetch_array($hasil)) {
								$i++ ;
								if($row['status']=='P')
									$bg="#FF0000";
								else
									$bg="#FFFFFF";
								
									echo"<tr bgcolor='$bg'>
											<td align=center>$i</td>
											<td align=center>$row[nama]</td>
											<td align=center>$row[nik]</td>
											<td align=center>$row[no_ktp]</td>
											<td align=left>$row[alamat]</td>
											<td align=left>$row[uker]</td>";
											
									if($row['status']=='P')
									{
										echo "<td align=center>
												Approve
											</td>";
										echo "<td align=center>
												<a href=hrd_unpending.php?nik=$row[nik]>Unpending</a>
											</td>";
									}
									else {
									echo "<td align=center>
											<a href=hrd_approve.php?nik=$row[nik]>Approve</a>
										</td>";
									echo "<td align=center>
											<a href=hrd_pending.php?nik=$row[nik]>Pending</a>
										</td>";
									}	
									echo "</tr>" ;
								}
								echo "<tr><td colspan='8'>Jumlah Data : ".$jml."</td></tr>";
								echo "<tr><td colspan='8'>Jumlah Data Pending: ".$jml_p." of ".$jml."</td></tr>";
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