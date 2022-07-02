<?php
include "inc/koneksi.php";
$mod = $_GET['module'];
if ($mod=='HOME'){
?>
<div style="border: 1px dashed;">
    <?php
    echo "<h3>VISI :</h3>";
    echo "<h4>Menjadi perusahaan Supplier terbaik dengan mengutamakan    
   profesionalisasi kerja</h4>";
   echo "<h3>MISI :</h3>";
    echo "<h4>Memberikan kepuasan bagi Konsumen Dan Menjaga Suatu karya Cita Rasa Produk Makanan</h4>";
    ?>
</div>
<?php
}
elseif ($mod=='BARANG'){
    include "modul/Barang/barang.php";
}
    elseif ($mod=='update_barang'){
    include "modul/Barang/update_barang.php";
}
	elseif ($mod=='PELANGGAN'){
    include "modul/Pelanggan/pelanggan.php";
}
    elseif ($mod=='update_pelanggan'){
    include "modul/Pelanggan/update_pelanggan.php";
}
	elseif ($mod=='PERIODE'){
    include "modul/transaksi/periode.php";
}
    elseif ($mod=='Edapat'){
    include "modul/transaksi/dapat.php";
}
    elseif ($mod=='Ekeluar'){
    include "modul/transaksi/keluar.php";
}
    elseif ($mod=='INPUTPERIODE'){
    include "modul/transaksi/inputperiode.php";
}
    elseif ($mod=='updatedapat'){
    include "modul/transaksi/updatedapat.php";
}
    elseif ($mod=='updateperiode'){
    include "modul/transaksi/updateperiode.php";
}
    elseif ($mod=='lap'){
    include "modul/transaksi/lap_jual.php";
}
elseif ($mod=='VIEW'){
    include "modul/transaksi/view.php";
}