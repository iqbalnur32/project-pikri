<?php 
	
	session_start();
	include 'koneksi.php';

	if ($_POST) {
		# code...
	}else{

		$result = $mysqli->query("SELECT * FROM `denom_kertas` WHERE `id_denom_kertas` = ".$_GET['id_denom_kertas']."");

		if($result->num_rows > 0){
           $data = mysqli_fetch_object($result);
        }else{
           echo "data tidak tersedia";
           die();
        }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ini Edit </title>
</head>
<body>
	<h2><?= $data ?></h2>	
</body>
</html>