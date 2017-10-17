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
					        $path = "'ShowPost.php'";
					        echo '<div style="width: 60%; margin: 0 0 10px 10%;">';
					    			echo '<div style="width: 100%;"> <p ><h4 style="display: inline;">Criação: </h4> '.$row['creation_time']."</div> ";
					    			echo '<div style="width: 90%;"> <h3 style="margin-bottom: 1px;">'.$row['Titulo']."</h3></div> ";;
					    			echo '<div class="desc" style="width: 90%;"> '.$row['Descricao']."</div> ";
					    			echo '<div class="desc" style="width: 90%;"><textarea name="teste" required>'.$row['post']."</textarea></div> ";
					    			echo '<div class="desc" style="width: 90%; margin-left: 70%;" > <a class="publicacao" href="#" onclick="abrirPag('.$path.');">Ler Publicação</a> Por: '.$row['nome']."</div> ";
					    			echo "<hr>";
					    	echo "</div>";
					    	echo "<br>";
					    }

					} catch (PDOException $e) {
					    print "Error!: " . $e->getMessage() . "<br/>";
					    die();
					}
				?>