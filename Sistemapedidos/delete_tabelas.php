<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("seguranca.php");
	include_once("conexao.php");

	$id=$_GET['id'];
	$acao=$_GET['acao'];

	//deleta itens do centro de custo 
	if($acao=='centro_custo'){
		$sqlcentrocusto="DELETE FROM $acao WHERE id_custo=$id";		
		$resultado=mysqli_query($conn,$sqlcentrocusto);
		
		// se não conseguir deletar  manda essa mensagem na pagina form_centro_custo.php
		if(!$resultado){
			$_SESSION['alert']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi deletado!</strong> O item esta sendo usado em outro lugar no sistema.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_centro_custo.php");

			//se conseguir excluir manda essa mensagem de excludo com sucesso na pagina form_centro_custo.php
		}else{
			
			$_SESSION['alert']='<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Excluido com sucesso!</strong> Foi deletedo sistema o item.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_centro_custo.php");
			
		}	
    }
	
	//deleta o itens da localidade
	if($acao=='localidade'){
	
		$sqlcentrocusto="DELETE FROM $acao WHERE id_localidade=$id";			
		$resultado=mysqli_query($conn,$sqlcentrocusto);
		
		//se não conseguir excluir o item da localidade ele manda uma mensagem para pagina form_localidade.php
		if(!$resultado){
			$_SESSION['alert']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi deletado!</strong> O item localidade  esta sendo usado em outro lugar no sistema.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_localidade.php");
									 
			//se conseguir excluir manda uma mensagem para form_localidade.php						 
		}else{
			
			$_SESSION['alert']='<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Excluido com sucesso!</strong> Foi deletedo sistema o item.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_localidade.php");
			
		}
     }
	//deleta usuarios 
	if($acao=='usuarios'){
	
		$sqlcentrocusto="DELETE FROM $acao WHERE id=$id";		
		$resultado=mysqli_query($conn,$sqlcentrocusto);
		
		//se não conseguir deletar ira mandar uma mensagem para form_usuario.php
		if(!$resultado){
			$_SESSION['alert']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi deletado!</strong> O item localidade  esta sendo usado em outro lugar no sistema.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_usuarios.php");
									 
		//se conseguir deletar o usarios ira mandar mensagem para form_usuario.php							 
		}else{
			
			$_SESSION['alert']='<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Excluido com sucesso!</strong> Foi deletedo sistema o item.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_usuarios.php");
			
		}	
   }
	//ira deletar produtos
	if($acao=='produtos'){
	
		$sqlcentrocusto="DELETE FROM $acao WHERE id_produto=$id";		
		$resultado=mysqli_query($conn,$sqlcentrocusto);
		
		//se não conseguir deletar produto ira mandar uma mensagem para form_produto.php
		if(!$resultado){
			$_SESSION['alert']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi deletado!</strong> O item localidade  esta sendo usado em outro lugar no sistema.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_produto.php");
			//se conseguir excluir o produto ira mandar a mensagem para form_produto.php						 
		}else{
			
			$_SESSION['alert']='<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Excluido com sucesso!</strong> Foi deletedo sistema o item.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									 header("Location:form_produto.php");
			
		}
	}



?>