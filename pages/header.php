<?php 
	require_once 'inc/Actions.php';
	
	$login_cookie = $_COOKIE['login'];
	if(!isset($login_cookie)) {
		header("Location: login.php");
	}

 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">
 	<title>Rede Social - Desenvolvida afins de estudo</title>
 	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 	<style>
 		*{font-family: 'Montserrat', cursive; margin: 0;}
 		body{background: #f6f6f6;}
 		#topo{width: 100%; top: 0; background: #fff; box-shadow: 0 0 10px #000; height: 80px;}
 		#topo img[name="logo"]{float: left; margin-left: 20px; margin-top: -10px;}
 		#topo img[name="menu"]{float: right; margin-right: 25px; margin-top: -22px;}
 		#topo input[type="text"]{display: block; margin: auto; width: 300px; border: none; border-radius: 3px; background: #f6f6f6; height: 25px; padding-left: 10px; box-shadow: inset  0 0 3px #000;}
 		#topo form{padding-top: 20px; width: 300px; display: block; margin: auto;}
 	</style>
 </head>
 <body>
 	<div id="topo">
 		<a href="#"><img src="img/logo.png" alt="Logotipo" width="100" name="logo"></a>
 		<form action="" method="GET">
 			<input type="text" placeholder="Pesquise alguém..." name="query" autocomplete="off">
 			<input type="submit" hidden>
 		</form>
 		<a href="#"><img src="img/chat.png" alt="Chat" width="30" name="menu"></a>
 		<a href="#"><img src="img/perfil.png" alt="Imagem de Perfil" width="30" name="menu"></a>
 	</div>
 	
 </body>
 </html>