<?php 

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
		input[type="email"] {
			border: 0.8px solid #ccc;
			width: 250px;
			height: 25px;
			padding-left: 10px;
			border-radius: 3px;
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
	</style>
</head>
<body>
	<img src="img/logo.png" alt="Logotipo - Social Friends">
	<h2>Entre com sua conta</h2>
	<form action="">
		<input type="email" placeholder="Email">
		<input type="password" placeholder="Senha">
		<input type="submit" value="Logar">
	</form>
</body>
</html>