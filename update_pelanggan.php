<?php
include "inc/koneksi.php";
$kd = $_GET['Kode'];
$result=mysqli_query($conn,"SELECT * FROM t_pelanggan where kode_pel='$kd'");
while($data = mysqli_fetch_array($result))
{
    $kd    = $data['kode_pel'];
    $nampel = $data['nama_pel'];
    $alamat = $data['alamat'];
    $tlp = $data['tlp'];
}
 ?>
 <h3>Update Data Pelanggan</h3>
 <form method="POST" action="modul/Pelanggan/simpanupdate.php">
        <table border="0">
        	<tr> 
                <td>Kode Pelanggan</td>
                <td><input type="text" disabled="disabled" name="kodepel" value=<?php echo $kd;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nampel" value="<?php echo $nampel;?>"></td>
            </tr>
             <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat;?>"></input></td>
            </tr>
             <tr> 
                <td>No. Telepon</td>
                <td><input type="text" name="tlp" value="<?php echo $tlp;?>"></td>
            </tr>
            <tr> 
                <td><input type="hidden" name="kodepel" value=<?php echo $_GET['Kode'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
 </table>
 </form>