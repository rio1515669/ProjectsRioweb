<?php
include 'koneksi2.php';
  if(isset($_POST['cari']))
  {
    $cari = $_POST['cari'];
    $sql = mysqli_query($conn,"SELECT * from t_periode where tanggal like '%".$cari."%'"); 
    $no = 1;  
      while($rows=mysqli_fetch_array($sql))
      {
      $dapat = $rows['pendapatan'];
      $keluar = $rows['pengeluaran'];
      $hasil = $dapat - $keluar;
      ?>
    <tr style="color: blue;">
    <td><?php echo $no++; ?></td>
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
  }
  else
  {
  $sql=mysqli_query($conn,"SELECT * FROM t_periode order by kode_periode LIMIT ".$limitStart.",".$limit);
  }   