<?php
session_start();
//$_SESSION["new"]="batata";
require_once('BdClass.php');
$objBd = new bd();

$Nome_Nigga = $_POST['Nome'];
$Senha_Nigga = $_POST['Senha'];
//$strcon = mysqli_connect('localhost','fabio','123','banco_teste') or die('Erro ao conectar ao banco de dados');
$conn=$objBd->conecta_mysql();
$sql = "INSERT INTO Login (Nome_Nigga,Senha_Nigga) VALUES (?,?)";
//$sql="select nome,senha from usuario where nome=? and senha=?;"
$param = array();
array_push($param, $_POST['Nome']);
array_push($param, $_POST['Senha']);

$aa=$objBd->exec($sql, 'ss', $param);
//if ($aa==false){
//  echo "deu ruim";
//  die;
//}
//else{
echo "Cliente cadastrado com sucesso!";
//}
header("refresh: 2;1.html");
?>