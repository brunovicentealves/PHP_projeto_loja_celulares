<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("seguranca.php");
?>
<!doctype html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Bruno Vicente Alves" content="">
	<link rel="icon" href="img/favicon.jpg">
	<script src="js/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" href="css/chosen.min.css">
	<script src="js/jquery"></script>
	<script src="js/chosen.jquery.min.js"></script>
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
             <h2 style="font-family:Helvetica;font-size:170%;" >Cadastro da Localidade</h2>
          </div>
		  <div>
		  <?php
		  if(isset($_SESSION['alert'])){
			  echo $_SESSION['alert'];
		  }
			  ?>
		  </div>
		  <form name="form_cadastro_usuario" id="cadastro_usuario" action="cadastro_localidade.php" method="POST">
		  <div class="shadow p-3 mb-3 bg-white rounded">
			<div class="form-row">
				<div class="col">
					<label>Nome da localidade:</label>
					<input type="text" class="form-control" id="nome_custo" name="nome_custo"placeholder="Digite a localidade " required>
				</div>
			</div>
			<br>
			<div class=text-right>
			<a href="form_localidade.php" class="btn btn-primary">Voltar</a>
			  <button type="submit" class="btn btn-success">Cadastrar</button>
			 </div>
		</div>
		  </form>
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