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
?>