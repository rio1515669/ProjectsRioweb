<center>
 	<?php 
	if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') 
	{
	echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan'].'</div>';
	}
	$_SESSION['pesan'] = '';
	?>
 	<?php 
	if (isset($_SESSION['pesan1']) && $_SESSION['pesan1'] <> '') 
	{
	echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan1'].'</div>';
	}
	$_SESSION['pesan1'] = '';
	?>
	<?php 
	if (isset($_SESSION['pesan2']) && $_SESSION['pesan2'] <> '') 
	{
	echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan2'].'</div>';
	}
	$_SESSION['pesan2'] = '';
	?>
</center>
