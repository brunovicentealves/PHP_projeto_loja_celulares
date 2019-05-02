<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
				function menu($acesso){
					
					if($acesso==1 || $acesso==2 || $acesso==3){	
					echo'<li class="nav-item">
					<a class="nav-link" href="catalago.php">
						  <span data-feather="shopping-bag"></span>
						  Catálogo
						</a>
					  </li>';
					}
					if($acesso==1 || $acesso==2 || $acesso==3){
					  echo'<li class="nav-item">
						<a class="nav-link" href="meuspedidos.php">
						  <span data-feather="edit"></span>
						  Meus Pedidos
						</a>
					  </li>';
					  }
					  if($acesso==1 || $acesso==2 || $acesso==3){
					  echo'<li class="nav-item">
						<a class="nav-link" href="carrinho_compras.php">
						  <span data-feather="shopping-cart"></span>
						  Meu Carrinho
						</a>
					      </li>';
					  }
					  if($acesso==1 || $acesso==2){
					  echo'<li class="nav-item">
						<a class="nav-link" href="aprovacao_pedido.php">
						  <span data-feather="user-check"></span>
						  Aprovações
						</a>
					  </li>';
					  }
					   
					  if($acesso==1){
					  echo'<li class="nav-item">
						<a class="nav-link" href="gerenciador_pedidos.php">
						  <span data-feather="clipboard"></span>
						  Gerência Pedidos
						</a>
					  </li>';
					  }
					  
					  //contrução essa parte do sistema
					  
					  if($acesso==1){
					  echo'<li class="nav-item">
						<a class="nav-link" href="form_localidade.php">
						  <span data-feather="map"></span>
						  Localidades
						</a>
					  </li>';
					  }
					  
					   if($acesso==1){
					  echo'<li class="nav-item">
						<a class="nav-link" href="form_centro_custo.php">
						  <span data-feather="file-text"></span>
						  Centro de Custo
						</a>
					  </li>';
					  }
					  if($acesso==1){
					  echo'<li class="nav-item">
						<a class="nav-link" href="form_usuario.php">
						  <span data-feather="users"></span>
						  Usuários
						</a>
					  </li>';
					  }
					  if($acesso==1){
					  echo'<li class="nav-item">
						<a class="nav-link" href="form_produto.php">
						  <span data-feather="package"></span>
						  Produtos
						</a>
					  </li>';
					  }
					  
					
					  
					
											  
					  
				}
?>