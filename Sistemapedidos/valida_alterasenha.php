<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		session_start();
		// verifica o email e altera a senha para o colaborador.
		include_once("conexao.php");

		$email=$_SESSION['email'];
		$senha=$_POST['senha'];
            $senha=md5($senha);	
			
	$sql ="UPDATE usuarios SET senha = '$senha' WHERE email = '$email'";
	$inserir=mysqli_query($conn,$sql);
	
	if(isset($inserir)){
			$_SESSION['Senhaalterada'] = "<div class='alert alert-dark'><strong>Senha alterada com sucesso.</strong></div>";
			Header("location:index.php"); // Redireciona para uma página index.
		}else{
			$_SESSION['Senhaalterada'] = "<div class='alert alert-dark'><strong>Não foi possivel alterar a sua senha.</strong></div>";
			Header("location:index.php"); // Redireciona para uma página index.
		}
	

?>