<?php 

	require_once 'Operations.php';

	class Actions extends Operations
	{
		protected $tabela;

		private $nome, $email, $senha, $data;

		public function setNome($valor){$this->nome = $valor;}
		public function setTabela($valor){$this->tabela = $valor;}
		public function setEmail($valor){$this->email = $valor;}
		public function setSenha($valor){$this->senha = $valor;}
		public function setData($valor){$this->data = $valor;}

		public function CreateUser()
		{
			$query = "INSERT INTO users (nome, email, senha, data) VALUES (:nome, :email, :senha, :data)";
			$op = DB::prepare($query);
			$op->bindParam(':nome', $this->nome, PDO::PARAM_STR);
			$op->bindParam(':email', $this->email, PDO::PARAM_STR);
			$op->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$op->bindParam(':data', $this->data);
			return $op->execute();
		}

		public function UpdateUser($valor) 
		{

		}

	}

 ?>