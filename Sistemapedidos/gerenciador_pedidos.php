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
	<link href="css/dataTables.min.css" rel="stylesheet">
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
						 <h2 style="font-family:Helvetica;font-size:170%;" >Gerênciador de Pedidos</h2>
					  </div>
					  <?php
					  if(isset($_SESSION['status'])==1){
						 echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Status </strong> alterado com sucesso.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>';
							unset($_SESSION['status']);
					      }elseif(isset($_SESSION['status'])==2){
						 echo' <div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Status</strong> não alterado com sucesso , entre em contato com a TI.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>';
							unset($_SESSION['status']);
					  }
					  
					  
					   include_once("conexao.php");
					 
					  $sql_pedidos = "SELECT id_pedido,nome,nome_localidade,nome_custo,nome_produto,parcela_produto,valor_parcela_produto,valor_produto,nome_status
					FROM centro_custo ce INNER JOIN usuarios u on ce.id_custo = u.centro_custo_id_custo INNER JOIN localidade l on u.localidade_id_localidade = l.id_localidade 
					INNER JOIN pedidos p on u.Id = p.usuarios_Id INNER JOIN produtos pr on p.produtos_id_produtos = pr.id_produto INNER JOIN status s on p.status_id_status =  s.id_status ";
					$resultado1 = mysqli_query($conn,$sql_pedidos);
						$numRegistros = mysqli_num_rows($resultado1);
					   if($numRegistros!=0){
					  ?>
				  <div>
				 
					  <a href="gerador_csv.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Download Excel</a>
					  <br>
					  <br>
					  <table id="minhaTabela" class="table table-striped table-responsive-xl" >
							<thead>
							  <tr>
									<th>Id</th>
									<th>Nome</th>
									<th>Localidade</th>
									<th>Centro_Custo</th>
									<th>Produto</th>
									<th>Valor</th>
									<th>Status</th>
									<th>Ações</th>
								</tr>
							</thead>
								<tbody>
										<?php
										  while($linhas=mysqli_fetch_array($resultado1)){
											  $id_pedidos=$linhas['id_pedido'];
											  ?>
										  <tr>
												<td><?=$linhas['id_pedido']?></td>
												<td><?=$linhas['nome']?></td>
												<td><?=$linhas['nome_localidade']?></td>
												<td><?=$linhas['nome_custo']?></td>
												<td><?=$linhas['nome_produto']?></td>
												<td><?=$linhas['valor_produto']?></td>
												<td><?=$linhas['nome_status']?></td>
												<td>
												<div class="btn-group">
													  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Mudar Status
													  </button>
													  <div class="dropdown-menu dropdown-menu-right">
														  <?php
														   $sql_status = "SELECT id_status,nome_status FROM `status`";
															$resultado2 = mysqli_query($conn,$sql_status);
														  while($linhas=mysqli_fetch_array($resultado2)){
															echo'<a class="dropdown-item" href="valida_status.php?codigo='.$id_pedidos.'&verificar='.$linhas['id_status'].'">';
															?>
															<?=$linhas['nome_status']?>
															</a>
															<?php
														      }
															?>
													  </div>
													</div>
												</td>
										  </tr>
										  <?php
											}
											?>	
									</tbody>
						  </table>
					  </div>
				</main>
				<?php
				   }else{
					   echo' <div class="alert alert-secondary" role="alert">
										Voce não tem solicitações de pedidos
                                   </div>';
				   }
				?>
			  </div>
			</div>
			<!-- janela modal de sair-->
		  <div class="modal fade" id="sair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sair</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				Você deseja realmente sair do sistema?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<a href="sair.php" class="btn btn-danger">Sair</a>
			  </div>
			</div>
		  </div>
		</div>
 <!-- Bootstrap e  JavaScript da pagina -->
    <script src="js/jquery-3.3.1.slim.js"></script>
    <script src="js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
	 <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/dashboard.js"></script>
   
  
	
<script src="js/jquery-3.2.1.js"></script>
  <script src="js/dataTables.min.js"></script>
  <script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "language": {
			  "info":"Mostrando _START_ a _END_ de _TOTAL_ registros",
			  "infoEmpty":"Mostrando 0 a 0 de 0 Registros",
                "search":"Procurar:",
				"lengthMenu":     "Mostrando _MENU_ Registros",
				"zeroRecords":"Não foi encontrado nenhum registro",
				"paginate": {
					"first":      "First",
					"last":       "Last",
					"next":       "Proximo",
					"previous":   "Anterior"
    },
            }
        });
  });
  </script>
  </body>
</html>