<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_GET['Kode'];
$kode = $_GET['kode'];
$sqlperiode=mysqli_query($conn,"SELECT pengeluaran from t_periode where kode_periode = '$kode'");
			$dataperiode = mysqli_fetch_array($sqlperiode);	
			$pengeluaran = $dataperiode['pengeluaran'];
			$sqlkeluar=mysqli_query($conn,"SELECT nilai from t_keluar where no_keluar = '$kd'");
			$datakeluar = mysqli_fetch_array($sqlkeluar);
			$nilai = $datakeluar['nilai'];
			$hapusoke = $pengeluaran - $nilai;

			$mysqli1 = "UPDATE t_periode SET pengeluaran = '$hapusoke' WHERE kode_periode  = '$kode'";
			$result1 = mysqli_query($conn,$mysqli1);

$mysqli = "DELETE FROM t_keluar WHERE no_keluar = '$kd'";
$sql = mysqli_query($conn,$mysqli);
$_SESSION['pesan2'] = 'Data berhasil di Delete!!';
if($sql)
{
			$mysql = mysqli_query($conn,"SELECT FROM t_keluar WHERE kode_periode");

?>
<script type="text/javascript">document.location.href="../../media.php?module=Ekeluar&Kode=<?php echo $kode?>"</script>
<?php
}
else	
{
echo "Gagal";
}

?>