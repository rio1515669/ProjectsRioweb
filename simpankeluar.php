<?php
session_start();
include "../../inc/koneksi.php";
$kdperiode = $_POST['kdperiode'];
$keterangan = $_POST['keterangan'];
$nilai = $_POST['nilai'];


	$mysqli = "INSERT INTO t_keluar 
	(
	kode_periode,
	keterangan,
	nilai
	)
	 VALUES ('$kdperiode','$keterangan','$nilai')";
	$result = mysqli_query($conn, $mysqli);
	$_SESSION['pesan'] = 'Data berhasil di tambahkan!!';
	if ($result)
		{ 
		?>
		<script type="text/javascript">document.location.href="../../media.php?module=Ekeluar&Kode=<?php echo $kdperiode ?>"</script>
		<?php
		$sqlkeluar=mysqli_query($conn,"SELECT pengeluaran from t_periode where kode_periode = '$kdperiode'");
			$datasum = mysqli_fetch_array($sqlkeluar);	
			$keluar = $datasum['pengeluaran'];
			$keluaroke = $keluar + $nilai;

			$mysqli1 = "UPDATE t_periode SET pengeluaran = '$keluaroke' WHERE kode_periode  = '$kdperiode'";
			$result1 = mysqli_query($conn,$mysqli1);
		}
	else
		{
	echo "Input gagal";
		}
	?>