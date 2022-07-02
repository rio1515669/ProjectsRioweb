<?php
session_start();
include "../../inc/koneksi.php";

$kd = $_GET['Kode'];
 
$mysqli = "DELETE FROM t_pelanggan WHERE kode_pel = '$kd'"; 
$sql = mysqli_query($conn,$mysqli);
$_SESSION['pesan2'] = 'Data berhasil di Delete!!';
if($sql)	
	{
	header("location: ../../media.php?module=PELANGGAN");
	}	
else
	{
	echo "Gagal!!";	
	}

?>