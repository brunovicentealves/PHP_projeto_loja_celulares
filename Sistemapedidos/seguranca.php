<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	session_start();// inicia a sessao
		$acesso=$_SESSION['usuarioNiveisAcessoId'] ;
		$id=$_SESSION['usuarioId'];
		
	if ( !isset( $_SESSION["usuarioNome"] ) ){
		//verfica se esta iniciada a  sessão e volta para index
		header("Location: index.php");
	}
		if ( !isset( $_SESSION['contadorcarrinho'] ) ){
		 
		$_SESSION['contadorcarrinho']=0;
		
	}	
	//verifica o colaborador esta usando ainda o sistema,caso não esteje desloga o colaborador
	if ( isset( $_SESSION["sessiontime"] ) ) { 
		if ($_SESSION["sessiontime"] < time() ) { 
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
	
	$_SESSION['logindeslogado'] = "<div class='alert alert-warning'><strong>Seu login ficou ocioso por alguns minutos por esse motivo você foi deslogado.</strong></div>";
			//Redireciona para login
			header("Location: index.php");
		} else {
			
			//Seta mais tempo 60 segundos
			$_SESSION["sessiontime"] = time() +1800;
		}
	} else { 
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
	
	$_SESSION['logindeslogado'] = "<div class='alert alert-dark'><strong>Seu login ficou ocioso por alguns minutos por esse motivo você foi deslogado.</strong></div>";
	//Redireciona para login
			header("Location: index.php");
	}
		
?>