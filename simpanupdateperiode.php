<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_REQUEST['kdperiode'];
$periode = $_REQUEST['periode'];
$bulan = $_REQUEST['bulan'];
$tahun = $_REQUEST['tahun'];
$total = $_REQUEST['total'];

	$mysqli = "UPDATE t_periode SET 
	bulan = '$bulan',
	Tahun = '$tahun',
	periode = '$periode',
	total = '$total'
	 WHERE kode_periode = '$kd'";
	$result = mysqli_query($conn, $mysqli);
	$_SESSION['pesan'] = 'Data berhasil di Update!!';
	if ($result)
		{ 
		?>
		<script type="text/javascript">document.location.href="../../media.php?module=PERIODE&Kode=<?php echo $kd?>"</script>
		<?php
		}
	else
		{
	echo "Input gagal";
		}
	?>