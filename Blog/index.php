<?php

	session_start();
	require_once('Funcoes/funcoes.php');
	if(valida() == 0)
	{
		$i = 0;
	}
	else
	{
		$i = 1;
		$tipo = $_SESSION["tipo"];
	}
	$_SESSION["QntPosr"] = 0;

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Blog</title>
	<link type="text/css" rel="stylesheet" media="screen" href="Funcoes/estilos.css" />
	<script language="javascript" src="Ajax/ajax.js"></script>
	<script language="javascript" src="Ajax/instrucao.js"></script>
	<script>

		function loadDoc() 
		{
  			$("#conteudo").load("Funcoes/login.php");
		}
		function direcionar() {
		    var x = document.getElementById("mySelect").value;
		    document.getElementById("conteudo").innerHTML = "You selected: " + x;
		}
	</script>
	
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
					if ($tipo == 2)
					{
			?>
						<a class="p" href="#" onclick="abrirPag('Funcoes/post.php');">Post</a>
			<?php
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
			<script type="text/javascript">
					abrirPag('Funcoes/posts.php');
			</script>
			<div id="conteudo_mostrar">
				
				
			</div>
			<a class="p" href="#" onclick="abrirPag('Funcoes/posts.php');">Proxima Página</a>
		</div>
	</div>
<div id="Alert">
	
</div>
</body>
</html>