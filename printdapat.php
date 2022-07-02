<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
 
		<h2>DATA PENDAPATAN PENJUALAN</h2>
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
				<table width="75%" align="center">
					<tr>
						<td>
							<table>
								<tr>
									<td>Tanggal</td><td>:</td>
									<td><?php echo $dataperiode['tanggal'] ?></td>
									</tr>
									<tr>
									<td>Pedapatan<td>:</td></td>
									<td><?php echo rupiah($dataperiode['pendapatan']) ?></td>
								</tr>
							</table>
						</td>
					</tr>
		
	</table>
	<table border="1" align="center" width="80%" rules="all">
		<tr>
			<th width="1%">No</th>
			<th width="20%">Nama Pelanggan</th>
			<th width="8%">K.Barang</th>
			<th width="15%">Nama Barang</th>
			<th width="8%">Jenis</th>
			<th width="15%">Rasa</th>
			<th width="10%">Harga</th>
			<th width="4%">Qty</th>
			<th width="12%">Jumlah Harga</th>
		</tr>

		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"SELECT * FROM t_dapat A 
			JOIN t_pelanggan B ON A.kode_pel = B.kode_pel 
			JOIN t_barang C ON A.kode_barang = C.kode_barang where kode_periode='$kd_periode'");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama_pel']; ?></td>
			<td align="center"><?php echo $data['kode_barang']; ?></td>
			<td align="left"><?php echo $data['nama_barang']; ?></td>
			<td align="left"><?php echo $data['jenis']; ?></td>
			<td align="left"><?php echo $data['rasa']; ?></td>
			<td align="right"><?php echo rupiah($data['harga']); ?></td>
			<td align="right"><?php echo $data['qty']; ?></td>
			<td align="right"><?php echo rupiah($data['jumlah_harga']); ?></td>
		</tr>
		<?php 
		}
		?>
		<tr>
			<?php 
				$sqlr=mysqli_query($conn,"SELECT pendapatan From t_periode where kode_periode='$kd_periode'");
				$dtsum = mysqli_fetch_array($sqlr);
			?>
			<td align="right" colspan="8">Total Harga :</td>
			<th align="right"><?php echo rupiah($dtsum['pendapatan']); ?></th>
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