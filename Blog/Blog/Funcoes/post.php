<?php 
	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	if(isset($_GET['post'])){
		$objBd = new bd();
		$conn=$objBd->conecta_mysql();
		$param = array();
		$data = date("Y/m/d H:i:s");
		array_push($param, $_GET['id']);
		array_push($param, "<p>".$_GET['post']."</p>");
		array_push($param, $data);
		array_push($param, $_GET['titulo']);
		array_push($param, $_GET['descr']);
		$sql="INSERT INTO `post` (`usuario_id`, `post`, `creation_time`, `Titulo`, `id`, `Descricao`) VALUES (?, ?, ?, ?, NULL, ?);";
		$result = $objBd->exec($sql, 'sssss', $param);
		?>
				<script type="text/javascript">
					alert($result);
				</script>
		<?php
		if($result == 1)
			header("location:../index.php");
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
	<form method="GET" action="Funcoes/post.php"> 
        	<div style="    margin-left: 25%; margin-top: 10%;">
        		<h2 >Nova Publicação</h2>
        		<div>Título:  <textarea name="titulo" rows="1" cols="93"></textarea> </div>
        		<div>Descrição: <textarea name="descr" rows="1" cols="90"></textarea> </div>
        		<div>Publicação:</div>
        		<div> <textarea name="post" rows="20" cols="100"></textarea> </div>
				<div><button type="submit">Publicar</button></div>
				<div hidden="hidden"> <input type="post" name="id" value='<?php echo $_SESSION["id"]?>'>  </div>
        	</div>
	</form> 
</body>
</html>