<?php 
	
	session_start();
	include '../koneksi.php';
	$result = $mysqli->query("DELETE FROM `denom_kertas` WHERE `denom_kertas`.`id_denom_kertas` = ".$_GET['id_denom_kertas']."");

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		// echo base_url('denom_kertas.php');
		print_r('berhasil');
		// echo "<script>window.location = 'denom_kertas.php'</script>";
	}

?>