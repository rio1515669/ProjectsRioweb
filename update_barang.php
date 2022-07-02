<?php
include "inc/koneksi.php";
$kd = $_GET['Kode'];
$result=mysqli_query($conn,"SELECT * FROM t_barang where kode_barang='$kd'");
while($data = mysqli_fetch_array($result))
{
    $kd = $data['kode_barang'];
    $jenis = $data['jenis'];
    $satuan = $data['satuan'];
    $berat = $data['berat'];
    $harga = $data['harga'];
}
 ?>
 <h3>Update Data Barang</h3>
 <form method="POST" action="modul/Barang/simpanupdate.php">
        <table border="0">
        	<tr> 
                <td>Kode Barang</td>
                <td><input type="text" disabled="disabled" name="kobar" value=<?php echo $kd;?>></td>
            </tr>
            <tr> 
                <td>Jenis</td>
                <td><input type="text" name="jenis" value="<?php echo $jenis;?>"></td>
            </tr>
            <tr> 
                <td>Satuan</td>
                <td><input type="text" name="satuan" value="<?php echo $satuan;?>"></td>
            </tr>
             <tr> 
                <td>Berat</td>
                <td><input type="text" name="berat" value="<?php echo $berat;?>"></td>
            </tr>
             <tr> 
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga;?>"></td>
            </tr>
            <tr> 
                <td><input type="hidden" name="kobar" value=<?php echo $_GET['Kode'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
 </table>
 </form>