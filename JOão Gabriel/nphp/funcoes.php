<?php
session_start();
function valida(){
	if(! isset($_SESSION["Nome_Nigga"]) || (!isset($_SESSION["Senha_Nigga"]))){
		header("location:index.php");
	}
}

function logout(){
	$_SESSION["Nome_Nigga"]=NULL;
	$_SESSION["Senha_Nigga"]=NULL;
	header("location:index.php");
}
?>