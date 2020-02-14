<?php

//DADOS DE ACESSO AO BANCO DE DADOS
$banco ="agenda";
$usuario = "root";
$senha = "";
$host = "localhost";

//REALIZANDO A CONEXÃO COM O BANCO DE DADOS
$conexao = mysqli_connect($host,$usuario,$senha,$banco);

//TESTANDO A CONEXÃO
if (!($conexao)){
    
	echo "<script> 
			alert ('Erro ao conectar com o banco de dados!');
		</script>";
    exit;
	
} else {
	
	//SETANDO A CODIFICAÇÃO DE CARACTERES PADRÃO DO SISTEMA
	mysqli_set_charset($conexao, "utf8");

}

?>