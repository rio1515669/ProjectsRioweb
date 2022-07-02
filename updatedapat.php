<?php
include "inc/koneksi.php";
function rupiah($angka)
    {
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
    }
$kd = $_GET['Kode'];
$result=mysqli_query($conn,"SELECT * FROM t_dapat where no_dapat ='$kd'");
while($data = mysqli_fetch_array($result))
{
    $kd    = $data['no_dapat'];
    $kdperiode = $data['kode_periode'];
    $barang = $data['kode_barang'];
    $qbarang = mysqli_query($conn,"SELECT * FROM t_barang where kode_barang='$barang'");
    $databarang = mysqli_fetch_array($qbarang);
    $pelanggan = $data['kode_pel'];
    $qpelanggan = mysqli_query($conn,"SELECT * FROM t_pelanggan WHERE kode_pel='$pelanggan'");
    $datapelanggan = mysqli_fetch_array($qpelanggan);
    $qty = $data['qty'];
}

 ?>
 <h3 style="text-align: center;">UPDATE PENDAPATAN</h3>
 <form method="POST" action="modul/transaksi/simpanupdatedapat.php">
     <input type="hidden" name="kode_periode" value="<?php echo $kdperiode ?>">
    <input type="hidden" name="no_dapat" value="<?php echo $kd ?>">
        <table border="0">
            <tr>
            <td>Barang<td>:</td></td>
            <td><select name="barang" required><option value="<?php echo $barang?>"><?php echo $databarang["jenis"]; ?>, <?php echo $databarang["berat"]; ?>, <?php echo $databarang["satuan"]; ?>, <?php echo rupiah($databarang["harga"]); ?></option> 
                <?php
                $sql=mysqli_query($conn,"SELECT*from t_barang");
                while ($abarang=mysqli_fetch_array($sql)) { ?> 
                <option value="<?php echo $barang['kode_barang'] ?>"><?php echo $abarang["jenis"]; ?>, <?php echo $abarang["berat"]; ?>, <?php echo $abarang["satuan"]; ?>, <?php echo rupiah($abarang["harga"]); ?></option>
                <?php } ?>
            </tr>
            <tr>
            <td>Pelanggan<td>:</td></td>
            <td><select name="pelanggan" required><option value="<?php echo $pelanggan?>"><?php echo $datapelanggan["kode_pel"]; ?>, <?php echo $datapelanggan["nama_pel"]; ?>, <?php echo $datapelanggan["alamat"]; ?>, <?php echo $datapelanggan["tlp"]; ?></option> 
                <?php
                $sql=mysqli_query($conn,"SELECT*from t_pelanggan");
                while ($apelanggan=mysqli_fetch_array($sql)) { ?> 
                <option value="<?php echo $jabatan['kd_jabatan'] ?>"><?php echo $apelanggan["kode_pel"]; ?>, <?php echo $apelanggan["nama_pel"]; ?>, <?php echo $apelanggan["alamat"]; ?>, <?php echo $apelanggan["tlp"]; ?></option>
                <?php } ?>
            </tr>
            <tr>
            <td style="padding-left: 25px">Qty<td>:</td></td>
            <td><input type="text" name="qty" value="<?php echo $qty?>"></td>
            </tr>
            <tr> 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
 </table>
 </form>