<?php
		/** =====>Desenvolvidor : Bruno Vicente ALves
			=====>Data:18/10/2018
			=====>Descrição do sistema: sistema para realizar Pedidos Telefonicos 
		**/

	//pega as informação do formulario validaemail.php e verifica se o email esta no banco de dados e envia 
	//envia o email para email do colaborador
	
	 header("Content-type: text/html; ISO-8859-1");

     session_start();
	include_once("conexao.php");
	
	require_once("phpmailer/PHPMailerAutoload.php");
	
	define('GUSER','pedidostelefonia@tbsa.com.br');	// <-- Insira aqui o seu GMail
	define('GPWD','Tb$@05/18');		// <-- Insira aqui a senha do seu GMail

	
	$email= strip_tags(filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING));
	//cria a consulta
	$sql="SELECT email FROM usuarios WHERE email = '$email' LIMIT 1";
	//verifica conexao e procura o registro  
	$verifica=mysqli_query($conn,$sql);	
	//se a sentença for verdadeira
	$resultado = mysqli_fetch_assoc($verifica);
	//achou o  resultado da consulta
	if(isset($resultado)){
		$codigo = base64_decode($email);
			//função para enviar email
			function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
					global $error;
					$mail = new PHPMailer();
					$mail->IsSMTP();		// Ativar SMTP
					$mail->SMTPOptions=array( 
					'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,' allow_self_signed'=>true));
					$mail->SMTPDebug = 2;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
					$email->Charset ='ISO-8859-1';
					$mail->SMTPAuth = true;		// Autenticação ativada
					$mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
					$mail->Host ='webapp.tbsa.com.br';	// SMTP utilizado  smtp.gmail.com
					$mail->Port =587;  		// A porta 587 deverá estar aberta em seu servidor 
					$mail->Username = GUSER;
					$mail->Password = GPWD;
					$mail->SetFrom($de, $de_nome);
					$mail->Subject = $assunto;
					$mail->IsHTML(true);
					$mail->Body = $corpo;
					$mail->AddAddress($para);
					if(!$mail->Send()) {
							$error = 'Mail error: '.$mail->ErrorInfo; 
							return false;
						} else {
						$error = 'Mensagem enviada!';
						return true;
					}
		}
			//corpo de email
			
			$_SESSION['email']=$email;
			$titulo='Alterar Senha - Portal Telefonia';
			$nome='Pedidos Telefonia';
			$conteudo='<p>Voce esta recebendo o link para alterar a sua  senha no portal de compras de aparelhos da telefonia movel.<p>

						<p>Se nao foi voce que solicitou, favor desconsiderar o e-mail.<p>

						<p><a href="http://celular.tbsa.com.br/form_alterasenha.php?codigo">Clique_aqui</a><p>

						<p>Telefonia Movel - TI<p>
						 ';
			
			
					
			// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
			//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.
			 if (smtpmailer($email, 'pedidostelefonia@tbsa.com.br', $nome,$titulo, $conteudo)) {
				
				$_SESSION['loginsenha'] = " <div class='alert alert-warning'><strong>Link de alteração de senha foi enviado para email cadastrado em nosso sistema.</strong></div>";
				Header("location:index.php"); // Redireciona para uma página de obrigado.
				}
			
		
		if (!empty($error)) echo $error;
		
	}else{
		$_SESSION['erro'] = "<div class='alert alert-warning'><strong>Esse e-mail que você digitou não esta cadastrado em nosso sistema,digite o e-mail certo !</strong></div>";
			Header("location:form_valida_email.php"); // Redireciona para pagina para tentar colocar a email novamente para validar novamente.
		
	}
	
	
	
		
	

?>