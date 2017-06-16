<?php 

	/* CLASSE RESPONSÁVEL PELA CONEXÃO COM O BANCO DE DADOS */
	class DB
	{
		private static $conexao;

		public static function getConexao()
		{
			if(!isset(self::$conexao))
			{
				try
				{
				 	self::$conexao = new PDO('mysql:host=localhost;dbname=rede-social', 'root', '');
				 	self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::
				 		ERRMODE_EXCEPTION);
				 	self::$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

				}
				catch(PDOException $e)
				{
					$e->getMessage();
				}
			}

			return self::$conexao;				
		}
		
		/* Método de statement */
		public static function prepare($sql)
		{
			return self::getConexao()->prepare($sql);
		}
	}
 ?>