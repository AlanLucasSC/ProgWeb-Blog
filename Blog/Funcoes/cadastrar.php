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
		array_push($param, $_GET['TipoDeUsario']);
		$sql="INSERT INTO `usuario` (`nome`, `senha`, `id`, `tipo`) VALUES (?, ?, NULL, ?);";
		
		$result = $objBd->exec($sql, 'sss', $param);
		if($result == 1)
			header("location:index.php");
		else{
			?>
				<script type="text/javascript">
					alert("Erro ao logar");
				</script>
			<?php
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form method="GET" action="cadastrar.php"> 
        	<div class="login">
        		<h2 >Cadastrar</h2>
        		<div style="margin-bottom: 2px;">Nome: <input type="text" name="login" >  </div>
    			<div style="margin-bottom: 2px;">Senha: <input type="password" name="senha"><br></div>
    			<div>Tipo de usuário
    				<select name="TipoDeUsario">
    					<option value="1" >Usuário normal</option>
    					<option value="2">Redator</option>
    					<option value="3">Adm</option>
    					<option value="4">Adm geral</option>
    				</select>
    			</div>
				<div><button type="submit">Cadastrar</button></div>
        	</div>
	</form>
</body>
</html>