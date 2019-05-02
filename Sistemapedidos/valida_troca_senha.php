<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
 include_once("seguranca.php");
if(isset ($_POST['senha1'])){
	include_once("conexao.php");
	
	$senha=md5($_POST['senha1']);
	
	$sql="UPDATE usuarios SET senha='$senha' where id='$id'";
	
	$resultado=mysqli_query($conn,$sql);
	if(isset($resultado)){
		$_SESSION['alert']=1;
				header("Location: perfil.php?codigo=1");	
	}
	
}else{
	$_SESSION['alert']=2;
				header("Location: perfil.php?codigo=2");
}
?>