<?php

	session_start();
	require_once('funcoes.php');
	if(valida() == 0)
	{
		$i = 0;
	}
	else
	{
		$i = 1;
		$tipo = $_SESSION["tipo"];
	}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Blog</title>
	<link type="text/css" rel="stylesheet" media="screen" href="estilos.css" />
	<script language="javascript" src="Ajax/ajax.js"></script>
	<script language="javascript" src="Ajax/instrucao.js"></script>
	<script>

		function loadDoc() 
		{
  			$("#conteudo").load("login.php");
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
					<a class="p" href="#" id="login" onclick="abrirPag('login.php');">Login</a>
					<a class="p" href="#" id="cadastrar" onclick="abrirPag('cadastrar.php');">Cadastrar</a>
					<!-- <a class="p" href="index.php" hidden="hidden">Sair</a> -->
			<?php
				}
				elseif ($i == 1)
				{
					if ($tipo == 2)
					{
			?>
						<a class="p" href="#" onclick="abrirPag('post.php');">Post</a>
			<?php
					}
			?>
					<select id="mySelect" class="p" onchange="direcionar()" hidden="hidden">
						<option value="alter.php">Alterar</option>
						<option value="Excluir"></option>
					</select>
					<a class="p" href="#" onclick="abrirPag('alter.php');">Alterar Conta</a>
					<a class="p" href="delete.php">Excluir Conta</a>
					<a class="p" href="sair.php">Sair</a>
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
			<!-- <button type="button" onclick="abrirPag('login.php');">Clique aqui, é um teste</button> -->
			<div id="conteudo_mostrar">
				<br>
				<br>
				<?php
					try {
						$user = 'root';
						$pass = '';
					    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);
					    foreach($dbh->query('SELECT post.post, post.creation_time, usuario.nome, post.Titulo, post.Descricao
											 FROM usuario
											 INNER JOIN post
											 ON usuario.id = post.usuario_id
											 ORDER BY post.creation_time DESC
											 LIMIT 10 OFFSET 0;'
								) as $row) {
					        //print_r($row);
					        echo '<div style="width: 60%; margin: 0 0 10px 10%;">';
					    			echo '<div style="width: 100%;"> <p ><h4 style="display: inline;">Criação: </h4> '.$row['creation_time']."</div> ";
					    			echo '<div style="width: 90%;"> <h3 style="margin-bottom: 1px;">'.$row['Titulo']."</h3></div> ";;
					    			echo '<div class="desc" style="width: 90%;"> '.$row['Descricao']."</div> ";
					    			echo '<div class="desc" style="width: 90%; margin-left: 70%;" >Por: '.$row['nome']."</div> ";
					    			echo "<hr>";
					    	echo "</div>";
					    	echo "<br>";
					    }

					} catch (PDOException $e) {
					    print "Error!: " . $e->getMessage() . "<br/>";
					    die();
					}
				?>

			</div>
		</div>
	</div>
</body>
</html>