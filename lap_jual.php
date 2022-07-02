
<table width="100%">
	<tr>
  		<td>
  			<form action="modul/transaksi/printperiode.php" method="post" name="form1" target="_blank">
      <b>Cari Tanggal :</b>
      <input name="txtCari" type="date"  size="40" maxlength="100"  />
      <b> Sampai Tanggal :</b>
      <input name="txtCari2" type="date" size="40" maxlength="100"  />
      <input name="btnCari" type="submit" value="Cari" />
      </form>
  	</td>  
  </tr>
  <script type="text/javascript">
	$(document).ready(function(){
		$('.input-tanggal').datepicker();		
	});
</script>
  
</table>