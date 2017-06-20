<?php 

	require_once 'Operations.php';

	class Actions extends Operations
	{
		protected $tabela;

		/************** VARIÁVEIS E PROPRIEDADES DA CONTA **************/
		private $nome, $email, $senha, $data;

		public function setNome($valor){$this->nome = $valor;}
		public function setTabela($valor){$this->tabela = $valor;}
		public function setEmail($valor){$this->email = $valor;}
		public function setSenha($valor){$this->senha = $valor;}
		public function setData($valor){$this->data = $valor;}
		/****************************************************************/
		/************ VARIÁVEIS E PROPRIEDADES DA PUBLICAÇÃO ************/
		private $user, $texto, $imagem;

		public function setUser($valor){$this->user = $valor;}
		public function setTexto($valor){$this->texto = $valor;}
		public function setImagem($valor){$this->imagem = $valor;}
		/****************************************************************/
		/****************** MÉTODO DE CRIAÇÃO DE CONTA ******************/
		public function CreateUser()
		{
			$query = "INSERT INTO users (nome, email, senha, data) VALUES (:nome, :email, :senha, :data)";
			$comando = DB::prepare($query);
			$comando->bindParam(':nome', $this->nome, PDO::PARAM_STR);
			$comando->bindParam(':email', $this->email, PDO::PARAM_STR);
			$comando->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$comando->bindParam(':data', $this->data);

			return $comando->execute();
		}
		/****************************************************************/
		/**************** MÉTODO DE ATUALIZAÇÃO DE CONTA ****************/
		public function UpdateUser($valor) 
		{

		}
		/****************************************************************/
		/****************** MÉTODO DE CRIAÇÃO DE PUBSS ******************/
		public function CreatePub($tipo)
		{
			switch ($tipo) {
				case 'comfoto':
					$query = "INSERT INTO $this->tabela (user, texto, imagem, data) VALUES (:user, :texto, :imagem, :data)";
					$comando = DB::prepare($query);
					$comando->bindParam(':user', $this->user);
					$comando->bindParam(':texto', $this->texto, PDO::PARAM_STR);
					$comando->bindParam(':imagem', $this->imagem);
					$comando->bindParam(':data', $this->data);

					return $comando->execute();
					break;
				
				case 'semfoto':
					$query = "INSERT INTO $this->tabela (user, texto, data) VALUES (:user, :texto, :data)";
					$comando = DB::prepare($query);
					$comando->bindParam(':user', $this->user);
					$comando->bindParam(':texto', $this->texto, PDO::PARAM_STR);
					$comando->bindParam(':data', $this->data);

					return $comando->execute();
					break;
			}
		}

	}

 ?>