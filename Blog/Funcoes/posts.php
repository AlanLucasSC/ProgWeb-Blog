<link type="text/css" rel="stylesheet" media="screen" href="estilos.css" />
<script language="javascript" src="../Ajax/ajax.js"></script>
<script language="javascript" src="../Ajax/instrucao.js"></script>
<?php
    session_start();
    function posts()
    {
        echo "<div>";
        try {
            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            foreach($dbh->query('SELECT post.post, post.creation_time, usuario.nome, post.Titulo, post.Descricao, post.id as post_id
                                FROM usuario
                                INNER JOIN post
                                ON usuario.id = post.usuario_id
                                ORDER BY post.creation_time DESC;'
                                ) as $row) 
            {
                            //print_r($row);
                $path = "Funcoes/ShowPost.php";
                $path = $path."?id=".$row['post_id'];
                $path = "'{$path}'";
                echo '<div style="width: 55%; margin: 0 0 10px 10%;">';
                echo '<div style="width: 90%;"> <p ><h4 style="display: inline;">Criação: </h4> '.$row['creation_time']."</div> ";
                echo '<div style="width: 90%;"> <h3 style="margin-bottom: 1px;">'.$row['Titulo']."</h3></div> ";;
                echo '<div class="desc" style="width: 90%;"> '.$row['Descricao']."</div> ";
                echo '<div class="desc" style="width: 90%; margin-left: 70%;" > <a class="publicacao" href="#" onclick="abrirPag('.$path.');">Ler Publicação</a> Por: '.$row['nome']."</div> ";
                echo "<hr>";
                echo "</div>";
                echo "<br>";
            }

            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        echo "</div>";
    }

    echo "<br><br>";
    posts();
    echo "<div class = 'conteudo".$_SESSION["QntPosr"]."'>";
    echo "</div>";
?>