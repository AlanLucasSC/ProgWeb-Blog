<?php
	session_start();
	require_once('Funcoes/funcoes.php');
	$qnt = QntPost();
	//echo "<script type=\"text/javascript\"> alert(\"{$qnt}\");</script>";
	if(valida() == 0)
	{
		$i = 0;
	}
	else
	{
		$i = 1;
		$tipo = $_SESSION["tipo"];
	}
	if (isset($_SESSION['tipoAlert'])) {
		if (strcmp($_SESSION['tipoAlert'],"no") != 0) {
			echo "<script type=\"text/javascript\"> alert(\"{$_SESSION['tipoAlert']}\");</script>";
			$_SESSION['tipoAlert'] = 'no';
		}
	}
	$_SESSION["QntPosr"] = 0;
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="pragma" content="no-cache">
	<meta charset="utf-8">
	<title>Blog</title>
	<link type="text/css" rel="stylesheet" media="screen" href="Funcoes/estilos.css" />
	<script language="javascript" src="Ajax/ajax.js"></script>
	<script language="javascript" src="Ajax/instrucao.js"></script>
	<script language="javascript" src="js/funcoes.js"></script>
	
</head>
<body>
	<div>

		<div id="menuHorizontal">
			<div>
				<h1 id="Titulo">Blog</h1>
			</div>
		</div>
		<div id="menuOpcoes" >
			<a class="p" href="index.php">Início</a>
			<?php
				if ($i == 0) {

			?>
					<a class="p" href="#" id="login" onclick="abrirPag('Funcoes/login.php');">Login</a>
					<a class="p" href="#" id="cadastrar" onclick="abrirPag('Funcoes/cadastrar.php');">Cadastrar</a>
					<!-- <a class="p" href="index.php" hidden="hidden">Sair</a> -->
			<?php
				}
				elseif ($i == 1)
				{
					if ($tipo >= 2)
					{
			?>
						<a class="p" href="#" onclick="abrirPag('Funcoes/post.php');">Post</a>
						<a class="p" href="#" onclick="abrirPag('Funcoes/ShowMyPosts.php');">Gerenciar Posts</a>
			<?php
						if ($tipo >= 3) 
						{
			?>

			<?php
							if($tipo == 4) 
							{
			?>
								<a class="p" href="#" onclick="abrirPag('Funcoes/ShowUser.php');">Usuários</a>
			<?php
							}
						}
					}
			?>
					<select id="mySelect" class="p" onchange="direcionar()" hidden="hidden">
						<option value="Funcoes/alter.php">Alterar</option>
						<option value="Excluir"></option>
					</select>
					<a class="p" href="#" onclick="abrirPag('Funcoes/alter.php');">Alterar Conta</a>
					<a class="p" href="Funcoes/delete.php">Excluir Conta</a>
					<a class="p" href="Funcoes/sair.php">Sair</a>
			<?php
				}
			?>
		</div>
		<div id="menuLateral" hidden="hidden">
			<div>
				<h3 id="TituloLateral">Menu Lateral</h3>
			</div>
		</div>
		<div id="conteudo">

			<?php
				if (isset($_SESSION['error'])) {
					if ($_SESSION['error'] == 1) {
						echo "<script type=\"text/javascript\"> alert(\"{$_SESSION['type']}\");</script>";
						?>
							<script type="text/javascript">
								abrirPag(	<?php echo $_SESSION['where'];?>	);
							</script>
						<?php
						$_SESSION['error'] = 0;
					}
					else {
						?>
							<script type="text/javascript">
								abrirPag('Funcoes/posts.php');
								//abrirPag('Funcoes/comment.php');
							</script>
						<?php
					}
				}
				else {
					?>
						<script type="text/javascript">
							abrirPag('Funcoes/posts.php');
							//abrirPag('Funcoes/comment.php');
						</script>
					<?php
				}
			?>

			<div id="conteudo_mostrar">	
			</div>
		</div>
	</div>
<div id="Alert">
	
</div>
</body>
</html>