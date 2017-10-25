<link type="text/css" rel="stylesheet" media="screen" href="Funcoes/estilos.css"/>
<script language="javascript" src="Ajax/ajax.js"></script>
<script language="javascript" src="Ajax/instrucao.js"></script>
<script language="javascript" src="js/funcoes.js"></script>
<?php

echo "<div id=\"LeftContent\">";
			?>
            	<table>
					<thead>
						<tr>
							<th>Nome</th><th>Delete</th><th>Status</th><th>Ativar</th><th>Alter</th><th>Tipo</th>
						</tr>
					</thead>
					<tbody id="ResultsTableContent">
            <?php
        try {
            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            echo "<br>";
            foreach($dbh->query('SELECT * FROM usuario ORDER BY nome asc;') as $row) 
            {
                $path = "Funcoes/alterUser.php?id={$row['id']}";
                $path = "'".$path."'";
            	echo "<tr>";
            	echo "<td>".$row['nome']."</td>";
                if ($row['status'] == 1) {
                    echo "<td>"."<a class=\"p\" href=\"Funcoes/deleteUser.php?id=".$row['id']."\">Excluir</a>"."</td>";
                    echo "<td>"."Ativado"."</td>";
                    echo "<td>"."Já ativado"."</td>";
                }
                else
                {
                    echo "<td>"."Desativado"."</td>";
                    echo "<td>"."Desativado"."</td>";
                    echo "<td>"."<a class=\"p\" href=\"Funcoes/active.php?id=".$row['id']."\">Ativar</a>"."</td>";
                }
                echo "<td>"."<a class=\"p\" href=\"#\" onclick=\"abrirPag({$path});\">Alterar</a>"."</td>";
                echo "<td>".$row['tipo']."</td>";
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