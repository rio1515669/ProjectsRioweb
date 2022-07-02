<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
 
		<h2>DATA PENGELUARAN</h2>
		<h4>FAMILY-KEBAB</h4>
 
 
	<?php 
	include '../../inc/koneksi.php';
	 function rupiah($angka)
  	{
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	}
	$kd_periode=$_GET['Kode'];
	$data =mysqli_query($conn,"SELECT*from t_periode where kode_periode='$kd_periode'");
	$dataperiode=mysqli_fetch_array($data);
		//$sqljumlah=mysqli_query($conn,"SELECT sum(jml_qc) as jumlah from t_dailydetail where kd_daily='$datadaily[kd_daily]'");
		//$total=mysqli_fetch_array($sqljumlah);
	?>
	<table width="100%" align="center">
		<tr>
			<td>
				<table width="50%" align="center">
					<tr>
						<td>
							<table>
								<tr>
									<td>Tanggal</td><td>:</td>
									<td><?php echo $dataperiode['tanggal'] ?></td>
									</tr>
									<tr>
									<td>Pengeluaran<td>:</td></td>
									<td><?php echo rupiah($dataperiode['pengeluaran']) ?></td>
								</tr>
							</table>
						</td>
					</tr>
		
	</table>
	<table border="1" align="center" width="50%" rules="all">
		<tr>
			<th width="1%">No</th>
			<th>Keterangan</th>
			<th>Nilai</th>
		</tr>

		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"SELECT * FROM t_keluar where kode_periode='$kd_periode'");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td align="center" width="7%"><?php echo $no++; ?></td>
			<td width="75%" align="left"><?php echo $data['keterangan']; ?></td>
			<td align="right"><?php echo rupiah($data['nilai']); ?></td>
		</tr>
		<?php 
		}
		?>
		<tr>
			<?php 
				$sqlr=mysqli_query($conn,"SELECT pengeluaran From t_periode where kode_periode='$kd_periode'");
				$dtsum = mysqli_fetch_array($sqlr);
			?>
			<td align="right" colspan="2">Total Harga :</td>
			<th align="right"><?php echo rupiah($dtsum['pengeluaran']); ?></th>
		</tr>
	</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="75%" align="center">
					<tr>
						<td></td>
						<td>Mangetahui</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p></td>
						<td>Pimpinan</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><p></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td> . . . . . . . . . . . . . .</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>No. . . . . . . . . . . . . .</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
 
	<script>
		window.print();
	</script>
	</center>
</body>
</html>