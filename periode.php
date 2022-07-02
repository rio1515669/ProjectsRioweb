<?php
include 'koneksi2.php';
 function rupiah($angka)
  	{
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	}
?>
<table width="100%">
	<?php
			$sql_pen=mysqli_query($conn,"SELECT sum(pendapatan) AS pdp from t_periode ");
			$data_pen=mysqli_fetch_array($sql_pen);
			$sql_peg=mysqli_query($conn,"SELECT sum(pengeluaran) AS pgp from t_periode ");
			$data_peg=mysqli_fetch_array($sql_peg);
			$total = $data_pen['pdp']-$data_peg['pgp'];
	?>
<tr>
<td><h3>DATA TRANSAKSI PENJUALAN</h3></td>
<td rowspan="2" width="15%" style="background-color: #9932CC;text-shadow: 2px -1px 10px rgb(186, 27, 176); " align="center">Total Hasil :<h4><?php echo rupiah($total)?></h4></td>
</tr>
<tr>
<td colspan="1"><a href="?module=INPUTPERIODE">TAMBAH DATA>> </a></td>
</tr>
</table>  
<table>   
<form action="?module=VIEW" method="post" >
  <tr>
	<td><label>Cari :</label></td>
	<td><input type="date" name="cari"></td>
	<td><input type="submit" value="Cari"></td>
  <td><a href="?module=PERIODE">Refresh</a></td>
  </tr>
</form>
</table>
  <table class="show">
  <tr>
    <td style="width: 3%;"><center>No</center></td>
    <td style="width: 10%;"><center>Kode Periode</center></td>
    <td style="width: 10%;"><center>Tanggal</center></td>
    <td style="width: 15%;" colspan="2"><center>Pendapatan</center></td>
    <td style="width: 15%;" colspan="2"><center>Pengeluaran</center></td>
    <td style="width: 10%;"><center>Hasil</center></td>
    <td style="width: 7%;" colspan="1"><center>Opsi</center></td>
  </tr> 
  <?php  
  $limit = 5;
  $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
  $limitStart = ($page - 1) * $limit;
  $sql=mysqli_query($conn,"SELECT * FROM t_periode order by kode_periode LIMIT ".$limitStart.",".$limit);
  $no = $limitStart + 1;
while($rows=mysqli_fetch_array($sql)){
			$dapat = $rows['pendapatan'];
			$keluar = $rows['pengeluaran'];
			$hasil = $dapat - $keluar;
	?>
	<tr>
		<td align="center"><?php echo $no++; ?></td>
		<td><center><?php echo $rows['kode_periode'];?></center></td>
		<td align="center"><?php echo $rows['tanggal'];?></td>
		<td align="right" width="12%"><?php echo rupiah($rows['pendapatan']);?></td>
		<td><a href="media.php?module=Edapat&Kode=<?php echo $rows['kode_periode'];?>">View</a></td>
		<td align="right" width="12%"><?php echo rupiah($rows['pengeluaran']);?></td>
		<td><a href="media.php?module=Ekeluar&Kode=<?php echo $rows['kode_periode'];?>">View</a></td>
		<td align="right"><?php echo rupiah($hasil);?></td>
		<td align="center"><a href="modul/transaksi/deleteperiode.php?&amp;Kode=<?php echo $rows['kode_periode'];?>" onclick="return confirm('Semua Data Dalam transaksi ini akan terhapus??')">Delete</a></td>
	
	</tr>
	<?php  
	}
	 ?>
</table>
 <?php
    // Jika page = 1, maka LinkPrev disable
    if($page == 1){ 
    ?>        
      <!-- link Previous Page disable --> 
      <a href="#">Previous</a>
    <?php
    }
    else{ 
      $LinkPrev = ($page > 1)? $page - 1 : 1;
    ?>
      <!-- link Previous Page --> 
      <a href="?module=PERIODE&page=<?php echo $LinkPrev; ?>">Previous</a>
    <?php
      }
    ?>

    <?php
    $SqlQuery = mysqli_query($conn, "SELECT * FROM t_periode");        
    
    //Hitung semua jumlah data yang berada pada tabel Sisawa
    $JumlahData = mysqli_num_rows($SqlQuery);
    
    // Hitung jumlah halaman yang tersedia
    $jumlahPage = ceil($JumlahData / $limit); 
    
    // Jumlah link number 
    $jumlahNumber = 1; 

    // Untuk awal link number
    $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
    
    // Untuk akhir link number
    $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
    
    for($i = $startNumber; $i <= $endNumber; $i++){
      $linkActive = ($page == $i)? ' class="active"' : '';
    ?>
    <a href=?module=PERIODE&page=<?php echo $i; ?>><?php echo $i; ?></a>
    <?php
      }
    ?>
    
    <!-- link Next Page -->
    <?php       
    if($page == $jumlahPage){ 
    ?>
    <a href="#">Next</a>
    <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
    ?>
    <a href="?module=PERIODE&page=<?php echo $linkNext; ?>">Next</a>
    <?php
    }
    ?>