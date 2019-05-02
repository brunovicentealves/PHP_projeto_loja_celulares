<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
include_once("seguranca.php");
$idacesso=$_SESSION['usuarioNiveisAcessoId'];
$nome=$_SESSION['usuarioNome'];
						
?>
<!doctype html>
<html lang="br">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
		<link rel="icon" href="img/favicon.jpg">
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/lightbox.js"></script>
		<link href="css/lightbox.css" rel="stylesheet"/>
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
					<?php
					include_once("conexao.php");
					$codigo=$_GET['codigo'];
						
					

					$sql="SELECT nome_produto,desc_completa_produto,marca,modelo,tipo_chip,tela,sistema_operacional,processador,memoria,banda,camera,parcela_produto,valor_parcela_produto,valor_produto,foto_1,foto_2,foto_3 FROM produtos WHERE id_produto = '$codigo' LIMIT 1 ";
						$resultado=mysqli_query($conn,$sql);
						$numRegistros = mysqli_num_rows($resultado);
						if($numRegistros!=0){
							while($linhas=mysqli_fetch_array($resultado)){
							?>
					
						<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
							<h2 class="display-5 titulo"><?=$linhas['nome_produto']?></h2>							
						</div>
						<div class="col-12 col-md-12">
							  <div class="row">
									<div class="col-12 col-md-11">
										<div class="shadow p-3 mb-3 bg-white rounded">
										<div>
										<h4>Detalhes do Aparelho:</h4>
										<?=$linhas['desc_completa_produto']?></p>
										</div>
										<div>
										<h4>Especificações Técnicas:</h4>
										<p>Marca <?=$linhas['marca']?></p>
										<p>Modelo <?=$linhas['modelo']?></p>
										<p><?=$linhas['tipo_chip']?></p>
										<p>Tela <?=$linhas['tela']?></p>
										<p><?=$linhas['sistema_operacional']?></p>
										<p><?=$linhas['processador']?></p>
										<p><?=$linhas['memoria']?></p>
										<p><?=$linhas['banda']?></p>
										<p>Camera <?=$linhas['camera']?></p>
										</div>
										<div>
										<h4>Detalhes do plano:</h4>
										<br>
										
										<h6>Serviços Fixos Mensais:</h6>
											
											<p>Fidelidade 24 Meses</p>
											<p>R$ 22,47 Pacote Internet 3GB 4GMAX</p>
											<p>R$  7,00 Taxa Administrativa</p>
											<p>Grátis 600 minutos</p>

											<h6>Tarifas de Serviços:</h6>
											<p>R$ 0,18 - SMS unitário</p>
											<p>R$ 0,06 - VC1 Excedente por minuto</p>
											<p>R$ 0,10 - VC2/VC3 para Móvel Intra Rede </p>
											<p>R$ 0,34 - VC2/VC3 para Móvel Outras</p>
											<p>R$ 0,34 - VC2/VC3 para Fixo R$ 0,34</p>

											<h6>Linha Particular:</h6>
											Aparelho descontado integralmente.
											Serviços descontado integralmente.
											<br>
											<br>
											<h6>Linha Corporativa:</h6>
											Aparelho descontado integralmente.
											Serviços subsidiados pela empresa, conforme necessidade.
											<br>
											<br>
											<br>
											
											
											<h4>
											<?php
											$numeroparcelas=$linhas['parcela_produto'];
											$valorparcela=$linhas['valor_parcela_produto'];
											$valortotal=$linhas['valor_produto'];
											echo 'R$' . number_format($valortotal, 2, ',', '.');
											echo "&nbsp&nbsp&nbsp";
											echo $numeroparcelas;echo  'X R$' . number_format($valorparcela, 2, ',', '.');
											?>
											
											</h4>
										</div>
										
										</div>
								  </div>
							  </div>
							  <br>
							  <div class=" container">
									<div class="row">
										   <div class="col-6 col-md-2">
											   <div class="single last">
												   <a href="img/fotos/<?= utf8_encode($linhas['foto_1'])?>" rel="lightbox" title="Foto ilustrativa do aparelho"><img src="img/fotos/<?= utf8_encode($linhas['foto_1'])?>" width="150px" height="130px" alt="sansung" /></a>
											    </div>
											</div>
											<div class="col-6 col-md-2">
												 <div class="single last">
													<a href="img/fotos/<?= utf8_encode($linhas['foto_2'])?>" rel="lightbox" title="Foto ilustrativa do aparelho"><img src="img/fotos/<?= utf8_encode($linhas['foto_2'])?>"width="150px" height="130px" alt="sansung" /></a>
												 </div>
											</div>
										    <div class="col-6 col-md-2">
												<div class="single last">
													<a href="img/fotos/<?= utf8_encode($linhas['foto_3'])?>" rel="lightbox" title="Foto ilustrativa do aparelho"><img src="img/fotos/<?= utf8_encode($linhas['foto_3'])?>"width="130px" height="130px" alt="sansung" /></a>
												 </div>
											</div>
											<div class="col-6 col-md-2">
											</div>
											<div class="col-6 col-md-2">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar no Carrinho</button>
											</div>	
								   </div>
							</div>
							<br>
							<br>
						</div>
						
					<?php
					  }
						}else{
							echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<strong>ATENÇÃO!</strong> Esta com problema na pagina , emtre em contato com a TI !
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
						Você deseja sealmente sair do sistema?
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
						<a href="sair.php" class="btn btn-danger">Sair</a>
					  </div>
				</div>
		  </div>
	</div>
	<!-- Janela modal Selecionar o Comprador do Pedido-->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Essa compra sera para você ou para outro colaborador?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
					  <form  name="valida" action="carrinho_compras.php?acao=add" method="POST" >
							<select class="chosen"  name='colaborador'>
						<!--realiza um consulta no banco e joga no Select -->
						<!--Foi usado a Jquery chosen para criar esse slect -->
						  <?php
						  include_once("conexao.php");
						  $_SESSION['idproduto']=$codigo;
						  $nome=$_SESSION['usuarioNome'];
						  echo $nome;
						 
						 if($idacesso==1 || $idacesso==2){
								echo '<option value='.$_SESSION['usuarioId'].'>'.$_SESSION['usuarioNome'] .'</option>';		
								$sql="SELECT id,nome FROM usuarios u INNER join centro_custo c on u.centro_custo_id_custo=c.id_custo WHERE chefe_custo='$nome'";
								 $resultado=mysqli_query($conn,$sql);
								 }
								 
						 if($idacesso==3){
							 echo '<option value='.$_SESSION['usuarioId'].'>'.$_SESSION['usuarioNome'] .'</option>';
								//aqui faz a consulta para saber o centro se custo do colaborador
								$sql="SELECT id_custo FROM usuarios u INNER join centro_custo c on u.centro_custo_id_custo=c.id_custo WHERE id='$id' LIMIT 1";
								$resultado=mysqli_query($conn,$sql);
											$numRegistros = mysqli_num_rows($resultado);
											if($numRegistros!=0){
												$linhas=mysqli_fetch_array($resultado);
												$custo=$linhas['id_custo'];
												
												$sql2="SELECT id, nome FROM usuarios u INNER join centro_custo c on u.centro_custo_id_custo=c.id_custo WHERE id_custo='$custo'";
												
												$resultado=mysqli_query($conn,$sql2);
											}
								 
									}	 
									while($linhas=mysqli_fetch_array($resultado)){
										$s=$linhas['id'];		
										echo '<option value='.$linhas['id'].'>'.$linhas['nome'] .'</option>';
								}
								?>	
					</select>
						 <div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal" >Sair</button>
							<button type="submit" class="btn btn-success" >Continuar</button>
						</div>
					</form>
				  </div>
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
    <script src="js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/dashboard.js"></script>
 <script type="text/javascript">
           $(function () {
               $('#gallery a').lightBox();
           });
        </script>
 <style type="text/css">
	#gallery {
		background-color: #fff;
		padding: 12px;
		width: auto;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #444444;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	</style>
	 
	
  </body>
</html>