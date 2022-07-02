<html>
<head>
	<title></title>
</head>
<?php
include 'inc/koneksi.php';
?>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<?php
error_reporting(0);
include 'inc/koneksi.php';
$sql=mysqli_query($conn,"SELECT*from t_periode order by kode_periode");
$data=mysqli_fetch_array($sql);
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(kode_periode) as maxKode FROM t_periode";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$kd_periode = $data['maxKode'];
$noUrut = (int) substr($kd_periode, 3, 3);
 $noUrut++;
$char = "PR";
$kd_periode = $char . sprintf("%03s", $noUrut);
?>
<body>
<form method="post" action="modul/transaksi/simpanperiode.php">
	<h3>INPUT PERIODE</h3>
	<table>
		<tr>
			<td>Kode Periode<td>:</td></td>
			<td width="50%"><input type="text" name="kode_periode" value="<?php echo $kd_periode ?>"></td>
		</tr>
		<tr>
			<td>Tanggal<td>:</td></td>
			<td width="50%"><input type="date" name="tgl"></td>
		</tr>
		<tr>
			<td>
			<input style="width: 75px" type="submit" class="submitButton" value="Simpan" />
			<input style="width: 75px" type="reset" class="submitButton" value="Reset" />
			</td>
</tr>
	</table>
</form>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.input-tanggal').datepicker();		
	});
</script>
</html>