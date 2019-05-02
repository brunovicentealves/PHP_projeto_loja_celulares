<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("conexao.php");
	include_once("seguranca.php");
	$_SESSION['cadastro']=0;
	if(!isset($_SESSION['carrinho'])){ 
        $_SESSION['carrinho'] = array(); 
    } 
	/*Aqui adciona id do produto e o id do colaborador*/	
	if(isset($_GET['acao'])){ 
	
        //ADICIONAR CARRINHO 
        if($_GET['acao'] == 'add'){ 
           if(!isset($_SESSION['posicao'])){
			   
			   $_SESSION['posicao']=1;
				
		   }else{
			   $_SESSION['posicao']=$_SESSION['posicao']+1;
				
			   
		   }
			$numerocolaborador=$_POST['colaborador'];	
			$numeroproduto=$_SESSION['idproduto'];
			$_SESSION['carrinho'][$_SESSION['posicao']] =Array('posicao'=>$_SESSION['posicao'],'idcolaborador'=>$numerocolaborador,'idproduto'=>$numeroproduto);
		 $_SESSION['contadorcarrinho']=$_SESSION['contadorcarrinho']+1;
		}
		//REMOVER CARRINHO
		if($_GET['acao'] == 'del'){ 
		$index = intval($_GET['id']);
		unset($_SESSION['carrinho'][$index]); 
		$_SESSION['contadorcarrinho']=$_SESSION['contadorcarrinho']-1;
		}
		
		//INSERE AS INFORMAÇÕES DO ARRAY O BANCO
		if($_GET['acao'] == 'inseri'){ 
		$data=date('y/m/d');
		foreach($_SESSION['carrinho'] as $id => $qtd){
			
			$id_pessoa=intval($_SESSION['carrinho'][$id]['idcolaborador']);
			$id_produto=intval($_SESSION['carrinho'][$id]['idproduto']);
			
			$sql="INSERT INTO pedidos (usuarios_id,status_id_status,produtos_id_produtos,data )VALUES('$id_pessoa','1','$id_produto','$data')";
			if(mysqli_query($conn,$sql)){
				
				$_SESSION['cadastro']=1;
					$_SESSION['contadorcarrinho']=$_SESSION['contadorcarrinho']-$_SESSION['contadorcarrinho'];
			}else{
				
				$_SESSION['cadastro']=2;
				$_SESSION['contadorcarrinho']=$_SESSION['contadorcarrinho']-1;
			}
				
		}
		$_SESSION['carrinho']=Array();
		}
		
	}
	
	
	
	
?>
	