<?php
echo "<br><br>";
					try {
						$user = 'root';
						$pass = '';
					    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
					    foreach($dbh->query('SELECT post.post, post.creation_time, usuario.nome, post.Titulo, post.Descricao
											 FROM usuario
											 INNER JOIN post
											 ON usuario.id = post.usuario_id
											 ORDER BY post.creation_time DESC
											 LIMIT 10 OFFSET 0;'
								) as $row) {
					        //print_r($row);
					        $path = "'ShowPost.php'";
					        echo '<div style="margin: auto; width: 50%;">';
					    			echo '<div > <p ><h4 style="display: inline;" >Criação: </h4> '.$row['creation_time']."</div> ";
					    			echo '<div > <h3 style="margin-bottom: 0px;">Titulo: '.$row['Titulo']."</h3></div> ";;
					    			echo '<div > <h4 style="margin-top: 0px; color: black">'.$row['Descricao']."</h4></div> ";
					    			echo '<div> <p style="white-space: pre-line;">'.$row['post']."</p></div> ";
					    			echo '<div class="desc" style=" margin-left: 45%; text-align: left;" > Por: '.$row['nome']."</div> ";
					    			
					    	echo "</div>";
					    	echo "<hr style=' margin-left: 10%; margin-right: 10%;'>";
					    	echo "<br >";
					    }

					} catch (PDOException $e) {
					    print "Error!: " . $e->getMessage() . "<br/>";
					    die();
					}
				?>