<?php 
	require('../sessao.php');
		
		$codigo_usu = $_GET['codigo_usu'];
	

		$sql = mysqli_query($conexao,"SELECT * FROM contato WHERE codigo_usu = $codigo_usu ORDER BY nome ASC");									
		$registros_sql = mysqli_fetch_assoc($sql);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGENDA</title>

<link href="../css/estilo.css" rel="stylesheet">

<!-- USANDO AJAX PARA MANIPULAR OS DADOS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<!-- FUNÇÃO JAVASCRIPT PARA CADASTRAR O PRODUTO -->
<script type="text/javascript">
      function ajax_cad_contato(){
		var nome = $('#nome').val();
        var celular = $('#celular').val();
        var email = $('#email').val();
		
          var url = 'ajax_cad_contato.php?codigo_usu=<?php echo $codigo_usu; ?>&nome='+nome+'&celular='+celular+'&email='+email;
          $.get(url, function(dataReturn) {
            $('#exibe_relatorio_contato').html(dataReturn);
          });
		  
		  $('#nome').val('');
		  $('#celular').val('');
		  $('#email').val('');
		  $('#nome').focus();		  

	  }
</script>

<script type="text/javascript">
      function ajax_pesquisa_contato(){
        var nome = $('#nome').val();
        if(descricao){
          var url = 'ajax_pesquisa_contato.php?nome='+nome+;
          $.get(url, function(dataReturn) {
            $('#exibe_relatorio_contato').html(dataReturn);
          });
        }
	  }
</script>

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

	<fieldset>
	        <fieldset class="grupo">
	            <div class="campo">
	                <label for="descricao"><NAV>NOME:</NAV></label>
	                <input type="text" id="nome" name="nome" style="width: 360px" required onKeyUp="ajax_pesquisa_contato()" onKeyDown="ajax_pesquisa_contato()" autofocus>
	            </div>
	            
	            <div class="campo">
	                <label for="valor_uni">NÚMERO DE CELULAR:</label>
	                <input type="text" id="celular" name="celular" style="width: 200px" required>
	            </div>
	            
	            <div class="campo">
	                <label for="estoque">E-MAIL:</label>
	                <input type="text" id="email" name="email" style="width: 200px" required>
	            </div>
				
				<button class="botao_salvar" type="submit" name="submit" onClick="ajax_cad_contato()" >Salvar</button>
				
			</fieldset>
	</fieldset>

	</div>
	<div id="exibe_relatorio_contato">
	<?php  if ($registros_sql != NULL) {
	
	?>
	<div class="estrutura_relatorio">
	<table width="939" border="0" align="center">
		       <tr height="40" bgcolor="#CCCCCC">
		           	<td width="350"><b>NOME</td>
		           	<td align="center" width="230"><b>NÚMERO DO CELULAR</td>
		           	<td align="center" width="250"><b>E-MAIL</td>
		            <td colspan="2" align="center" width="200"><b>OPÇÕES</td>
		       </tr> 
	</table>
	<div class="barra_rolagem_tabela">
	<table width="938" border="0" align="center">     
		                    
				<?php $x=0;?>
		        <?php do { if($x == 1){
		                   		
								$bg = "#CCCCCC";
		                        $ft = "#ffffff";
		                        }
		                        else{
		                            $bg = "#ffffff";
		                        	$ft = "#000000";
		                        }?>
								
		           <tr style="color=<?php echo $ft ?>" bgcolor="<?php echo $bg ?>" height="40">
		           
						<td align="center" width="350"><?php echo $registros_sql['nome'];?></td>
						<td align="center" width="230"><?php echo $registros_sql['celular'];?></td>            
						<td align="center" width="250"><?php echo $registros_sql['email'];?></td>
						
						<td align="center" width="50"><a href="remove_contato.php?codigo_contato=<?php echo $registros_sql['codigo'];?>&codigo_usu=<?php echo $codigo_usu ?>"><img src="../img/lixeira.png" width="25" height="25" style="cursor:pointer"/></a></td>
						<td align="center" width="50"><a href="edita_contato.php?codigo_contato=<?php echo $registros_sql['codigo'];?>&codigo_usu=<?php echo $codigo_usu ?>"><img src="../img/editar.png" width="25" height="25" style="cursor:pointer"/></a></td> 
		                            
		           </tr>
				<?php if ($x == 0)
						$x++;
						else
						$x = 0; }while ($registros_sql = mysqli_fetch_assoc($sql)); ?>            
	</table> 
	</div>       
	</div>
	<?php } else{ echo "<script> alert ('Sem CONTATOS!!!'); </script>"; } ?>
	</div>
</div>
</body>
</html>