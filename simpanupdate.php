<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_REQUEST['kodepel'];
$nampel = $_REQUEST['nampel'];
$alamat = $_REQUEST['alamat'];
$tlp = $_REQUEST['tlp'];

	$mysqli = "UPDATE t_pelanggan SET nama_pel = '$nampel', alamat = '$alamat', tlp ='$tlp' WHERE kode_pel  = '$kd'";
	$result = mysqli_query($conn,$mysqli);
	$_SESSION['pesan1'] = 'Data berhasil di Update!!';
	if($result)	
	{
	header('location: ../../media.php?module=PELANGGAN');	
	}
	else
	{
	echo "Gagal!!";	
	}
?>