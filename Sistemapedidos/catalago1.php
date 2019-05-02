<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("seguranca.php");
	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);

if(count($matches)<2){
preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
}

if (count($matches)>1){
// Então, estamos usando o IE
$version = $matches[1];

switch(true){
case ($version <= 8):
echo"Este software não é compative  com o navegador Internet explore, por favor abra no google chorme ou firefox.";
header("Location: http://celular.tbsa.com.br/internet_explore.php");
break;

case ($version == 9 || $version == 10):
echo"Este software não é compative  com o navegador Internet explore, por favor abra no google chorme ou firefox.";
header("Location: http://celular.tbsa.com.br/internet_explore.php");
break;

case ($version == 11):
echo"Este software não é compative  com o navegador Internet explore, por favor abra no google chorme ou firefox.";
header("Location: http://celular.tbsa.com.br/internet_explore.php");
break;

default:

}
}
?>
<!doctype html>
<html lang="br">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
					<nav class="col-md-2  d-md-block bg-light sidebar">
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
							 <h2 style="font-family:Helvetica;font-size:170%;" >Catálogo</h2>
						</div>
						<?php
						include_once("conexao.php");
						$pagina =(isset($_GET['pagina']))?$_GET['pagina']:1;
						
						
						
						$sql1="SELECT*FROM produtos";
						$resultado=mysqli_query($conn,$sql1);
						
						
						
						$numRegistros = mysqli_num_rows($resultado);
						
						$quantidade_pg=6;
						$num_pagina=ceil($resultado/$quantidade_pg);
						$inicio=($quantidade_pg*$pagina)-$quantidade_pg;
						
						$sql2="SELECT id_produto,foto_1, nome_produto,brev_desc_produto,valor_produto 
						FROM produtos limit $inicio,$quantidade_pg";
						
						$resultado_produtos=mysqli_query($conn,$sql2);
						
						$resultado=mysqli_num_rows($resulados_produtos);
						
						
						
						if($numRegistros!=0){
							echo'<div class="container">';
							echo'<div class="row">';
							$s=0;
						while($linhas=mysqli_fetch_array($resultado_produtos)){
							$s++;
							
							?>
										<div class="col-sm">
												<div  style="width: 14rem;">
												<?php
												echo'<a href="detalhes_produto.php?codigo='.$linhas['id_produto'] .'">';
												?>
													<img class="card-img-top" src="img\fotos\<?= utf8_encode($linhas['foto_1'])?>" alt="Card image cap" width="125px" height="225px">
													<?php
													echo"</a>";
													?>
													<div class="card-body">
														 <p class="card-text"><h5><?=utf8_encode($linhas['nome_produto'])?></h5><?=$linhas['brev_desc_produto']?></p>
														<?php
														 
														 echo'<a class="btn btn-secondary btn-lg" href="detalhes_produto.php?codigo='.$linhas['id_produto'] .'">';
														 echo 'R$' . number_format($linhas['valor_produto'], 2, ',', '.');
														 echo'</a>';
														 ?>
													</div>
													</div>
											</div>

											<?php
											if($s>=3){
												echo"</div>";
												echo"<br>";
												echo'<div class="row">';
												$s=null;	
											}
						}
						
						echo"</div>";
						echo"</div>";
						?>
						<nav aria-label="Page navigation example">
							  <ul class="pagination justify-content-center">
								<li class="page-item disabled">
								  <a class="page-link" href="#" tabindex="-1">Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								  <a class="page-link" href="#">Next</a>
								</li>
								</ul>
						</nav>
						<?php		
						echo"</div>";
						
					}else{
						echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<strong>ATENÇÃO!</strong>Não há produtos cadastrados no site.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							 </div>';
					}
					?>	
					
             </main>
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
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/dashboard.js"></script>
  </body>
</html>