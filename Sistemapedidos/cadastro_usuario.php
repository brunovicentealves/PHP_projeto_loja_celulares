<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		
		include_once("seguranca.php");
		include_once("conexao.php");

		if(isset($_POST['nomecolaborador'])&& isset($_POST['chapacolaborador'])&& isset($_POST['emailcolaborador'])&& isset($_POST['senhacolaborador'])&& isset($_POST['funcaocolaborador'])&& isset($_POST['centrocustocolaborador'])&&
		isset($_POST['localidadecolaborador'])&& isset($_POST['nivelacesso'])){
			
						$nomecolaborador=$_POST['nomecolaborador'];
						$chapacolaborador=$_POST['chapacolaborador'];
						$emailcolaborador=$_POST['emailcolaborador'];
						$senhacolaborador=$_POST['senhacolaborador'];
						$funcaocolaborador=$_POST['funcaocolaborador'];
						$centrocustocolaborador=$_POST['centrocustocolaborador'];
						$localidadecolaborador=$_POST['localidadecolaborador'];
						$nivel_acesso=$_POST['nivelacesso'];

		$sql="INSERT INTO usuarios (nome,email,senha,chapa,funcao,nivel_acesso,localidade_id_localidade,centro_custo_id_custo) 
		VALUES ('$nomecolaborador','$emailcolaborador','$senhacolaborador','$chapacolaborador','$funcaocolaborador','$nivel_acesso','$localidadecolaborador','$centrocustocolaborador')";
		$resultado=mysqli_query($conn,$sql);
		
		if($resultado == true){
			$_SESSION['alert']='<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Cadastrado com Sucesso!</strong> Foi cadastrado com sucesso o usuário.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_cadastro_usuario.php");
			
		}else{
			
			$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não cadastrado com sucesso!</strong> Teve problemas para cadastrar,fale com o pessoal da TI !
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_cadastro_usuario.php");
			
		}
		
		
		
		}else{
			echo"erro ao cadastrar "
		}


?>