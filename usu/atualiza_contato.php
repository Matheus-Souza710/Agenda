<?php 
	require('../sessao.php');
		
	$codigo_usu = $_GET['codigo_usu'];
	$codigo = $_GET['codigo'];
	$nome = $_POST['nome'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];
	
	
	$sql = mysqli_query($conexao,"UPDATE contato SET nome ='".$nome."', celular='$celular', email='$email' WHERE codigo = $codigo");
		
	
	if ($sql){
		
		echo "<script> alert ('Operação Realizada Com Sucesso!');</script>";
		echo "<script> window.location.href='index.php?codigo_usu=$codigo_usu';</script>";	

	}else{
		echo "<script> alert ('ERRO: Operação NÃO Realizada!');</script>";
		echo "<script> window.location.href='index.php?codigo_usu=$codigo_usu';</script>";
		
	}	
	
?>