<?php

class bd{
	//host
	private $host = '127.0.0.1';

    //usuario
	private $usuario = 'progWeb';

    //senha
	private $senha = '123456';

	//banco de dados
	private $bd = 'fimdeslide';

	private $conn = NULL;

	public function conecta_mysql(){
    //cria conexao

		$this->conn = mysqli_connect($this->host, $this->usuario, $this->senha, $this->bd);

	    //ajusta charset de comunicação entre aplicação e bd
	    mysqli_set_charset($this->conn, 'utf8');

	    //verificar se houve erro de conexão
	    if(mysqli_connect_errno()){
	    	echo 'Esta bosta não conectou,seu merda!:'.mysqli_connect_error();
	    }
	}	
	function __construct(){
	$this->conecta_mysql();
}

public function exec($query,$type,$param){
	$stmt=$this->conn->prepare($query);
	$stmt->bind_param($type,...$param);
	$stmt->execute();
	$result=$stmt->get_result();
	if(mysqli_connect_errno()){
		die('Invalid Query:'. mysqli_connect_error());
	}
	return $result;
}

public function desconecta_mysql(){
	mysqli_close($this->conn);
}

function _destruct(){
	$this->desconecta_mysql();
 }
}

?>