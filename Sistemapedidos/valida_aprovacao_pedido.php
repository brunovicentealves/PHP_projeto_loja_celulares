<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
include_once("seguranca.php");
$codigo=$_GET['codigo'];
$verifica=$_GET['verifica'];

include_once("conexao.php");


	if($verifica==2){
			
		$sql="UPDATE pedidos SET Status_id_status=2 WHERE id_pedido='$codigo'" ;
		$resultado=mysqli_query($conn,$sql);
			if(isset($resultado)){
				$_SESSION['alert']=1;
				header("Location: aprovacao_pedido.php?codigo=1");
			}
	}elseif($verifica==3){
		$sql="UPDATE pedidos SET Status_id_status=3 WHERE id_pedido='$codigo'" ;
		$resultado=mysqli_query($conn,$sql);
			if(isset($resultado)){
				$_SESSION['alert']=2;
				header("Location: aprovacao_pedido.php?codigo=1");
			}	
	   }

					

?>