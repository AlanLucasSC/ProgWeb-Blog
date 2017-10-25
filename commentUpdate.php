<?php 

	session_start();
	$_SESSION["new"]="batata/Bd_Class";
	require_once('BdClass.php');
	if(isset($_GET['comment']) and isset($_GET['usuario_id']) and isset($_GET['post_id'] and isset($_GET['id']))){
		$objBd = new bd();
		echo "batata";

		$conn=$objBd->conecta_mysql();
		$param = array();
		array_push($param, $_GET['comment']);
		array_push($param, $_GET['id']);
		$sql="UPDATE comentario SET comentario=? where id=?;";
		
		$result = $objBd->exec($sql, 'ss', $param);

		if($result == 1)
			{
				$_SESSION['tipoAlert'] = 'Comentário Alterado com sucesso';
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
