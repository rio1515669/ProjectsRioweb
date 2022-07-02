
	<?php 
	include 'inc/koneksi.php';
	 function rupiah($angka)
  	{
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	}
	$kdperiode=$_GET['Kode'];
	$sqlperiode=mysqli_query($conn,"SELECT*From t_periode where kode_periode = '$kdperiode'");
	$dataperiode=mysqli_fetch_array($sqlperiode);
	?>
	<h3>INPUT PENGELUARAN</h3>
	<table>
		<tr>
			<td>Tanggal<td>:</td></td>
			<td><input disabled="disabled" style="background-color: #FFFACD" type="text" value="<?php echo $dataperiode['tanggal'] ?>"></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Pengeluaran<td>:</td></td>
			<td align="right"><input disabled="disabled" style="background-color: #FFFACD" type="text" value="<?php echo rupiah($dataperiode['pengeluaran'])?>"></td>
		</tr>
	</table>
	<hr>
	<table>
<form method="POST" action="modul/transaksi/simpankeluar.php">
	<input type="hidden" name="kdperiode" value="<?php echo $kdperiode?>">
		<br>
		<tr>
			<td>Keterangan<td>:</td></td>
			<td><input type="text" name="keterangan"></td>
		</tr>
		<tr>
			<td>Nilai (Rp)<td>:</td></td>
			<td><input type="text" name="nilai"></td>
		</tr>
		</table>
		<table>
		<td><a href="?module=PERIODE"><=Kembali</a></td>
		<td><input style="width: 75px" type="submit" class="submitButton" value="Simpan" /></td>
		<td><input style="width: 75px" type="reset" class="submitButton" value="Reset" /></td>
		</table>
	<?php 
	$sql=mysqli_query($conn,"SELECT*from t_keluar where kode_periode='$kdperiode'");
	 ?>
	<table width="65%" class="showdetail">
		<br>
	<tr>
		<td width="5%"><center>No.</center></td>
		<td width="40%"><center>Keterangan</td>
		<td width="20%"><center>Nilai (Rp)</center></td>
		<td width="6%" colspan="2"><center>Opsi</center></td>
	</tr>
	<a href="modul/transaksi/printkeluar.php?&Kode=<?php echo $kdperiode?>" target="blank">Print>></a>
	<?php 
	$no=0;
	while($rows=mysqli_fetch_array($sql)){
	$no++;
	?>
	<tr>
		<td><center><?php echo $no;?></center></td>
		<td><?php echo $rows['keterangan'];?></td>
		<td align="right"><?php echo rupiah($rows['nilai']);?></td>

		<td style="text-align: center;"><a href="modul/transaksi/deletekeluar.php?&kode=<?php echo $rows['kode_periode'];?>&Kode=<?php echo $rows['no_keluar'];?>" onclick="return confirm('Yakin Hapus Data Ini?')">Delete</a></td>
	</tr>
	<?php 

	}
	 ?>
</table>
</form>