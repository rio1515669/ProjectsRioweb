<?php 
session_start();
?>
<html>
<head>
	<title>..::family::..</title>
</head>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
				<nav class="navbar navbar-expand-md navbar-dark bg-dark site-navbar">
				<a class="navbar-brand site-logo" href="?module=HOME">
				<h3><span>Family</span>KEBAB</h3></a>
				<p>Taste of Food Products</p>
				<hr>
				</nav>

<div class="menu">
<?php include "menu.php"?>
</div>
<div>
	<?php 
	if($_SESSION['status']!="login")
	{
		header("location:index.php");
	}
	?>
<?php include "notip.php" ?>
</div>
<div class="isi">
	<?php include "content.php" ?>
</div>
<div class="footer">
<h6>copyright &copy; CV. family-kebab</h6>
</div>
        <script src="js/jquery.min.js"></script>
        <script>
            $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
        </script>
</body>
</html>