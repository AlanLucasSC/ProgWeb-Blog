<?php
session_start();
$_SESSION["new"]="limitado";
require_once('BdClass.php');
if(isset($_GET['login']) and isset($_GET['senha'])){
$objBd = new bd();
$objBd->conecta_mysql();

$param= array();
array_push($param, $_GET['login']);
array_push($param, $_GET['senha']);

$sql="SELECT Nome_Nigga,Senha_Nigga,id from Login where Nome_Nigga=? and Senha_Nigga=?;";
$result=$objBd->exec($sql,'ss',$param);
//$stmt=$conn->prepare($sql);
//$stmt->bid_param('ss',...$param);
//$stmt->execute();
//$result = $stmt->get_result();
//echo $sql;
//$result = mysqli_query($conn,$sql);

if(!$result){
	//die('Invalid query:'.mysql_error());
}
$valor=mysqli_fetch_array($result);
if(isset($valor['Nome_Nigga'])){

	$_SESSION["Nome_Nigga"]=$valor['Nome_Nigga'];
	$_SESSION["Senha_Nigga"]=$valor['Senha_Nigga'];
	$_SESSION["id"]=$valor['id'];
	echo $valor['Nome_Nigga'];
	header("location:1.html");
}
else{
     echo "seu merda,nao foi!";
 }
}
//do{
//	$rows=mysqli_fetch_assoc($result);
//	echo $rows['Nome do Sacole de Petroleo'].' ';
//	echo $rows['Senha do Quadro Negro'].' ';
//	echo '<br>';
//}while($rows);
?>

<!DOCTYPE html>
<html>
<head>
	<title>INICIO</title>
</head>
<body>
<form method="GET" action="index.php">
	<div><input type="text" name="login" value="">
	</div>
	<div><input type="password" name="senha">
	</div>
	<div><input type="submit" name="ok">
	</div>
	<div><input name="" type="button" onClick="window.open('ex.php')" value="Criar Cadastro">
	</div>
</form>
<?php
//var_dump($_GET);
//echo $_GET["login"];
//var_dump($_SESSION["new"]);
?>
</body>
</html>