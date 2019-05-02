<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/
	include_once("conexao.php");
	session_start();
	?>
	<!DOCTYPE html>
	<html lang="br">
	<head>
	<meta charset="utf-8">
	<title>Pedidos</title>
	<head>
	<body>
		<?php
		$arquivo='planilha_pedidos.xls';
		//cria uma tabela em HTML com formato de Planilha
		$html = '';
			$html .= '<table border="1">';
			$html .= '<tr>';
			$html .= '<td colspan="10"bgcolor="#FFFACD" style="text-align: center;">Pedidos da Telefonia</tr>';
			$html .= '</tr>';
		
		$html .= '<tr>';
			$html .= '<td><b>ID_Pedido</b></td>';
			$html .= '<td><b>Nome_Colaborador</b></td>';
			$html .= '<td><b>Obra</b></td>';
			$html .= '<td><b>centro de Custo</b></td>';
			$html .= '<td><b>Nome do Produto</b></td>';
			$html .= '<td><b>Parcela</b></td>';
			$html .= '<td><b>valor da Parcela</b></td>';
			$html .= '<td><b>Valor Total</b></td>';
			$html .= '<td><b>Status do Pedido</b></td>';
			$html .= '<td><b>Data</b></td>';
			$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
			$sql = "SELECT id_pedido,nome,nome_localidade,nome_custo,nome_produto,parcela_produto,valor_parcela_produto,valor_produto,nome_status,data
			FROM centro_custo ce INNER JOIN usuarios u on ce.id_custo = u.centro_custo_id_custo INNER JOIN localidade l on u.localidade_id_localidade = l.id_localidade 
			INNER JOIN pedidos p on u.Id = p.usuarios_Id INNER JOIN produtos pr on p.produtos_id_produtos = pr.id_produto INNER JOIN status s on p.status_id_status =  s.id_status ORDER BY id_Pedido";
			$resultado = mysqli_query($conn , $sql);
			
			while($row_msg_contatos = mysqli_fetch_assoc($resultado)){
				$html .= '<tr>';
				$html .= '<td>'.$row_msg_contatos["id_pedido"].'</td>';
				$html .= '<td>'.$row_msg_contatos["nome"].'</td>';
				$html .= '<td>'.$row_msg_contatos["nome_localidade"].'</td>';
				$html .= '<td>'.$row_msg_contatos["nome_custo"].'</td>';
				$html .= '<td>'.$row_msg_contatos["nome_produto"].'</td>';
				$html .= '<td>'.$row_msg_contatos["parcela_produto"].'</td>';
				$html .= '<td>'.$row_msg_contatos["valor_parcela_produto"].'</td>';
				$html .= '<td>'.$row_msg_contatos["valor_produto"].'</td>';
				$html .= '<td>'.$row_msg_contatos["nome_status"].'</td>';
				$html .= '<td>'.$row_msg_contatos["data"].'</td>';
				$html .= '</tr>';
				;
			}
		
		//Configuração do Header para Forçar o Dowload
			header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header ("Cache-Control: no-cache, must-revalidate");
			header ("Pragma: no-cache");
			header ("Content-type: application/x-msexcel");
			header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
			header ("Content-Description: PHP Generated Data" );
			
			echo $html;
			exit; ?>
		?>
</body>
</html>	