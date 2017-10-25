<?php
//session_start();
function valida(){
	if(! isset($_SESSION["nome"]) || (!isset($_SESSION["senha"]))){
		//header("location:index.php?id=0");
		return 0;
	}
	else
	{
		return 1;
	}
} 

function logout(){
	$_SESSION["nome"]=NULL;
	$_SESSION["id"]=NULL;
	$_SESSION["senha"]=NULL;
	header("location:index.php");
}

function QntPost()
{
	$path = "SELECT COUNT(post.id) as qnt FROM post ";
	$resultado = SelectMySQL($path);
	$linha = $resultado->fetch(PDO::FETCH_ASSOC);
	return $linha['qnt'];
}

function SelectMySQL($select)
{
	$user = 'root';
	$pass = '';
	$dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	return $dbh->query($select);
}
?>