<link type="text/css" rel="stylesheet" media="screen" href="funcoes/estilos.css" />
<script language="javascript" src="Ajax/ajax.js"></script>
<script language="javascript" src="Ajax/instrucao.js"></script>
<?php
	session_start();  
	require_once('funcoes.php');

	$_SESSION['post_id'] = $_GET['id'];
	//echo "{$_SESSION['post_id']}";
	echo "<br><br>";
					try {
						$user = 'root';
						$pass = '';
					    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
					    $path = 'SELECT post.post, post.creation_time, usuario.nome, post.Titulo, post.Descricao
											 FROM usuario
											 INNER JOIN post
											 ON usuario.id = post.usuario_id
											 WHERE post.id = '.$_GET['id'].';';
					    foreach($dbh->query($path) as $row) {
					        //print_r($row);
					        $path = "'ShowPost.php'";
					        echo '<div class="Centralizado" style="">';
					    			echo '<div > <p ><h4 class="hCriacao" >Criação: </h4> '.$row['creation_time']."</div> ";
					    			echo '<div > <h3 class="tituloh3">Titulo: '.$row['Titulo']."</h3></div> ";
					    			echo '<div > <h4 class="hDesc">'.$row['Descricao']."</h4></div> ";
					    			echo '<div> <p id="pPost">'.$row['post']."</p></div> ";
					    			echo '<div class="ShowName"> Por: '.$row['nome']."</div> ";
					    	echo "</div>";
					    	echo "<hr class=\"hrPost\">";
					    	echo "<div class=\"TituloComentarios\">";
					    		echo "<h3>Comentários</h3><br>";

					    	echo "</div>";
					    	if (valida() == 1) 
					    	{
						    	echo "<div class=\"btnComentario\">";
						    		echo "<br><a class=\"p\" href=\"#\" id=\"display\" onclick=\"myFunction();\">Novo Comentário</a>";
						    	echo "</div>";
						    	echo "<div id=\"NovoComentario\" class=\"NovoComentario\" >";
							    		?>
							    			<form method="GET" action="Funcoes/comment.php"> 
										        	<div >
										        		<div> <textarea name="comment" rows="4" cols="70"></textarea> </div>
										        		<br>
														<div> <button type="submit">Comentar</button>				   </div>
														<div hidden="hidden"> <input type="post" name="usuario_id" value='<?php echo $_SESSION['id'] ?>'> </input> 						   </div>
														<div hidden="hidden"> <input type="post" name="post_id" value='<?php echo $_GET['id']?>'></input>  									 </div>
										        	</div>
											</form>
							    		<?php
							    echo "</div>";
					    	}
					    	
					    	//echo "<script type=\"text/javascript\"> abrirPag('Funcoes/comment.php');</script>";
					    	echo "<br >";
					    }

					} catch (PDOException $e) {
					    print "Error!: " . $e->getMessage() . "<br/>";
					    die();
					}
					
						echo "<div class=\"Comentario\">";
					  	$path = 'SELECT comentario.comentario, usuario.nome, comentario.id, comentario.usuario_id
						 FROM comentario
						 INNER JOIN usuario ON comentario.usuario_id = usuario.id
						 WHERE comentario.status = 1 and comentario.post_id = '.$_GET['id'].'
						 ORDER BY comentario.id desc;';
						foreach($dbh->query($path) as $row)
						{
							echo '<div> <p id="pPost">'.$row['comentario']."</p></div> ";
					   		echo '<div class="ShowName"> Por: '.$row['nome']."</div> ";
					   		if (isset($_SESSION['tipo']) && isset($_SESSION['id'])) {
					   			if ($_SESSION["tipo"] >= 3 || $row['usuario_id'] == $_SESSION['id']) {
					   				echo "<div>	<a class=\"p\" href=\"Funcoes/deleteComment.php?id=".$row['id']."\">Excluir</a>	<div>";
					   			}
					   		}
					   		echo "<hr>";
						}
						echo "<br><br><br>";
					echo "</div>";
				?>