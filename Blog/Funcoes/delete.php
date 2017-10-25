<?php 
	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	$objBd = new bd();
	$conn=$objBd->conecta_mysql();
	$param = array();
	$data = date("Y/m/d H:i:s");
	array_push($param, $data);
	array_push($param, $_SESSION["id"]);
	array_push($param, $_SESSION["id"]);
	$sql="UPDATE `usuario` SET `status`= 0, `ult_alt` = ?, `alt_usuario_id` = ? WHERE id = ?;";
	$result = $objBd->exec($sql, 'sss', $param);
?>
<?php
	header("location:sair.php");
?>