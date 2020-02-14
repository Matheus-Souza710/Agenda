<?php 
	require('../sessao.php');
		
		$codigo_usu = $_GET['codigo_usu'];
		$codigo_contato = $_GET['codigo_contato'];
		

		$sql = mysqli_query($conexao,"SELECT * FROM contato WHERE codigo = $codigo_contato");
		$registros_sql = mysqli_fetch_assoc($sql);
			
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGENDA</title>

<link href="../css/estilo.css" rel="stylesheet">

</head>
<body>
<div id="wrap">
<div class="titulo_principal">AGENDA DE CONTATOS</div>
<div class="boa_vinda">
	<p id="nome_usu">
	<?php 
		echo $nome_usuario; 
	?>
	</p>
	<a href="../logout.php"><img src="../img/logout.png" style="width: 40px; height: 40px; cursor: pointer;"></a>
</div>

<div class="estrutura_form_contato">

<form action="atualiza_contato.php?codigo=<?php echo $registros_sql['codigo'];?>&codigo_usu=<?php echo $codigo_usu ?>" method="post">

<fieldset>
        <fieldset class="grupo">
 			       
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" style="width: 450px" required value="<?php echo $registros_sql['nome'];?>">
            </div>
            
            <div class="campo">
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="celular" style="width: 150px" required value="<?php echo $registros_sql['celular'];?>">
            </div>
            
            <div class="campo">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" style="width: 250px" required value="<?php echo $registros_sql['email'];?>">
            </div>

		</fieldset>

</fieldset>

<button class="botao_salvar" type="submit" name="submit">Atualizar</button>          

</form>
</div>
</div>
</body>
</html>
