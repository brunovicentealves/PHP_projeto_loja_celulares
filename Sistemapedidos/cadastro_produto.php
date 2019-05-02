<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
		ini_set('display_startup_errors',1);
		ini_set('display_errors',1);
		error_reporting(E_ALL);
		
		include_once("seguranca.php");
		include_once("conexao.php");
		
		$nome_produto=$_POST['nome_produto'];
		$valor_produto=$_POST['valor_produto'];
		$n_parcelas=$_POST['n_parcelas'];
		$valor_parcelado=$_POST['valor_parcelado'];
		$brev_desc_produto=$_POST['brev_desc_produto'];
		$desc_completa_produto=$_POST['desc_completa_produto'];
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$chip=$_POST['chip'];
		$tela=$_POST['tela'];
		$sistemaoperacional=$_POST['sistemaoperacional'];
		$processador=$_POST['processador'];
		$memoria=$_POST['memoria'];
		$banda=$_POST['banda'];
		$camera=$_POST['camera'];
		$fotocelular1=$_FILES['fotocelular1']['name'];
		$fotocelular2=$_FILES['fotocelular2']['name'];
		$fotocelular3=$_FILES['fotocelular3']['name'];
			
		$destino = "c:/inetpub/wwwroot/Sistemapedidos/img/fotos/";
			if(!move_uploaded_file($_FILES["fotocelular1"]["tmp_name"], $destino.$_FILES["fotocelular1"]["name"])) {
				
			$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi possivel!</strong> Não esta realizando o upload do foto para servidor.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									   header("Location: form_cadastro_produto.php");
				
			} 
			
			if(!move_uploaded_file($_FILES["fotocelular2"]["tmp_name"], $destino.$_FILES["fotocelular2"]["name"])) {
				
				$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi possivel!</strong> Não esta realizando o upload do foto para servidor.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									   header("Location: form_cadastro_produto.php");
									   
			
			} 
			
			if(!move_uploaded_file($_FILES["fotocelular3"]["tmp_name"], $destino.$_FILES["fotocelular3"]["name"])) {
				
			$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Não foi possivel!</strong> Não esta realizando o upload do foto para servidor.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									   header("Location: form_cadastro_produto.php");
									   
			} 
				
				$sql="INSERT into produtos (nome_produto,valor_produto,parcela_produto,valor_parcela_produto,brev_desc_produto,desc_completa_produto,marca,modelo,tipo_chip,tela,sistema_operacional,processador,memoria,banda,camera,foto_1,foto_2,foto_3)
		VALUES ('$nome_produto','$valor_produto','$n_parcelas','$valor_parcelado','$brev_desc_produto','$desc_completa_produto','$marca','$modelo','$chip','$tela','$sistemaoperacional','$processador','$memoria','$banda','$camera','$fotocelular1','$fotocelular2','$fotocelular3');";
	
		$resultado=mysqli_query($conn,$sql);
		
		if($resultado== true){
			
				
			$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>Cadastrado com Sucesso!</strong> Produto foi cadastrado com sucesso.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									   header("Location: form_cadastro_produto.php");

			
		}else{
			
				
			$_SESSION['alert'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										  <strong>problemas em cadastrar!</strong> Não esta realizando cadastro dos campos no servidor.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
									   header("Location: form_cadastro_produto.php");
									   
									   
			
		}
		
			

?>