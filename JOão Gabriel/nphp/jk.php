<?php 
session_start();
$_SESSION["new"]="limitado";
require_once('BdClass.php');
//$new="manga";
//echo $_SESSION["new"];
if(isset($_GET['login']) and isset($_GET['senha'])){
	$objBd = new bd();
	//$conn=mysqli_connect('127.0.0.1', 'progWeb', '123456', '2for');
	$conn=$objBd->conecta_mysql();
	$param = array();
	array_push($param, $_GET['login']);
	array_push($param, $_GET['senha']);
	
	///$sql="SELECT * FROM 2for where nome='".$_GET['login']."';";///////////////////
	$sql="select Nome_Nigga,Senha_Nigga from Login where Nome_Nigga=? and Senha_Nigga=?;";//no lugar da primeira ?'".$_GET['login']."'and senha='".($_GET['senha'])."';";
	$result=$objBd->exec($sql, 'ss', $param);
	//$stmt=$conn->prepare($sql);
	//$stmt->bind_param('ss',...$param);
	//$stmt->execute();
	//echo $sql;
	//$result = $stmt->get_re_SESSION["id"]=$valor['id'];sult();//mysqli_query($conn, $sql);
	if(!$result){
		die('Invalid query: ' . mysql_error());
	}
	$valor=mysqli_fetch_array($result);
	/*
	do{_SESSION["id"]=$valor['id'];
		$rows=mysqli_fetch_assoc($result);
		echo $rows['Host'] . ' ';
		echo $rows['User'] . ' ';
		echo '<br>';
	}while($rows);
	*/
	if (isset($valor['Nome_Nigga'])){
		$_SESSION["Nome_Nigga"]=$valor['Nome_Nigga'];
		$_SESSION["Senha_Nigga"]=$valor['Senha_Nigga'];
		echo $valor['nome'];
		header("location:1.html");
	}
	else{
		echo "erro ao logar";
	}
}


?>




<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form method="GET" action "index.php>
	
        	<div><input type="text" name="login" value="<?php echo $_GET["login"]?>">  </div>
    		<div><input type="password" name="senha"><br></div>
		<div><input type="submit" name="ok"></div>
		<br> <br>
		<li><a href="formulario.php">Novo</a></li>
	</form>

<?php 
//var_dump($_GET);
//echo $_GET["login"];
//var_dump($_SESSION["new"]);
//<div><input type="text" name="nome" required="required" placeholder="nome de usuario" pattern="[0-9]" maxlength="10" size="10px"><br> </div>
//<div><input type="password" name="123" required="required" placeholder="senha"><br></div>
?>
</body>
</html>