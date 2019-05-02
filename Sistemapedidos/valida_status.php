<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		include_once("seguranca.php");
			$codigo=$_GET['codigo'];
			echo $codigo;
			$verificar=$_GET['verificar'];
			echo $verificar;

		include_once("conexao.php");
		
		$sql="UPDATE pedidos SET Status_id_status='$verificar' WHERE id_pedido='$codigo'" ;
		$resultado=mysqli_query($conn,$sql);
			if(isset($resultado)){
				$_SESSION['status']=1;
				header("Location:gerenciador_pedidos.php");
			}else{
				
				$_SESSION['status']=2;
			}
?>