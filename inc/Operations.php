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
		public function Pubs()
		{
			$query = "SELECT * FROM pubs ORDER BY id_pub desc";
			$resultado = DB::prepare($query);
			$resultado->execute();

			return $resultado->fetchAll();
		}

		public function CheckAll($email)
		{
			$query = "SELECT * FROM users WHERE email = :email";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetchAll();
		}
	}
 ?>