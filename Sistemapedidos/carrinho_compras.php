<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("seguranca.php");
	include_once("valida_carrinho_compras.php");
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
							 <h2 style="font-family:Helvetica;font-size:170%;" >Carrinho de compras</h2>
						</div>
						<?php
							
							if($_SESSION['carrinho']==array()){
								 
								   echo' <div class="alert alert-secondary" role="alert">
										O seu carrinho está vazio!
                                   </div>';
							}else{
								
							
							?>
						<table class="table">
						  <thead>
							<tr>
							  <th scope="col">Nome</th>
							  <th scope="col">Produto</th>
							  <th scope="col">Valor</th>
							  <th scope="col">Remover</th>
							</tr>
						  </thead>
						  <tbody>
							<?php
							
	foreach($_SESSION['carrinho'] as $id => $qtd){
			//PASSA O QUE TEM DENTRO DO ARRAY PARA UMA VARIAVEL					
		$id_pessoa=intval($_SESSION['carrinho'][$id]['idcolaborador']);
			//CRIADO UMA CONSULTA E PASSADO PÁRA UNA VARIAVEL					
		$sqlusuario="SELECT nome FROM usuarios WHERE id='$id_pessoa'";
			//CONECTA COM O BANCO E REALIZA CONSULTA E COLOCA EM UMA VARIAVEL		
		$resultado1=mysqli_query($conn,$sqlusuario);
		$linhas1=mysqli_fetch_assoc($resultado1);			
			echo'<tr>';
						//MOSTRA O VALOR DA CONULTA
				 echo'<td>'.$linhas1['nome'].'</td>';  
						//PASSA O QUE TEM DENTRO DO ARRAY PARA UMA VARIAVEL	
					$id_pro=intval($_SESSION['carrinho'][$id]['idproduto']);
							//CRIADO UMA CONSULTA E PASSADO PÁRA UNA VARIAVEL
					$sqlproduto="SELECT nome_produto,valor_produto FROM produtos WHERE id_produto='$id_pro'";
						//CONECTA COM O BANCO E REALIZA CONSULTA E COLOCA EM UMA VARIAVEL		  
					$resultado2=mysqli_query($conn,$sqlproduto);
					$linhas2=mysqli_fetch_assoc($resultado2);
					//MOSTA O VALOR DA CONULTA
				echo'<td>'.$linhas2['nome_produto'].'</td>';
				echo'<td>'. number_format($linhas2['valor_produto'], 2, ',', '.').'</td>';
							  //PASSA A POSICAO DO ARRAY PARA UMA VARIAVEL
					$posicao=intval($_SESSION['carrinho'][$id]['posicao']);
				echo'<td><a href="carrinho_compras.php?acao=del&id='.$posicao.'" data-toggle="tooltip" data-placement="bottom" title="Remover item" ><img src="img/carrinho.png"></a></td>';
				echo'</tr>';
	}
	
							
							?>
						  </tbody>
						</table>
						<br>
						<div class="container">
							  <div class="row">
							  <div class="col">
								</div>
								<div class="col-md-auto">
								<a href="catalago.php" class="btn btn-primary" role="button" >Continuar comprando</a>
								</div>
								<div class="col col-lg-2">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Finalizar compra</button>
								 
								</div>
							  </div>
					</div>
					<?php
							}
							if($_SESSION['cadastro']==1){
								echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Pedido cadastrado com sucesso !</strong> O pedido já esta em andamento.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									 </div>';
							}
							if($_SESSION['cadastro']==2){
								echo' <div class="alert alert-secondary" role="alert">
										Não Realizo o cadastro com sucesso!
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
						Você deseja realmente Sair do sistema?
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
						<a href="sair.php" class="btn btn-danger">Sair</a>
					  </div>
				</div>
		  </div>
	</div>
	<!-- modal dos termos  -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Li os termos e concordo que:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
					<div class="modal-body">
											

						<p>Fica limitado a cada colaborador a contratação máxima de <b>duas</b> linhas pelo plano da empresa. Caso o colaborador já possua duas linhas, com compras de aparelhos, o pedido será automaticamente cancelado.</p>

						<p>Cada aparelho ficará atrelado a uma linha, obrigatoriamente com pacote de dados pois é a contrapartida da operadora, e durante o período de 24 meses não poderei realizar a compra de outro aparelho nesta linha.</p>

						<p>A soma de todos os descontos sobre meus proventos não pode ultrapassar 30% do seu valor líquido. Pedidos que impliquem em desconto total superior a 30% serão automaticamente cancelados.</p>

						<p>Fica sob responsabilidade da TI/Telefonia Móvel a adequação da necessidade de serviço para compra de aparelho. Caso o colaborador não possua linhas, será contratada uma nova linha com pacote de dados. Caso o colaborador possua linhas sem pacote de dados, será ativado um pacote de dados nesta linha, nos termos e valores do contrato. Ainda, 
						caso o colaborador possua linhas com pacotes de dados, sem compra, será efetiva a compra nesta linha.</p>

						<p>O serviço de pacote de dados, necessário para a compra, possui fidelidade de 24 meses. Caso se encerre o contrato de trabalho do colaborador antes do termino da fidelidade e/ou parcelamento do aparelho, estes valores serão descontados <b>integralmente</b> no momento da rescisão, das suas verbas rescisórias. </p>

						<p>A compra de aparelho é para uso particular e a venda não é permitida.</p>

						<p>Por fim, ao clicar em “CONCORDO” declaro que li e entendi o escrito acima, e também as regras e os planos. Para revisá-las novamente, <a style="color:blue" href="http://portal.tbsa.com.br/0700.2310/ti/Lists/Postagens/Post.aspx?ID=69" target="_blank">Clique aqui</a>.</p>

									
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" >Não concordo</button>
						<a href="carrinho_compras.php?acao=inseri" class="btn btn-success" role="button" >Concordo
						</a>
						
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