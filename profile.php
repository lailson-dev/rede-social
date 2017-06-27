<?php 
	require_once 'pages/header.php';
	require_once 'inc/Actions.php';

	$comando = new Actions();

	$id = (int)$_GET["id"];
	$cookie = $login_cookie;

	foreach($comando->CheckForID($id) as $key => $value)
	{
		$email = $value['email'];
	}

	if($email == $cookie)
	{
		header("Location: myprofile.php");
	}

 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">
 	<title>Rede Social - Desenvolvida para fins didático</title>

 	<style>
 		
 		#profile{width: 100px; height: 100px; display: block; margin: 20px auto 0 auto; border: 5px solid #007FFF; background-color: #007FFF; border-radius: 10px; margin-bottom: -30px;}

 		div#menu{width: 350px; height: 120px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #007FFF; text-align: center;}
 		#menu h2{text-align: center;padding-top: 25px; color: #FFF;}
 		#menu input{height: 25px; border: none; border-radius: 3px; background-color: #fff; cursor: pointer;}
 		#menu input[name="add"], #menu input[name="remover"], #menu input[name="cancelar"]{margin-right: 40px;}
 		#menu input:hover{height: 25px; border: none;border-radius: 3px; background-color: transparent; cursor: pointer; color: #fff;}

 		.pub{width: 400px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #fff; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px; margin-top: 20px;}
 		.pub a{color: #666666; text-decoration: none;}
 		.pub a:hover{color: #111;}
 		.pub p{margin-left: 10px; color: #666666; padding-top: 10px;}
 		.pub span{display: block; margin: auto; width: 380px; margin-top: 10px;}
 		.pub img{display: block; margin: auto; width: 100%; margin-top: 10px;border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;}
 	</style>
 </head>
 <body>
	
	<?php
		if($value['img'] == "")
		{
			echo '<a href="#"><img src="img/user.png" id="profile"></a>';
		}
		else 
		{
			echo '<a href="#"><img src="upload/'.$value["img"].'" id="profile"></a>';
		}

	 ?>

 	<div id="menu">
 		<form method="POST">
	 		<h2><?php echo $value['nome']; ?></h2>

	 		<?php
	 			foreach ($comando->CheckFriends($cookie, $email) as $key => $value)
	 			{
	 				if($comando->CheckFriends($cookie, $email) >= 1 AND $value['aceite'] == "sim")
	 				{
	 					echo '<input type="submit" value="Remover amigo" name="remover"><input type="submit" name="denunciar" value="Denunciar">';
	 				}
	 				elseif($comando->CheckFriends($cookie, $email) >= 1 AND $value['aceite'] == "nao")
	 				{
	 					echo '<input type="submit" value="Cancelar Solicitação" name="cancelar"><input type="submit" name="denunciar" value="Denunciar">';
	 				}
	 				else
	 				{
	 					echo '<input type="submit" value="Adicionar aos amigos" name="add"><input type="submit" name="denunciar" value="Denunciar">';
	 				}
	 			}
	 			
	 		 ?>
 		</form>
 	</div>

 	<?php

 		foreach($comando->Pubs("WHERE user = '$email'") as $key => $pub)
 		{
 			$email = "";
 			$email = $pub->user;
 			$id_pub = $pub->id_pub;
 			$imagem = $pub->imagem;
 			$texto = $pub->texto;
 			$data = $pub->data;

 			foreach ($comando->CheckForEmail($email) as $key => $info_user)
	 		{
	 			$nome = $info_user->nome;
	 		}

			if($imagem == "")
			{
				echo '<div class="pub" id="'.$id_pub.'">
						<p><a href="profile.php?id='.$info_user->id.'">'.$nome.'</a> - '.$data.'</p>
						<span>'.$texto.'</span><br/>
					 </div>';
			}
			else
			{
				echo '<div class="pub" id="'.$id_pub.'">
						<p><a href="profile.php?id='.$info_user->id.'">'.$nome.'</a> - '.$data.'</p>
						<span>'.$texto.'</span>
						<img src="upload/'.$imagem.'">
					 </div>';
			}
 		} 		
 	 ?>
	<br/>
	<div id="footer">
 		<p>&copy Rede Social 2017, Todos os direitos reservados</p>
 	</div>
 	<br/>
 </body>
 </html>