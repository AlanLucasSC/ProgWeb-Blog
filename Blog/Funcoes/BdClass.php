<?php

class bd{

	//host
	private $host='127.0.0.1';
	
	//usuario
	private $usuario='root';

	//senha
	private $senha= '';

	//banco
	private $bd = 'blog';

	private $conn=NULL;

	public function conecta_mysql(){

		//cria conexão;
		$this->conn = mysqli_connect($this->host, $this->usuario, $this->senha, $this->bd);

		//ajuda charset de comunicação entre aplicação e bd
		mysqli_set_charset($this->conn, 'utf8');
			
		//verificar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: ' .mysqli_connect_error();
		}

		//return $this->conn;
	}

	function __construct(){
		$this->conecta_mysql();
	}

	public function exec($query, $type, $param){
		//echo $param['nome'];
		//echo $param['senha'];
		//echo $type;
		//echo $query;
        $stmt=$this->conn->prepare($query);
		$stmt->bind_param($type, ...$param);
		//echo "string";
		$stmt->execute();
		if($stmt->field_count>0)
			$result = $stmt->get_result();
		else
			$result=TRUE;
		if ($this->conn->errno) {
			die('Invalid query: '.$this->conn->error());
		}
		return $result;
	}
}
?>

