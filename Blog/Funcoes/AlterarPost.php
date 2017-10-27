<?php 
	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	if(isset($_GET['post'])){
		$objBd = new bd();
		$conn=$objBd->conecta_mysql();
		$param = array();
		$data = date("Y/m/d H:i:s");
		$_GET['post'] = strip_tags($_GET['post']);
		array_push($param, $_GET['post']);
		array_push($param, $data);
		array_push($param, $_GET['titulo']);
		array_push($param, $_GET['descr']);
		array_push($param, $_SESSION["id"]);
		array_push($param, $_GET['id']);
		$sql="UPDATE post SET post=?, creation_time=?, Titulo=?, Descricao=?, `ult_usuario_id` = ? where id=?;";
		$result = $objBd->exec($sql, 'ssssss', $param);
		?>
				<script type="text/javascript">
					alert($result);
				</script>
		<?php
		if($result == 1)
			{
				$_SESSION['tipoAlert'] = 'Post alterado com sucesso';
				header("location:../index.php");
			}
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
	<title>post</title>
</head>
<body>
	<form method="GET" action="Funcoes/AlterarPost.php"> 
        	<div class="alterarPost">
        		<h2 >Alterar Publicação</h2>
        		<div>Título:  <textarea name="titulo" rows="1" cols="93"></textarea> </div>
        		<div>Descrição: <textarea name="descr" rows="1" cols="90"></textarea> </div>
        		<div>Publicação:</div>
        		<div> <textarea name="post" rows="20" cols="100"></textarea> </div>
				<div><button type="submit">Publicar</button></div>
				<div hidden="hidden"> <input type="post" name="id" value='<?php echo $_GET["id"]?>'>  </div>
        	</div>
	</form> 
</body>
</html>
