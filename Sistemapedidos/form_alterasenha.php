<?php
 session_start();
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		
  //formulario manda o caminho por email para realizar a troca de senha do colaborador
  $email=$_SESSION['email'];	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="BrunoVicente Alves" >
    <link rel="icon" href="img/favicon.jpg">
     <title>Recuperar Senha</title>
    <!-- Bootstrap core CSS -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
	<body >
	<div class="login-page">
  <div class="form">
    <img class="mb-2" src="img/logo.png"  width="200" height="60">
	<h1 class="h3 mb-3 font-weight-normal text-center">Recuperar senha   </h1>
   <form class="login-form" method="POST" action="valida_alterasenha.php">
   <input type="password" id="senha1" class="form-control"  required pattern=".{6,}" placeholder="Senha" name="senha" onchange="form.senha2.pattern = this.value;" >
      <input type="password" id="senha2" class="form-control" title="Senha não esta igual ao campo acima!" required pattern=".{6,}" placeholder="Confirmar Senha"  name="senha2">
	  <br>
       <button class="btn btn-lg btn-secondary btn-block" type="submit">Alterar senha</button>
 
   
   </div>
   </div>
   </form>

  </body>
  
</html>
	 
