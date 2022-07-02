<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_REQUEST['kode_periode'];
$tgl = $_REQUEST['tgl'];
			$sqldapat=mysqli_query($conn,"SELECT sum(jumlah_harga) AS pendapatan from t_dapat where kode_periode = '$kd' ");
			$datasum = mysqli_fetch_array($sqldapat);
$dapat = $datasum1['pendapatan'];
			$sqlkeluar=mysqli_query($conn,"SELECT sum(nilai) AS keluar from t_keluar where kode_periode = '$kd'");
			$datasum = mysqli_fetch_array($sqldapat);
$keluar = $datasum2['keluar'];

	$mysqli = "INSERT INTO t_periode (kode_periode,tanggal,pendapatan,pengeluaran) VALUES ('$kd','$tgl','$dapat','$keluar')";
	$result = mysqli_query($conn, $mysqli);
	$_SESSION['pesan'] = 'Data berhasil di tambahkan!!';
	if ($result)
		{ 
		header('location: ../../media.php?module=PERIODE');
		}
	else
		{
	echo "Input gagal";
		}
	?>