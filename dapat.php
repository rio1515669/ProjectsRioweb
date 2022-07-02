
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
	<h3>INPUT PENDAPATAN</h3>
	<table>
		<tr>
			<td>Tanggal<td>:</td></td>
			<td><input disabled="disabled" style="background-color: #FFFACD" type="text" value="<?php echo $dataperiode['tanggal'] ?>"></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Pendapatan<td>:</td></td>
			<td><input disabled="disabled" style="background-color: #FFFACD" type="text" value="<?php echo rupiah($dataperiode['pendapatan'])?>"></td>
		</tr>
	</table>
	<hr>
	<table>
<form method="POST" action="modul/transaksi/simpandapat.php">
	<input type="hidden" name="kdperiode" value="<?php echo $kdperiode?>">
		<br>
		<tr>
			<td>Nama Pelanggan<td>:</td></td>
			<td><select name="nampel" required><option value="">-Pilih-</option> 
				<?php
				$sql=mysqli_query($conn,"SELECT*from t_pelanggan");
				while ($apelanggan=mysqli_fetch_array($sql)) { ?> 
				<option value="<?php echo $apelanggan['kode_pel'] ?>"><?php echo $apelanggan["kode_pel"]; ?>, <?php echo $apelanggan["nama_pel"]; ?>, <?php echo $apelanggan["alamat"]; ?>, <?php echo $apelanggan["tlp"]; ?></option>
				<?php } ?>
			</select></td>
		</tr>
		<tr>
			<td>Barang<td>:</td></td>
			<td><select name="barang" required><option value="">-Pilih-</option> 
				<?php
				$sql=mysqli_query($conn,"SELECT*from t_barang");
				while ($abarang=mysqli_fetch_array($sql)) { ?> 
				<option value="<?php echo $abarang['kode_barang'] ?>"><?php echo $abarang["nama_barang"]; ?>, <?php echo $abarang["jenis"]; ?>, <?php echo $abarang["rasa"]; ?>, <?php echo rupiah($abarang["harga"]); ?></option>
				<?php } ?>
			</select></td>
		</tr>
		<tr>
			<td>Qty<td>:</td></td>
			<td><input type="text" name="qty"></td>
		</tr>
		</table>
		<table>
		<td><a href="?module=PERIODE"><=Kembali</a></td>
		<td><input style="width: 75px" type="submit" class="submitButton" value="Simpan" /></td>
		<td><input style="width: 75px" type="reset" class="submitButton" value="Reset" /></td>
		</table>
	<?php 
	$sql=mysqli_query($conn,"SELECT*from t_dapat where kode_periode='$kdperiode'");
	 ?>
	<table class="showdetail">
		<br>
	<tr>
		<td width="4%"><center>No.</center></td>
		<td width="15%"><center>Pelanggan</center></td>
		<td width="15%"><center>Nama Barang</center></td>
		<td width="6%"><center>Jenis</center></td>
		<td width="10%"><center>Harga</center></td>
		<td width="6%"><center>Qty</center></td>
		<td width="12%"><center>Jumlah Harga</center></td>
		<td width="7%" colspan="2"><center>Opsi</center></td>
	</tr>
	<a href="modul/transaksi/printdapat.php?&Kode=<?php echo $kdperiode?>" target="blank">Print>></a>
	<?php
  	$no = 0;
	while($rows=mysqli_fetch_array($sql)){
	$no++;
	$sqlbarang=mysqli_query($conn,"SELECT*From t_barang where kode_barang='$rows[kode_barang]'");
	$databarang=mysqli_fetch_array($sqlbarang);
	$sqlpelanggan=mysqli_query($conn,"SELECT*From t_pelanggan where kode_pel='$rows[kode_pel]'");
	$datapelanggan=mysqli_fetch_array($sqlpelanggan);
	?>
	<tr>
		<td><center><?php echo $no;?></center></td>
		<td><?php echo $datapelanggan['nama_pel'];?></td>
		<td><?php echo $databarang['nama_barang'];?></td>
		<td><?php echo $databarang['jenis'];?></td>
		<td align="right"><?php echo rupiah($databarang['harga']);?></td>
		<td align="center"><?php echo $rows['qty'];?></td>
		<td align="right"><?php echo rupiah($rows['jumlah_harga']);?></td>

		<td style="text-align: center;"><a href="modul/transaksi/deletedapat.php?&kode=<?php echo $rows['kode_periode'];?>&Kode=<?php echo $rows['no_dapat'];?>" onclick="return confirm('Yakin Hapus Data Ini?')">Delete</a></td>
	</tr>
	<?php  
	}
	 ?>
</table>
</form>