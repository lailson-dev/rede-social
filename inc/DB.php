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

 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">
 	<title>Rede Social - Desenvolvida para fins de estudo</title>
 	<style>
 		html{
			-webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
		       -moz-animation: fadein 2s; /* Firefox < 16 */
		        -ms-animation: fadein 2s; /* Internet Explorer */
		         -o-animation: fadein 2s; /* Opera < 12.1 */
		            animation: fadein 2s;
		}

		@keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Firefox < 16 */
		@-moz-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Safari, Chrome and Opera > 12.1 */
		@-webkit-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Internet Explorer */
		@-ms-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Opera < 12.1 */
		@-o-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

 	</style>
 </head>
 <body>
 	
 </body>
 </html>