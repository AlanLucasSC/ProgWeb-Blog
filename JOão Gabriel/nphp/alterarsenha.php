<?php
//session_start();
//$_SESSION["new"]="batata";
require_once('BdClass.php');
$objBd = new bd();
require_once('funcoes.php');
valida();

//var_dump($_POST);
$Senha_Nigga = $_POST['Senha'];

//$strcon = mysqli_connect('localhost','fabio','123','banco_teste') or die('Erro ao conectar ao banco de dados');
$conn=$objBd->conecta_mysql();
//$sql = "INSERT INTO usuario (nome,cpf,senha) VALUES (?, ?, ?)";
$sql = "UPDATE Login SET Senha_Nigga=? WHERE Nome_Nigga=?";
//UPDATE table_name
//SET column1 = value1, column2 = value2, ...
//WHERE condition; 
//$sql="select nome,senha from usuario where nome=? and senha=?;"
$param = array();
//array_push($param, $_POST['Nome']);
//array_push($param, $_POST['CPF']);
array_push($param, $_POST['Senha']);
array_push($param, $_SESSION["Nome_Nigga"]);

$aa=$objBd->exec($sql, 'ss', $param);
//if ($aa==false){
//	echo "deu ruim";
//	die;
//}
//else{
echo "Senha alterada com sucesso!";
//}
header("refresh: 3;1.html");
?>