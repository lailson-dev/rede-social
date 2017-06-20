<?php 
	require_once 'pages/header.php';
 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">
 	<title>Rede Social - Desenvolvida afins de estudo</title>

 	<style>
 		#publish{width: 400px; height: 220px; display: block; margin: auto; border: none; border-radius: 5px; background: #fff; box-shadow: 0 0 3px #A1A1A1; margin-top: 30px;}
 		#publish textarea{width: 365px; height: 150px; display: block; margin: auto; border-radius: 5px; padding: 5px 0 0 5px; border-width: 1px; border-color: #A1A1A1;}
 		#publish img{margin: 0 0 0 10px; width: 40px; cursor: pointer;}
 		#publish input[type="submit"]{width: 70px; height: 25px; border-radius: 3px; float: right; margin: 5px 15px 0 0; border: none; background: #4169E1; color: #fff; cursor: pointer;}
 		#publish input[type="submit"]:hover{background: #001F3F;}
 	</style>
 </head>
 <body>
 	<div id="publish">
 		<form action="" method="POST" enctype="multipart/form-data">
 			<br/>
 			<textarea placeholder="O que vocês tá pensando?" name="texto"></textarea>
 			<label for="file-input">
 				<img src="img/imagegrey.png" alt="Inserir uma imagem" title="Inserir uma imagem">
 			</label>
 			<input type="submit" value="Publicar" name="publish">
 			<input type="file" id="file-input" name="file" hidden>
 		</form>
 	</div>
 </body>
 </html>