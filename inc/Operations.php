<?php 
	require_once 'DB.php';

	abstract class Operations extends DB
	{
		protected $tabela;

		abstract public function CreateUser();
		abstract public function UpdateUser($id);

		/****************************************************************/
		/****************** AUTENTICAÇÃO DE LOGIN ******************/
		public function Login($email, $senha) 
		{
			$query = "SELECT * FROM $this->tabela WHERE email = :email AND senha = :senha";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->bindParam(':senha', $senha, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetch();
		}

		/****************************************************************/
		/****************** CHECAR SE O EMAIL JÁ ESTÁ CADASTRADO ******************/
		public function Check($email)
		{
			$query = "SELECT email FROM $this->tabela WHERE email = :email";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetch(PDO::FETCH_ASSOC);
		}		
		/****************************************************************/
		/****************** BUSCAR AS PUBLICAÇÕES ******************/
		public function Pubs($condition = null)
		{
			$query = "SELECT * FROM pubs $condition ORDER BY id_pub desc";
			$resultado = DB::prepare($query);
			$resultado->execute();

			return $resultado->fetchAll();
		}

		public function CheckForEmail($email)
		{
			$query = "SELECT * FROM users WHERE email = :email";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetchAll();
		}

		public function CheckForID($id)
		{
			$query = "SELECT * FROM users WHERE id = :id";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':id', $id, PDO::PARAM_INT);
			$resultado->execute();

			return $resultado->fetchAll(PDO::FETCH_ASSOC);
		}
		/****************************************************************/
		/************* AÇÃO PARA AMIGOS / ADICIONAR / REMOVER ************/
		public function CheckFriends($user, $email)
		{
			$query = "SELECT * FROM amizades WHERE de = :user AND para = :email OR para = :user AND de = :email";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':user', $user, PDO::PARAM_STR);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetchAll(PDO::FETCH_ASSOC);
		}

		public function AddFriends()
		{
			$query = "INSERT";
			$resultado = DB::prepare($query);
			$resultado->bindParam();
			return $resultado->execute();
		}
	}
 ?>