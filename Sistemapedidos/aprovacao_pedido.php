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
							  <h2 style="font-family:Helvetica;font-size:170%;" >Aprovações de Pedidos</h2>
						  </div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						  <div>
							  <?php
								include_once("conexao.php");
								$nome = $_SESSION['usuarioNome'];
								if(isset($_SESSION['alert'])){
									$s=$_SESSION['alert'];
									if($s==1){
										echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
										  <strong>Aprovado!</strong> Você aprovou o pedido.
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									   </div>';
								}elseif($s==2){
											echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Reprovado!</strong> Você reprovou o pedido.
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
										   </div>';
								}
								unset($_SESSION['alert']);
								}					
								$sql="SELECT id_pedido,nome,nome_produto,valor_produto,parcela_produto,valor_parcela_produto,id_status,nome_status FROM centro_custo c 
								INNER JOIN usuarios u on c.id_custo=u.Centro_custo_id_custo INNER JOIN pedidos p on u.Id=p.Usuarios_Id 
								INNER JOIN produtos pr on p.produtos_id_produtos= pr.id_produto INNER JOIN status s on p.Status_id_status=s.id_status
								WHERE chefe_custo='$nome' ORDER BY id_pedido ";
									  
									  $resultado=mysqli_query($conn,$sql);
									  $numRegistros = mysqli_num_rows($resultado);
									  
							    if($numRegistros!=0){
										  echo'<table class="table table-striped table-responsive-xl">
											  <thead>
												  <tr>
													  <th scope="col">Nª Pedido</th>
													  <th scope="col">Nome</th>
													  <th scope="col">Produto</th>
													  <th scope="col">Valor</th>
													  <th scope="col">Parcelas</th>
													  <th scope="col">Status do Pedido</th>
													  <th scope="col">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
													  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
													  </th>
												  </tr>
											  </thead>
											  <tbody>';
										 while($linhas=mysqli_fetch_array($resultado)){
											echo"<tr>";
												echo"<td>".$linhas['id_pedido'] ."</td>";
												echo"<td>".$linhas['nome'] ."</td>";
												echo"<td>".$linhas['nome_produto'] ."</td>";
												echo"<td>". number_format($linhas['valor_produto'], 2, ',', '.')."</td>";
										        echo"<td>".$linhas['parcela_produto'] ."X R$". number_format($linhas['valor_parcela_produto'], 2, ',', '.')."</td>";
												$idstatus = $linhas['id_status'];
												echo"<td>".$linhas['nome_status']."</td>";
												if($idstatus==1){
												echo '<td><a data-toggle="tooltip" data-placement="bottom" title="Aprovar o pedido" href="valida_aprovacao_pedido.php?codigo='.$linhas['id_pedido'] .'&verifica=2" class="btn btn-success btn-sm" >Aprovar</a>';
												echo ' <a data-toggle="tooltip" data-placement="bottom" title="reprovar o pedido"href="valida_aprovacao_pedido.php?codigo='.$linhas['id_pedido'] .'&verifica=3" class="btn btn-danger btn-sm">Reprovar</a><td>';
												}
											echo"</tr>";
										}   
								}else{
										 echo' <div class="alert alert-secondary" role="alert">
												Não há pedidos para você aprovar !
										   </div>';
										  
										  
									 }
										
						  echo'</tbody>
					   </table>';	
					 ?> 
					 </div>
				</main>
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
    <!-- Icone do menu-->
    <script src="js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/dashboard.js"></script>
  </body>
</html>