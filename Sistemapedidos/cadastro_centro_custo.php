<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		include_once("seguranca.php");
		include_once("conexao.php");
		//valida se as variaveis não estão vazias
	if(isset ($_POST['centro_custo'])&& isset($_POST['colaborador'])){
		
		$nome_centro_custo=$_POST['centro_custo'];
		
		$chapa_colaborador=$_POST['colaborador'];
		
		$sql="SELECT nome FROM usuarios WHERE chapa='$chapa_colaborador' limit 1";
	
		$resultado=mysqli_query($conn,$sql);
		
		$numRegistros = mysqli_num_rows($resultado);
		if($numRegistros!=0){
			
		$linhas=mysqli_fetch_array($resultado);
		
		$nome_colaborador=$linhas['nome'];
		
		$sql="INSERT centro_custo (nome_custo,chefe_custo,chapa_chefe) VALUES ('$nome_centro_custo','$nome_colaborador','$chapa_colaborador')";
		$resultado=mysqli_query($conn,$sql);
		
		if($resultado== true){
			
			$_SESSION['alert']='<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Cadastrado com Sucesso!</strong> Foi cadastrado com sucesso o centro de custo.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_cadastro_centro_custo.php");
		
			
		}else{
			
			$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não cadastrado com sucesso!</strong> Teve problemas para cadastrar,fale com o pessoal da TI !
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									      header("Location:form_cadastro_centro_custo.php");
			
			
		}
		}else{
			
			
			
			
			
			
		}	
	}
		



	
?>