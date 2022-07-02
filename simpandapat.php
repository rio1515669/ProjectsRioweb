<?php
session_start();
include "../../inc/koneksi.php";
$kdperiode = $_POST['kdperiode'];
$nampel = $_POST['nampel'];
$barang = $_POST['barang'];
$qty = $_POST['qty'];

				$sqlbarang=mysqli_query($conn,"SELECT*From t_barang where kode_barang='$barang'");
				$databarang=mysqli_fetch_array($sqlbarang);

$harga = $databarang['harga'];
$jumlahharga=$qty*$harga;


	$mysqli = "INSERT INTO t_dapat 
	(
	kode_periode,
	kode_pel,
	kode_barang,
	qty,
	jumlah_harga
	)
	 VALUES ('$kdperiode','$nampel','$barang','$qty','$jumlahharga')";
	$result = mysqli_query($conn, $mysqli);
	$_SESSION['pesan'] = 'Data berhasil di tambahkan!!';
	if ($result)
		{ 
		?>
		<script type="text/javascript">document.location.href="../../media.php?module=Edapat&Kode=<?php echo $kdperiode ?>"</script>
		<?php
			$sqldapat=mysqli_query($conn,"SELECT pendapatan from t_periode where kode_periode = '$kdperiode'");
			$datasum = mysqli_fetch_array($sqldapat);	
			$dapat = $datasum['pendapatan'];
			$dapatoke = $dapat + $jumlahharga;

			$mysqli1 = "UPDATE t_periode SET pendapatan = '$dapatoke' WHERE kode_periode  = '$kdperiode'";
			$result1 = mysqli_query($conn,$mysqli1);
		}
	else
		{
	echo "Input gagal";
		}
	?>