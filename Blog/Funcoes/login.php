<?php 
session_start();
$_SESSION["new"]="batata/Bd_Class";
require_once('BdClass.php');
//$new="manga";
//echo $_SESSION["new"];
if(isset($_GET['login']) and isset($_GET['senha'])){
	$objBd = new bd();
	$conn=$objBd->conecta_mysql();
	//echo "he";
	$param = array();
	array_push($param, $_GET['login']);
	array_push($param, $_GET['senha']);
	$sql="SELECT nome, senha, id, tipo from usuario where nome=? and senha=? and status = 1;";
	$result = $objBd->exec($sql, 'ss', $param);
	$valor=mysqli_fetch_array($result);
	if (isset($valor['nome'])){
		$_SESSION["nome"]=$valor['nome'];
		$_SESSION["senha"]=$valor['senha'];
		$_SESSION["id"]=$valor['id'];
		$_SESSION["tipo"]=$valor['tipo'];
		$_SESSION["i"] = 1;
		$_SESSION['tipoAlert'] = 'Login feito com sucesso';
		//echo $_SESSION["nome"];
		header("location: ../index.php");
	}
	else{
		$_SESSION['error'] = 1;
		$_SESSION['where'] = '"Funcoes/login.php"';
		$_SESSION['type'] = 'Erro ao logar';
		header("location: ../index.php");
	}
}


?>




<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" media="screen" href="estilos.css" />
</head>
<body>

	<form method="GET" action="Funcoes/login.php">
        	<div class="login">
        		<h2 >Login</h2>
        		<div class="alter">Nome: <input type="text" name="login">  </div>
    			<div class="alter">Senha: <input type="password" name="senha"><br></div>
				<div><button type="submit">Logar</button></div>
        	</div>
	</form>
</body>
</html>
