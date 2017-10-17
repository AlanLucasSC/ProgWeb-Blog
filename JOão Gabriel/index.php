<?php
	session_start();
	$_SESSION["new"] = "hue";
	$conn = 1;
	$conn = mysqli_connect('127.0.0.1', 'progWeb', '123456', 'doisFor');
	if (!$conn) {
		echo "vc é um merda meu irmão";
	}
	else
	{
		echo "acerto miseravel!!!!";
	}

	//$sql = "SELECT * FROM user where User='".$_POST['login']."';";
	//$sql = "SELECT * FROM Usuario where nome='".$_POST['login']."';";
	$sql = "INSERT INTO Usuario (nome, senha) VALUES ('".$_POST['login']."','".md5($_POST['senha'])."');";
	echo $sql;
	/*$result = mysqli_query($conn, $sql);
	if(!$result)
	{
		die('Invalid query: ' . mysql_error());
	}
	do
	{

		$rows = mysqli_fetch_assoc($result);
		echo $rows['Host'].' ';
		echo $rows['User'].' ';
		echo '<br>';
	}while($rows);*/
	$result = mysqli_query($conn, $sql);
	if(!$result)
	{
		die('Invalid query: ' . mysql_error());
	}
	/*
	do
	{

		$rows = mysqli_fetch_assoc($result);
		echo $rows['nome'].' ';
		echo $rows['senha'].' ';
		echo '<br>';
	}while($rows);*/
?>


<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
</head>
<body>
	<form class="a1" method="POST" action="index.php">
		<div>
			<input type="text" name="login" value="<?php echo $_POST["login"]?>">
		</div>
		<div>
			<input type="password" name="senha">
		</div>
		<div>
			<input type="submit" name="ok">
		</div>
		
	</form>
	<?php
		//var_dump($_POST);
		//var_dump($_SESSION);
	?>
</body>
</html>