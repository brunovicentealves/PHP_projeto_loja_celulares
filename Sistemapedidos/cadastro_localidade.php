<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		include_once("seguranca.php");
		include_once("conexao.php");
		
		if(isset ($_POST['nome_custo'])){
	
		$nome_localidade=$_POST['nome_custo'];
	
	$sql="INSERT INTO localidade (nome_localidade) values('$nome_localidade')";
	
	$resultado=mysqli_query($conn,$sql);
	
	if($resultado== true){
			$_SESSION['alert'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Cadastrado com Sucesso!</strong> Foi cadastrado com sucesso a sua localidade.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									   header("Location: form_cadastro_localidade.php");
	}else{
		
		$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não cadastrado com sucesso!</strong> Teve problemas para cadastrar,fale com o pessoal da TI !
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									    header("Location: form_cadastro_localidade.php");
		
		
	}
	
}
		
		
		

?>