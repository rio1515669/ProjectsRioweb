<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_GET['Kode'];
$kode = $_GET['kode'];
$sqlperiode=mysqli_query($conn,"SELECT pendapatan from t_periode where kode_periode = '$kode'");
			$dataperiode = mysqli_fetch_array($sqlperiode);	
			$pendapatan = $dataperiode['pendapatan'];
			$sqldapat=mysqli_query($conn,"SELECT jumlah_harga from t_dapat where no_dapat = '$kd'");
			$datadapat = mysqli_fetch_array($sqldapat);
			$jumlahharga = $datadapat['jumlah_harga'];
			$hapusoke = $pendapatan - $jumlahharga;

			$mysqli1 = "UPDATE t_periode SET pendapatan = '$hapusoke' WHERE kode_periode  = '$kode'";
			$result1 = mysqli_query($conn,$mysqli1);

$mysqli = "DELETE FROM t_dapat WHERE no_dapat = '$kd'";
$sql = mysqli_query($conn,$mysqli);
$_SESSION['pesan2'] = 'Data berhasil di Delete!!';
if($sql)
{
			$mysql = mysqli_query($conn,"SELECT FROM t_dapat WHERE kode_periode");

?>
<script type="text/javascript">document.location.href="../../media.php?module=Edapat&Kode=<?php echo $kode?>"</script>
<?php
}
else	
{
echo "Gagal";
}

?>