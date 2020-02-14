<?php 

require('conexao.php');

if (!isset($_SESSION)) {
	session_start();
}

if ( !isset($_SESSION['email']) ) {	
    //Destroi a sessão
    session_destroy();
 
    //Limpa
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
     
		echo "<script> 
					alert ('ERRO: Usuário Não Aunteticado!');
			</script>";
		echo "<script> 
					window.location.href='http://localhost/Agenda';
			</script>";
		
} else {
	
	$email=$_SESSION['email'];

	$sql = mysqli_query($conexao,"SELECT * FROM usuario WHERE email = '$email'");
	
	$registros = mysqli_fetch_assoc($sql);
	
	
	$nome_usuario = $registros['nome'];
	$email_usuario = $registros['email'];
}

?>