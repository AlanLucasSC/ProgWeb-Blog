<?php 
	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	if(isset($_GET['login']) and isset($_GET['senha'])){
		$objBd = new bd();
		$conn=$objBd->conecta_mysql();
		$param = array();
		array_push($param, $_GET['login']);
		array_push($param, $_GET['senha']);
		array_push($param, $_GET['id']);
		array_push($param, $_GET['id']);
		$sql="UPDATE `usuario` SET `nome`= ?,`senha`= ?,`id`= ? WHERE id = ?;";
		$result = $objBd->exec($sql, 'ssss', $param);
		?>
			<script type="text/javascript">
				alert("Alterado com sucesso");
			</script>
		<?php
		$_SESSION["nome"]=$_GET['login'];
		$_SESSION["senha"]=$_GET['senha'];
		$_SESSION["id"]=$_GET['id'];
		$_SESSION["i"] = 1;
		$_SESSION['tipoAlert'] = 'Alterado com sucesso';
		header("location:../index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
		function alerta()
		{
			alert("Alterado com sucesso");
		}
</script>
<link type="text/css" rel="stylesheet" media="screen" href="estilos.css" />
</head>
<body >

	<form method="GET" action="Funcoes/alter.php">
        	<div class="login">
        		<h2 >Alterar</h2>
        		<div style="margin-bottom: 2px;">Novo Nome: <input type="text" name="login" value='<?php echo $_SESSION["nome"]?>'>  </div>
    			<div style="margin-bottom: 2px;">Nova Senha: <input type="password" name="senha"><br></div>
    			<div><input type="text" name="id" value='<?php echo $_SESSION["id"]?>' hidden="hidden"></div>
				<div><button type="submit">Alterar</button></div>
        	</div>
	</form>
</body>
</html>