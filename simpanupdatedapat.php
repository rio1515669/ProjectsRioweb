<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_REQUEST['no_dapat'];
$kdperiode = $_REQUEST['kode_periode'];
$barang = $_REQUEST['barang'];
$pelanggan = $_REQUEST['pelanggan'];
$qty = $_REQUEST['qty'];

	$mysqli = "UPDATE t_dapat SET  kode_barang = '$barang',kode_pel ='$pelanggan',qty = '$qty'  WHERE no_dapat = '$kd'";
	$result = mysqli_query($conn,$mysqli);
	$_SESSION['pesan1'] = 'Data berhasil di Update!!';
	if ($result)
		{ 
		?>
		<script type="text/javascript">document.location.href="../../media.php?module=Edapat&Kode=<?php echo $kdperiode?>"</script>
		<?php
		}
	else
		{
	echo "Update gagal";
		}
	?>