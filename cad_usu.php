<?php 
	require('conexao.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$sql = mysqli_query($conexao,"INSERT INTO usuario (nome, email, senha) values ('$nome', '$email', '$senha')");

	if ($sql){
		echo "<script> alert ('Operação Realizada Com Sucesso!');</script>";
		echo "<script> window.close(); </script>";

	}else{
		echo "<script> alert ('ERRO: Operação NÃO Realizada!');</script>";
	}

?>