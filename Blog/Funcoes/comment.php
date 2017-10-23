<?php 

	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	if(isset($_GET['comment']) and isset($_GET['usuario_id']) and isset($_GET['post_id'])){
		$objBd = new bd();
		echo "batata";

		$conn=$objBd->conecta_mysql();
		$param = array();
		array_push($param, $_GET['comment']);
		array_push($param, $_GET['usuario_id']);
		array_push($param, $_GET['post_id']);
		$sql="INSERT INTO `comentario` (`comentario`, `usuario_id`, `post_id`, `id`, `status`) VALUES (?, ?, ?, NULL, 1);";
		
		$result = $objBd->exec($sql, 'sss', $param);

		if($result == 1)
			{
				$_SESSION['tipoAlert'] = 'Comentado com sucesso';
				header("location:../index.php");
			}
		else
		{
			$_SESSION['error'] = 1;
			$_SESSION['where'] = '\"Funcoes/login.php\"';
			$_SESSION['type'] = 'Erro ao comentado';
		}
	}
?>