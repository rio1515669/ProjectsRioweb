<?php
session_start();
include "../../inc/koneksi.php";
$kd = $_REQUEST['kodepel'];
$pelanggan = $_REQUEST['nampel'];
$alamat = $_REQUEST['alamat'];
$tlp = $_REQUEST['tlp'];
if (!empty($pelanggan) && !empty($tlp)) 
	{ 
	$mysqli = "INSERT INTO t_pelanggan VALUES ('$kd', '$pelanggan', '$alamat','$tlp')";
	$result = mysqli_query($conn, $mysqli);
	$_SESSION['pesan'] = 'Data berhasil di tambahkan!!';
	if ($result)
		{ 
		header('location: ../../media.php?module=PELANGGAN');
		}
	else
		{
	echo "Input gagal";
		}
	}
else 
	{
	if (empty($pelanggan)) 
		{ 
		echo "Nama harus di isi";
		} 
	}
if (empty($tlp)) 
	{ 
	echo "telepon harus di isi"; 
	} 
mysqli_close($conn);
?>