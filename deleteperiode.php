<?php
session_start();
include "../../inc/koneksi.php";

$kd = $_GET['Kode'];
$mysqli = "DELETE FROM t_dapat WHERE kode_periode = '$kd'";
$sql = mysqli_query($conn,$mysqli);
$mysqli1 = "DELETE FROM t_keluar WHERE kode_periode = '$kd'";
$sql1 = mysqli_query($conn,$mysqli1); 
$mysqli2 = "DELETE FROM t_periode WHERE kode_periode = '$kd'"; 
$sql2 = mysqli_query($conn,$mysqli2);
$_SESSION['pesan2'] = 'Data berhasil di Delete!!';
if($sql2)	
	{
	header("location: ../../media.php?module=PERIODE");
	}	
else
	{
	echo "Gagal!!";	
	}

?>