<?php
session_start();
include "../../inc/koneksi.php";

$kd = $_GET['Kode'];
 
$mysqli = "DELETE FROM t_barang WHERE kode_barang = '$kd'"; 
$sql = mysqli_query($conn,$mysqli);
$_SESSION['pesan2'] = 'Data berhasil di Delete!!';
if($sql)	
	{
	header("location: ../../media.php?module=BARANG");
	}	
else
	{
	echo "Gagal!!";	
	}

?>