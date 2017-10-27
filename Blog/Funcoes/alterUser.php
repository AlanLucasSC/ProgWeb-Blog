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
		array_push($param, $_GET['tipo']);
		$data = date("Y/m/d H:i:s");
		array_push($param, $data);
		array_push($param, $_SESSION["id"]);
		array_push($param, $_GET['id']);
		//var_dump($_GET);
		//die();
		$sql="UPDATE `usuario` SET `nome`= ?,`senha`= ?, `tipo` = ?, `ult_alt` = ?, `alt_usuario_id` = ? WHERE id = ?;";
		$result = $objBd->exec($sql, 'ssssss', $param);
		?>
			<script type="text/javascript">
				alert("Alterado com sucesso");
			</script>
		<?php
		$_SESSION["nome"]=$_GET['login'];
		$_SESSION["senha"]=$_GET['senha'];
		$_SESSION["id"]=$_GET['id'];
		$_SESSION["i"] = 1;

		$_SESSION['error'] = 1;
		$_SESSION['where'] = '"Funcoes/ShowUser.php"';
		$_SESSION['type'] = 'Alterado com sucesso';
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
<link type="text/css" rel="stylesheet" media="screen" href="Funcoes/estilos.css" />
</head>
<body >

	<form method="GET" action="Funcoes/alterUser.php">
        	<div class="login">
        		<h2 >Alterar</h2>
        		<div class="alter">Novo Nome: <input type="text" name="login">  </div>
    			<div class="alter">Nova Senha: <input type="password" name="senha"><br></div>
    			<div class="choice">
    				<select class="p" name="tipo">
						<option value="1">Usuario</option>
						<option value="2">Redator</option>
						<option value="3">Administrador</option>
						<option value="4">Master</option>
					</select>
    			</div>
    			<div><input type="text" name="id" value='<?php echo $_GET["id"]?>' hidden="hidden"></div>
				<div><button type="submit">Alterar</button></div>
        	</div>
	</form>
</body>
</html>
