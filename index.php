<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
  <h2>CV. Family KEBAB</h2>
  <div class="underline-title"></div>
  </div>
  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "Login gagal! username dan password salah!";
    }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
      echo "Anda harus login untuk mengakses halaman admin";
    }
  }
  ?>
  <table>
  <form method="post" action="cek_login.php">
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" name="username" class="form-content"><div class="form-border"></div></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="password" class="form-content"required /><div class="form-border"></div></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="LOGIN"></td>
      </tr>    
  </form>
  </table>
  </div>
  </div> 
<div>Kp.Cibandawa Desa Srogol Kec.Cigombong Bogor</div>
</body>
</html>