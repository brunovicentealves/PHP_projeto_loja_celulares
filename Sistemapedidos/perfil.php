<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("seguranca.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Bruno Vicente Alves" content="">
   <link rel="icon" href="img/favicon.jpg">
    <title>Painel</title>
    <!-- Bootstrap core CSS -->
    <link href="css/painel.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
  <!--navbar do site -->
    <nav class="navbar navbar-expand navbar-light "style="background-color: #ECD078;>
		<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
					<div class="navbar-header">
					   <a class="navbar-brand" href="catalago.php"><img width="70%" height="50%" src="img/logo.png"></a>
					</div>
					
					<ul class="nav navbar-right">
					  <li><span class="badge badge-light"><?=$_SESSION['contadorcarrinho']?></span><a href="carrinho_compras.php"><img src="img/carrinho.nav2.png" ></a></li>
					  <li><a><span class="glyphicon glyphicon-log-in"></span>
							
									<ul class="nav justify-content-end">
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
												<span class="d-none d-sm-inline"><?php echo $_SESSION['usuarioNome']; ?> </span>
											</a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
												<a class="dropdown-item" href="perfil.php">Perfil</a>
												<a class="dropdown-item" data-toggle="modal" data-target="#sair" >Sair</a>
											</div>
										</li>
									</ul>                
								
							</a>
						</li>
					</ul>
			  </div>
		</nav>
	</nav>
    <!-- container menu -->
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
		
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
			<?php
				include_once("menu.php");
				menu($acesso);
			  ?>
            </ul>             
          </div>
        </nav>
        <main role="main" class="col-md-5 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
             <h2 style="font-family:Helvetica;font-size:170%;" >Informações Pessoais</h2>
          </div>
		  <div class="">
            <?php
			if(isset($_SESSION['alert'])){
									$mensagem=$_SESSION['alert'];
									if($mensagem==1){
										echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Alterado a Senha!</strong> Sua senha foi alterado com sucesso.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
								}elseif($mensagem==2){
											echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Ops algum problema deu para alterar a senha !</strong> Entre em contato com a Ti para arrumar esse erro.
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
										   </div>';
								}
								unset($_SESSION['alert']);
							}
			
			
			
		include_once("conexao.php");
		$nome=$_SESSION['usuarioNome'];
		$sql="SELECT nome,email, nome_localidade,nome_custo  
			FROM usuarios u INNER JOIN localidade l on u.Localidade_id_localidade = l.id_localidade  INNER JOIN centro_custo cu  on u.centro_custo_id_custo = cu.id_custo
			WHERE nome ='$nome'";
		$verificar = mysqli_query($conn,$sql);
		$resultado=mysqli_fetch_assoc($verificar);
		if(isset($resultado)){
			echo "<b>Nome:</b>    " . $resultado['nome'] ."<br><br>";
			echo "<b>E-mail: </b>  ". $resultado['email'] ."<br><br>";
			echo "<b>Localidade: </b>  ". $resultado['nome_localidade'] ."<br><br>";
			echo "<b>Centro Custo:</b>   ".$resultado['nome_custo'] ."<br>";
		}else{
			
			echo'<div class="alert alert-dark" role="alert">
				Aconteceu alguns problemas para mostrar as informações do seu perfil,entre em contato com a TI !
			</div>';
			
		}
		?>
		
          </div>
		  <br>
		  <div class="col-md-0 ml-sm-0 col-lg-2 px-1">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AlterarSenha">Alterar Senha</button>
          </div>
        </main>
      </div>
    </div>
	<!-- janela modal de sair-->
	  <div class="modal fade" id="sair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="sair">Sair</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				Você deseja realmente sair do sistema?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Camcelar</button>
				<a href="sair.php" class="btn btn-danger">Sair</a>
			  </div>
			</div>
		  </div>
	</div>
	<!-- Modal Alteração de Senha -->
<div class="modal fade" id="AlterarSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Altere sua senha </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpa()">
						  <span aria-hidden="true">&times;</span>
						</button>
				  </div>
				  <div class="modal-body">
					    <form  name="valida_Senha" action="valida_troca_senha.php" method="POST" >
							<input type="password" class="form-control" required pattern=".{6,}" placeholder="Digite a senha " name="senha1" onchange="form.senha2.pattern = this.value;">
							<br>
							<input  type="password" class="form-control" title="Senha não esta igual ao campo acima!" required pattern=".{6,}" placeholder="Repita a senha" name="senha2">
						 <div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal" >Sair</button>
							<button type="submit" class="btn btn-success" >Alterar</button>
						</div>
					</form>
				  </div>
			</div>
	  </div>
</div>
<!-- Bootstrap e  JavaScript da pagina -->
    <script src="js/jquery-3.3.1.slim.js"></script>
    <!-- Icone do menu-->
    <script src="js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/dashboard.js"></script>
  </body>
</html>