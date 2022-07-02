<?php
include 'koneksi2.php';
 ?>
<table width="100%">
	<tr>
		<td align="center"><h2>LAPORAN DATA PENJUALAN</h2>
		<h4>FAMILY-KEBAB</h4></td>
	</tr>
	
  <?php
  function rupiah($angka)
  	{
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	}
	# Jika tombol Cari/Search diklik, maka pencarian dilakukan
	if(isset($_POST['btnCari']))
	{
		$tgl1 = $_POST["txtCari"];
		$tgl2 = $_POST["txtCari2"];
		$mySql = "SELECT * FROM t_periode WHERE tanggal between '$tgl1' and '$tgl2' ";
	} 
	else
	{
	}
	$mySql = "SELECT * FROM t_periode WHERE tanggal between '$tgl1' and '$tgl2' ";
	$myQry = mysqli_query($conn,$mySql)  or die ("Query salah : ".mysqli_error()); 
	?> 
	<table border="1" align="center" width="75%" rules="all">
		<tr>
			<th width="1%">No</th>
			<th>Kode Periode</th>
			<th>Tanggal</th>
			<th>Pendapatan</th>
			<th>Pengeluaran</th>
			<th>Hasil Pendapatan</th>	
		</tr>
		<?php 
		$no = 0;
		while ($myData = mysqli_fetch_array($myQry)) {
		$dapat = $myData['pendapatan'];
		$keluar = $myData['pengeluaran'];
		$hasil = $dapat - $keluar;	
			$sql_pen=mysqli_query($conn,"SELECT sum(pendapatan) AS pdp from t_periode where tanggal between 'tgl1' and '$tgl2' ");
			$data_pen=mysqli_fetch_array($sql_pen);
			$sql_peg=mysqli_query($conn,"SELECT sum(pengeluaran) AS pgp from t_periode  where tanggal between 'tgl1' and '$tgl2' ");
			$data_peg=mysqli_fetch_array($sql_peg);
			$total = $data_pen['pdp']-$data_peg['pgp'];
			$no++;
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td align="center"><?php echo $myData['kode_periode']; ?></td>
			<td align="center"><?php echo $myData['tanggal']; ?></td>
			<td align="right"><?php echo rupiah($myData['pendapatan']); ?></td>
			<td align="right"><?php echo rupiah($myData['pengeluaran']); ?></td>
			<td align="right"><?php echo rupiah($hasil); ?></td>
			
		</tr>
		<?php 
		}
		?>
		<tr>
			<th align="right" colspan="3">Total : </th>
			<th align="right"><?php echo rupiah($data_pen['pdp']); ?></th>
			<th align="right"><?php echo rupiah($data_peg['pgp']); ?></th>
			<th align="right"><?php echo rupiah($total); ?></th>
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