<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	session_start();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha'],
		$_SESSION['carrinho'],
		$_SESSION['posicao'],
		$_SESSION['idproduto'],
		$_SESSION['contadorcarrinho'],
		$_SESSION["sessiontime"]
	);
	
	$_SESSION['logindeslogado'] = "<div class='alert alert-warning'><strong>Deslogado com sucesso !</strong></div>";
	
	//redirecionar o usuario para a página de login
	header("Location: index.php");
?>