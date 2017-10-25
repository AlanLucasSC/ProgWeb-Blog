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
		$data = date("Y/m/d H:i:s");
		array_push($param, $data);
		array_push($param, $_SESSION['id']);
		$sql="INSERT INTO `comentario` (`comentario`, `usuario_id`, `post_id`, `id`, `status`, `ult_alt`, `ult_usuario_id`) VALUES (?, ?, ?, NULL, 1, ?, ?);";
		
		$result = $objBd->exec($sql, 'sssss', $param);

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