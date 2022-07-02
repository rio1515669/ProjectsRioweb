<?php 
session_start();
?>
<html>
<head>
	<title></title>
</head>
<?php
error_reporting(0);
include 'inc/koneksi.php';
function rupiah($angka)
  	{
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	}
$sql=mysqli_query($conn,"SELECT*from t_barang order by kode_barang");
$query = "SELECT max(kode_barang) as maxKode FROM t_barang";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$kobar = $data['maxKode'];
$noUrut = (int) substr($kobar, 3, 3);
 $noUrut++;
$char = "BR";
$kobar = $char . sprintf("%03s", $noUrut);
?>
<body>
	<td><h3>Input Data Barang</h3></td>
<form method="post" action="modul/Barang/simpan.php">
	<table>
<tr>
	<td>Kode Barang  <td>:<td> </td> 
	<td><input type="text" name="kobar" value="<?php echo $kobar ?>" /></td>
</tr>
<tr>
	<td> Nama Barang <td>:<td> </td>
	<td><input type="text" name="nabar" /></td>
</tr>
<tr>
	<td> Jenis <td>:<td> </td>
	<td><select name="jenis">
		<option></option>
		<option>Besar</option>
		<option>Sedang</option>
		<option>Mini</option>
	</select></td>
</tr>
<tr>
	<td> Rasa <td>:<td> </td>
	<td><input type="text" name="rasa" /></td>
</tr>
<tr>
	<td> Harga  <td>:<td> </td>
	<td><input type="text" name="harga" /></td>
</tr>
	<tr>
	<td>
	<input style="width: 75px" type="submit" class="submitButton" value="Simpan" />
	<input style="width: 75px" type="reset" class="submitButton" value="Reset" />
	</td>
</tr>
	</table>
</form>

<hr style="border: 1px dashed;">

<table class="show">
	<tr>
		<td style="width: 15%;"><center>Kode Barang</center></td>
		<td style="width: 20%;"><center>Nama</center></td>
		<td style="width: 15%;"><center>Jenis</center></td>
		<td style="width: 15%;"><center>Rasa</center></td>
		<td style="width: 15%;"><center>Harga</center></td>
		<td style="width: 20%;" colspan="2"><center>Opsi</center></td>
	</tr>
	<?php 
	while($rows=mysqli_fetch_array($sql)){
	?>
	<tr>
		<td align="center"><?php echo $rows['kode_barang'];?></td>
		<td align="left"><?php echo $rows['nama_barang'];?></td>
		<td align="left"><?php echo $rows['jenis'];?></td>
		<td align="left"><?php echo $rows['rasa'];?></td>
		<td align="right"><?php echo rupiah($rows['harga']);?></td>
		<td><a href="media.php?module=update_barang&amp;Kode=<?php echo $rows['kode_barang'];?> ">Update</a></td>
		<td><a href="modul/Barang/delete_barang.php?&amp;Kode=<?php echo $rows['kode_barang'];?> " onclick="return confirm('Yakin Hapus ieu teh?')">Delete</a></td>
	
	</tr>
	<?php  
	}
	 ?>
	
</table>
</body>
</html>