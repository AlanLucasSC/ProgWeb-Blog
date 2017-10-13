<?php 
	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	$objBd = new bd();
	$conn=$objBd->conecta_mysql();
	$param = array();
	array_push($param, $_SESSION["id"]);
	$sql="DELETE FROM `Usuario` WHERE id = ?;";
	$result = $objBd->exec($sql, 's', $param);
?>
<?php
	header("location:sair.php");
?>