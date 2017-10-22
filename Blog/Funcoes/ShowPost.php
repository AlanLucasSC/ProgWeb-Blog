<link type="text/css" rel="stylesheet" media="screen" href="funcoes/estilos.css" />
<script language="javascript" src="Ajax/ajax.js"></script>
<script language="javascript" src="Ajax/instrucao.js"></script>
<?php
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
					    	echo "<div class=\"btnComentario\">";
					    		echo "<br><a class=\"p\" href=\"#\" id=\"display\" onclick=\"myFunction();\">Comentar</a>";
					    	echo "</div>";
					    	echo "<div id=\"NovoComentario\"   >";
					    		echo "BATATA";
					    	echo "</div>";
					    	echo "<br >";
					    }

					} catch (PDOException $e) {
					    print "Error!: " . $e->getMessage() . "<br/>";
					    die();
					}
				?>