<?php

require('conexao.php');


	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE email = '".$email."' AND senha = '".$senha."'");

	$registros_select = mysqli_fetch_assoc($sql);
	$codigo_usu = $registros_select['codigo'];

	if (mysqli_num_rows ($sql) > 0) {
   	
		session_start();
   		$_SESSION['email'] = $email;
    	$_SESSION['senha'] = $senha;
	
		
		echo "<script> 
				window.location.href='http://localhost/Agenda/usu?codigo_usu=$codigo_usu';
			</script>";			
  	}
  	else {
		
		echo "<script> alert ('ERRO: Usuário ou Senha Inválidos!');</script>";
		echo "<script> window.location.href='index.html';</script>";
  	}

?>