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
		$data = date("Y/m/d H:i:s");
		array_push($param, $data);
		$sql="INSERT INTO `usuario` (`nome`, `senha`, `id`, `tipo`, `status`, `ult_alt`, `alt_usuario_id`) VALUES (?, ?, NULL, 1, 1, ?, 0);";
		
		$result = $objBd->exec($sql, 'sss', $param);
		if($result == 1)
			{
				$_SESSION['tipoAlert'] = 'Cadastro feito com sucesso';
				header("location:../index.php");
			}
		else{
			$_SESSION['error'] = 1;
			$_SESSION['where'] = '\"Funcoes/login.php\"';
			$_SESSION['type'] = 'Erro ao cadastrar';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form method="GET" action="Funcoes/cadastrar.php"> 
        	<div class="login">
        		<h2 >Cadastrar</h2>
        		<div class="alter">Nome: <input type="text" name="login" >  </div>
    			<div class="alter">Senha: <input type="password" name="senha"><br></div>
    			<!--
    			<div>Tipo de usuário
    				<select name="TipoDeUsario">
    					<option value="1" >Usuário normal</option>
    					<option value="2">Redator</option>
    					<option value="3">Adm</option>
    					<option value="4">Adm geral</option>
    				</select>
    			</div>
    			-->
				<div><button type="submit">Cadastrar</button></div>
        	</div>
	</form>
</body>
</html>
