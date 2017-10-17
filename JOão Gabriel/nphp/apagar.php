<?php

require_once('BdClass.php');
$objBd = new bd();
require_once('funcoes.php');
valida();


$conn=$objBd->conecta_mysql();
$sql = "DELETE FROM Login WHERE Nome_Nigga=? and Senha_Nigga=?";
var_dump($_SESSION);
$param=array();
array_push($param, $_SESSION["Nome_Nigga"]);
array_push($param, $_SESSION["Senha_Nigga"]);
$aa=$objBd->exec($sql, 'ss', $param);

echo "Excluído com sucesso!";
header("location:index.php");
?>