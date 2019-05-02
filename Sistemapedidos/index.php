<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	session_start();
?>
<!doctype html>
<html lang="br">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="BrunoVicente Alves" content="">
    <link rel="icon" href="img/favicon.jpg">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
<div class="login-page">
  <div class="form">
  <img class="mb-2" src="img/logomarca.png"  width="100%" height="80%">
  <br><br>
    <form class="login-form" method="POST" action="valida.php">
		  <input type="email" name="email"id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
		  <input type="password" name="senha"id="inputPassword" class="form-control" placeholder="Senha" required>
		   <button class="btn btn-lg btn-secondary btn-block" type="submit">Logar</button>
		   <br>
		   
		  <a href="form_valida_email.php">Recuperar Senha</a>
		  <br>
		  
	</form>
	<?php 
			if(isset($_SESSION['loginErro'])){
				echo '<p>'.$_SESSION['loginErro'].'';
				unset($_SESSION['loginErro']);
			}
		
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);
			}
			
			if(isset($_SESSION['loginsenha'])){
				echo $_SESSION['loginsenha'];
				unset($_SESSION['loginsenha']);
			}
	
			if(isset($_SESSION['errocodigo'])){
				echo $_SESSION['errocodigo'];
				unset($_SESSION['errocodigo']);
			}
		
			if(isset($_SESSION['Senhaalterada'])){
				echo $_SESSION['Senhaalterada'];
				unset($_SESSION['Senhaalterada']);
			}
			?>
  </div>

</div>
 
  </body>
   
</html>
