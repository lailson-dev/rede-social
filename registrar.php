<?php 
	include_once("inc/Actions.php");

	$acoes = new Actions();

	if(isset($_POST['criar'])) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$data = date("Y/m/d");
		$acoes->setTabela('users');
		$verifica = $acoes->Check($email);

		if($verifica != '')
		{
			echo "<h5>Este endereço de e-mail já está registrado.</h5>";
		}
		elseif($nome == '' OR strlen($nome) < 5)
		{
			echo "<h5>Escreva seu nome corretamente.</h5>";
		}
		elseif($senha == '' OR strlen($senha) < 6)
		{
			echo "<h5>A senha deve conter no mínimo 6 caracteres.</h5>";
		}
		else
		{
			$acoes->setNome($nome);
			$acoes->setEmail($email);
			$acoes->setSenha($senha);
			$acoes->setData($data);
			if($acoes->CreateUser()) 
			{
				echo '<h5>Conta criada com sucesso. Faça o <a href="login.php">login</a> aqui.</h5>';
			}
			else
			{
				echo "<h5>Ocorreu um erro ao tentar criar seu cadastro. Tente novamente.</h5>";
			}
		}
	}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Rede Social - Desenvolvida afins de estudo</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style>
		* {
			font-family: Montserrat, sans-serif;
		}
		img {
			display: block;
			margin: auto;
			margin-top: 20px;
			width: 200px;
		}
		form {
			text-align: center;
			display: block;
			width: 300px;
			margin: 0 auto;
		}
		input[type="text"] {
			border: 0.8px solid #ccc;
			width: 250px;
			height: 25px;
			padding-left: 10px;
			border-radius: 3px;
			margin-top: 10px;
		}
		input[type="email"] {
			border: 0.8px solid #ccc;
			width: 250px;
			height: 25px;
			padding-left: 10px;
			border-radius: 3px;
			margin-top: 10px;
		}
		input[type="password"] {
			border: 0.5px solid #ccc;
			width: 250px;
			height: 30px;
			padding-left: 10px;
			margin-top: 10px;
			border-radius: 3px;
		}
		input[type="submit"] {
			border: none;
			width: 80px;
			height: 25px;
			margin-top: 20px;
			border-radius: 3px;
		}
		input[type="submit"]:hover {
			background-color: #1e90ff;
			cursor: pointer;
		}
		h2 {
			text-align: center;
			margin-top: 20px;
		}
		h4 {
			text-align: center;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<img src="img/logo.png" alt="Logotipo - Social Friends">
	<h2>Criar uma conta</h2>
	<form method="POST" action="">
		<input type="text" placeholder="Nome" id="nome" name="nome">
		<input type="email" placeholder="Email" id="email" name="email">
		<input type="password" placeholder="Senha" id="senha" name="senha">
		<input type="submit" value="Criar" id="criar" name="criar">
	</form>
	<h4>Já tem conta? <a href="login.php">Entre aqui!</a></h4>
</body>
</html>