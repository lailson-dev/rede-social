<?php 
	require_once 'pages/header.php';
	require_once 'inc/Actions.php';

	$comando = new Actions();


	if(isset($_POST['publish'])) {
		if ($_FILES["file"]["error"] > 0) {
			$texto = $_POST["texto"];
			$hoje = date("Y-m-d");
			$user = $_COOKIE['login'];

			if ($texto != "") {
				$comando->setTabela('pubs');
				$comando->setUser($user);
				$comando->setTexto($texto);
				$comando->setData($hoje);

				if($comando->CreatePub('semfoto')) {
					header("Location: ./");
				}
				else {
					echo "Houve uma falha ao tentar publicar. Tente novamente mais tarde.";
				}
			}
		}
		else {
			$r = rand(0, 1000000);
			$img = $r.$_FILES["file"]["name"];

			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$img);

			$texto = $_POST['texto'];
			$hoje = date("Y-m-d");
			$user = $_COOKIE['login'];

			if ($texto != "" || $img != "") {
				$comando->setTabela('pubs');
				$comando->setUser($user);
				$comando->setTexto($texto);
				$comando->setImagem($img);
				$comando->setData($hoje);

				if($comando->CreatePub('comfoto')) {
					header("Location: ./");
				}
				else {
					echo "Houve uma falha ao tentar publicar. Tente novamente mais tarde.";
				}
			}
		}
	}
 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">
 	<title>Rede Social - Desenvolvida para fins didático</title>
 	<style>
 		#publish{width: 400px; height: 220px; display: block; margin: auto; border: none; border-radius: 5px; background: #fff; box-shadow: 0 0 3px #A1A1A1; margin-top: 30px;}
 		#publish textarea{width: 365px; height: 150px; display: block; margin: auto; border-radius: 5px; padding: 5px 0 0 5px; border-width: 1px; border-color: #A1A1A1;}
 		#publish img{margin: 0 0 0 10px; width: 40px; cursor: pointer;}
 		#publish input[type="submit"]{width: 70px; height: 25px; border-radius: 3px; float: right; margin: 5px 15px 0 0; border: none; background: #4169E1; color: #fff; cursor: pointer;}
 		#publish input[type="submit"]:hover{background: #001F3F;}

 		.pub{width: 400px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #fff; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px; margin-top: 20px;}
 		.pub a{color: #666666; text-decoration: none;}
 		.pub a:hover{color: #111;}
 		.pub p{margin-left: 10px; color: #666666; padding-top: 10px;}
 		.pub span{display: block; margin: auto; width: 380px; margin-top: 10px;}
 		.pub img{display: block; margin: auto; width: 100%; margin-top: 10px;border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;}
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

 	<?php

 		foreach($comando->Pubs() as $key => $pub)
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