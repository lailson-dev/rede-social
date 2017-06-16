<?php 
	require_once 'DB.php';

	abstract class Operations extends DB
	{
		protected $tabela;

		abstract public function CreateUser();
		abstract public function UpdateUser($id);

		public function Login($email, $senha) 
		{
			$query = "SELECT * FROM $this->tabela WHERE email = :email AND senha = :senha";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->bindParam(':senha', $senha, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetch();
		}

		public function Check($email)
		{
			$query = "SELECT email FROM $this->tabela WHERE email = :email";
			$resultado = DB::prepare($query);
			$resultado->bindParam(':email', $email, PDO::PARAM_STR);
			$resultado->execute();

			return $resultado->fetch();
		}
	}
 ?>