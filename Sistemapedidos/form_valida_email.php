<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	session_start();
	//formulario para  captar o email do colaborador para poder validar se o email esta cadastrado.
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="BrunoVicente Alves" content="">
    <link rel="icon" href="img/favicon.jpg">

    <title>recupera Senha</title>

    <!-- Bootstrap core CSS -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
	<body >
	<div class="login-page">
  <div class="form">
  <img class="mb-2" src="img/logo.png"  width="200" height="60">
  <h1 class="h5 mb-4 font-weight-normal text-center">Enviar recuperação de senha para o email.</h1>
    <form class="login-form" method="POST" action="valida_email.php">
		 <input type="email" name="email"id="inputEmail" class="form-control" placeholder="Digite o seu email" required autofocus>
		<button class="btn btn-lg btn-secondary btn-block" type="submit">Enviar</button>
		<br>
		
		 <a href="index.php">Voltar para login</a>
		  <p class="text-center text-success">
				<?php 
				if(isset($_SESSION['erro'])){
					echo $_SESSION['erro'];
					unset($_SESSION['erro']);
				}
				?>
			</p>
	</form>
	</div>
	</div>
  </body>
  
</html>

