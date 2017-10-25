<link type="text/css" rel="stylesheet" media="screen" href="Funcoes/estilos.css"/>
<script language="javascript" src="Ajax/ajax.js"></script>
<script language="javascript" src="Ajax/instrucao.js"></script>
<script language="javascript" src="js/funcoes.js"></script>
<?php
session_start();
echo "<div id=\"LeftContent\">";
			?>
            	<table>
					<thead>
						<tr>
							<th>Post</th><th>Criador</th><th>Delete</th><th>Status</th><th>Ativar</th><th>Alter</th>
						</tr>
					</thead>
					<tbody id="ResultsTableContent">
            <?php
        try {
            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            echo "<br>";
            if ($_SESSION["tipo"] >= 3) {
                $path = "SELECT post.Titulo, post.id, usuario.nome, post.status
                        FROM post 
                        INNER JOIN usuario
                        ON post.usuario_id = usuario.id
                        ORDER BY creation_time DESC;";
            }
            else
            {
                $path = "SELECT * FROM post WHERE usuario_id = {$_SESSION['id']} ORDER BY creation_time DESC;";
            }

            foreach($dbh->query($path) as $row) 
            {
                $pathAlt = "Funcoes/AlterarPost.php?id={$row['id']}";
                $pathAlt = "'".$pathAlt."'";
            	echo "<tr>";
            	echo "<td>".$row['Titulo']."</td>";

                if ($_SESSION["tipo"] >= 3) {
                    echo "<td>".$row['nome']."</td>";
                }
                else
                {
                    echo "<td>".$_SESSION['nome']."</td>";
                }

                if ($row['status'] == 1) {
                    echo "<td>"."<a class=\"p\" href=\"Funcoes/deletePost.php?id=".$row['id']."\">Excluir</a>"."</td>";
                    echo "<td>"."Ativado"."</td>";
                    echo "<td>"."Já ativado"."</td>";
                }
                else
                {
                    echo "<td>"."Desativado"."</td>";
                    echo "<td>"."Desativado"."</td>";
                    echo "<td>"."<a class=\"p\" href=\"Funcoes/activePost.php?id=".$row['id']."\">Ativar</a>"."</td>";
                }
                echo "<td>"."<a class=\"p\" href=\"#\" onclick=\"abrirPag({$pathAlt});\">Alterar</a>"."</td>";
            	echo "</tr>";
            }

            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            ?>
					</tbody>
				</table>
            <?php
echo "</div>";
echo "<div id=\"RightContent\">";
echo "</div>";