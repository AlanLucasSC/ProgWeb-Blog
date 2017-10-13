<link type="text/css" rel="stylesheet" media="screen" href="estilos.css" />
<?php
try {
	$user = 'root';
	$pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);
    foreach($dbh->query('SELECT post.post, post.creation_time, usuario.nome, post.Titulo
						 FROM usuario
						 INNER JOIN post
						 ON usuario.id = post.usuario_id
						 ORDER BY post.creation_time DESC
						 LIMIT 10 OFFSET 0;'
			) as $row) {
        //print_r($row);
        echo '<div style="border: 1px solid rgb(220,220,220); width: 60%;">';
    			echo '<div style="width: 100%;"> <p style="display: inline;"><h4 style="display: inline;">Criado por:</h4> '.$row['nome'].'<h4 style="display: inline;">,  no dia e na hora</h4>: '.$row['creation_time']."</p ></div> ";
    			echo '<div style="width: 90%;"> <h3 style="padding-bottom: 0px;">'.$row['Titulo']."</h3></div> ";;
    			echo '<div style="width: 90%;"> '.$row['post']."</div> ";
    	echo "</div>";
    	echo "<br>";
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>