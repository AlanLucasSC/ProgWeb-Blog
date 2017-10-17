<<?php

require_once('BdClass.php');
$objBd = new bd();
require_once('funcoes.php');
valida();


$Nome_Nigga = $_POST['Nome'];
$conn=$objBd->conecta_mysql();
$sql = "UPDATE Login SET Nome_Nigga=? WHERE id=?";
$param = array();
array_push($param, $_POST['Nome_Nigga']);
array_push($param, $_SESSION["Nome_Nigga"]);

$aa=$objBd->exec($sql, 'ss', $param);
echo "Nome alterada com sucesso!";
header("location:1.html");
?>