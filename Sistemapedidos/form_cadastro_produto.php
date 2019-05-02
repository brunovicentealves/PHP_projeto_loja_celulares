<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("seguranca.php");
	include_once("conexao.php");
?>
<!doctype html>
<html lang="en">
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
				 <h2 style="font-family:Helvetica;font-size:170%;" >Cadastro de Produtos</h2>
			  </div>
			  <?php
				  if(isset($_SESSION['alert'])){
					  echo $_SESSION['alert'];
					  unset($_SESSION['alert']);
				  }
			  ?>
			  <form name="form_cadastro_usuario" id="cadastro_usuario" action="cadastro_produto.php" method="POST" enctype = "multipart/form-data">
				<div class="shadow p-3 mb-3 bg-white rounded">
					<div class="row">
						<div class="col">
							<label>Nome Produto:</label>
							<input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Digite o nome do produto" required>
						</div>
						<div class="col">
							<label>Valor do produto:</label>
							 <input type="number" class="form-control"id="valor_produto" name="valor_produto" placeholder="Digite o valor total do produto" required>
						</div>
						<div class="col">
							<label>Nº de parcelas:</label>
							<input type="number" class="form-control" id="n_parcelas" name="n_parcelas" placeholder="Digite o numero de parcelas" required>
						</div>
						<div class="col">
							<label>Valor parcelado:</label>
							<input type="number" class="form-control" id="valor_parcelado" name="valor_parcelado" placeholder="Digite o valor da parcela" required>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Breve descrição do produto:</label>
						<textarea class="form-control" id="brev_desc_produto" name="brev_desc_produto" rows="2" required></textarea>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Descrição completa do produto:</label>
						<textarea class="form-control" id="desc_completa_produto" name="desc_completa_produto" rows="2" required ></textarea>
					</div>
					<div class="row">
						<div class="col">
							<label>Marca:</label>
							<select class="form-control" id="marca" name="marca" required>
								<option value="LG">LG</option>
								<option value="MOtorola">Motorola</option>
								<option Value="Aple">Aple</option>
								<option value="Sansung">Sansung</option>
							</select>
						</div>
						<div class="col">
							<label>Modelo:</label>
							<input type="text" class="form-control" id="modelo" name="modelo" placeholder="Digite o modelo" required>
						</div>
						<div class="col">
							<label>Chip:</label>
							<select class="form-control" id="chip" name="chip" required >
								<option value="Dual Chip">Dual Chip</option>
								<option value="Single Chip">Single Chip</option>
							</select>
						</div>
						<div class="col">
							<label>Tela:</label>
								<select class="form-control" id="tela" name="tela" required>
									 <option value="4">4"</option>
									 <option value="4,5">4,5"</option>
									 <option value="5">5"</option>
									 <option value="5,5">5,5"</option>
									 <option value="6">6"</option>
									 <option value="6,5">6,5"</option>
									 <option value="7">7"</option>
									 <option value="7,5">7,5"</option>
									 <option value="8">8"</option>
								</select>
						</div>
						<div class="col">
							<label>S.0:</label>
							<select class="form-control" id="sistemaoperacional" name="sistemaoperacional" required>
								<option value="Android">Android</option>
								<option value="IOS">IOS</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>Processador:</label>
							<input type="text" class="form-control" id="processador" name="processador" placeholder="Digite o nome do processador" required>
						</div>
						<div class="col">
							<label>Memória:</label>
							<input type="text" class="form-control" id="memoria" name="memoria" placeholder="Digite tamanho da memoria " required>
						</div>
						<div class="col">
							<label>Banda:</label>
							<input type="text" class="form-control" id="banda" name="banda" placeholder="Digite o tipo de banda" required>
						</div>
						<div class="col">
							<label>Camera:</label>
							<input type="text" class="form-control" id="camera" name="camera" placeholder="Digite a resolução da camera" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
						<label>Foto 1 :</label><br>
							 <input type = "file" name = "fotocelular1" class="btn btn-outline-dark" required />
						</div>
					</div>
					<br>
					
					<div class="row">
						<div class="col">
						<label>Foto 2 :</label><br>
							 <input type = "file" name = "fotocelular2"  class="btn btn-outline-dark" required />
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
						<label>Foto 3 :</label><br>
							 <input type = "file" name = "fotocelular3" class="btn btn-outline-dark" required />
						</div>
					</div>
						<br>
					
					<div class=text-right>
						<a href="form_produto.php" class="btn btn-primary">Voltar</a>
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
	<script type="text/javascript">
      $(".chosen").chosen({
    no_results_text: "Nome não econtrado!",
    width: "100%"
	  });
	</script>
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