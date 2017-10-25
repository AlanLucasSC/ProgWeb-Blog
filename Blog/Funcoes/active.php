<?php   
	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	$objBd = new bd();
	$conn=$objBd->conecta_mysql();
	$data = date("Y/m/d H:i:s");
	$param = array();
	array_push($param, $data);
	array_push($param, $_SESSION["id"]);
	array_push($param, $_GET["id"]);
	$sql="UPDATE `usuario` SET `status`= 1, `ult_alt` = ?, `alt_usuario_id` = ? WHERE id = ?;";
	$result = $objBd->exec($sql, 'sss', $param);
?>
<?php
	$_SESSION['error'] = 1;
	$_SESSION['where'] = '"Funcoes/ShowUser.php"';
	$_SESSION['type'] = 'Ativado com sucesso';
	header("location: ../index.php");
?>