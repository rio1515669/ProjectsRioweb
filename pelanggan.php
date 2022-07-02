
<?php
error_reporting(0);
include 'inc/koneksi.php';
$sql=mysqli_query($conn,"SELECT*from t_pelanggan order by kode_pel");
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(kode_pel) as maxKode FROM t_pelanggan";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$kodepel = $data['maxKode'];
$noUrut = (int) substr($kodepel, 3, 3);
$noUrut++;
$char = "PG";
$kodepel = $char . sprintf("%03s", $noUrut);
?>
	<h3>Input Data Pelanggan</h3>
<form method="post" action="modul/Pelanggan/simpan.php">
	<table>
<tr>
	<td>Kode Pelanggan  <td>:<td> </td> 
	<td><input type="text" name="kodepel" value="<?php echo $kodepel ?>" /></td>
</tr>
<tr>
	<td> Nama Pelanggan <td>:<td> </td>
	<td><input type="text" name="nampel" /></td>
</tr>
<tr>
	<td> Alamat <td>:<td> </td>
	<td><textarea type="text" name="alamat" /></textarea></td>
</tr>
<tr>
	<td> No. Telepon <td>:<td> </td>
	<td><input type="text" name="tlp" /></td>
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
		<td><center>Kode Pelanggan</center></td>
		<td><center>Nama Pelanggan</center></td>
		<td><center>Alamat</center></td>
		<td><center>Telepon</center></td>
		<td style="width: 20%;" colspan="2"><center>Opsi</center></td>
	</tr>
	<?php 
	while($rows=mysqli_fetch_array($sql)){
	?>
	<tr>
		<td><?php echo $rows['kode_pel'];?></td>
		<td><?php echo $rows['nama_pel'];?></td>
		<td><?php echo $rows['alamat'];?></td>
		<td><?php echo $rows['tlp'];?></td>
		<td><a href="media.php?module=update_pelanggan&amp;Kode=<?php echo $rows['kode_pel'];?> ">Update</a></td>
		<td><a href="modul/Pelanggan/delete_pelanggan.php?&amp;Kode=<?php echo $rows['kode_pel'];?> " onclick="return confirm('Yakin Hapus ieu teh?')">Delete</a></td>
	
	</tr>
	<?php  
	}
	 ?>
	
</table>