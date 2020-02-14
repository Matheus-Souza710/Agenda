<?php 
	require('../sessao.php');
	
	$codigo_usu = $_GET ['codigo_usu'];
	$codigo_contato = $_GET['codigo_contato'];
	
	

	$sql = mysqli_query($conexao,"DELETE FROM contato WHERE codigo = $codigo_contato");
		
	
	if ($sql){
		
		echo "<script> alert ('Operação Realizada Com Sucesso!');</script>";
		echo "<script> window.location.href='index.php?codigo_usu=$codigo_usu';</script>\	";	

	}else{
		echo "<script> alert ('ERRO: Operação NÃO Realizada!');</script>";
		echo "<script> window.location.href='index.php?codigo_usu=$codigo_usu';</script>";
		
	}
	
?>