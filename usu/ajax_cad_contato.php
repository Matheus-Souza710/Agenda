<?php 
	require('../sessao.php');
	
	$codigo_usu = $_GET['codigo_usu'];
	$nome = $_GET['nome'];
	$celular = $_GET['celular'];
	$email = $_GET['email'];
	
	
	$sql = mysqli_query($conexao,"INSERT INTO contato (codigo_usu, nome, celular, email) VALUES ($codigo_usu,'".$nome."', '$celular', '$email')");
			
	if ($sql){
		
		echo "<script> alert ('Operação Realizada Com Sucesso!');</script>";	

	}else{
		echo "<script> alert ('ERRO: Operação NÃO Realizada!');</script>";
		
		
	}
	
	$sql = mysqli_query($conexao,"SELECT * FROM contato WHERE codigo_usu = $codigo_usu ORDER BY nome ASC");									
	$registros_sql = mysqli_fetch_assoc($sql);
	$num_linhas = mysqli_num_rows ($sql);

		if (mysqli_num_rows ($sql) < 1) {
			
			echo "<script> alert ('ERRO: Operação NÃO Realizada!');</script>";
			echo "<script> window.location.href='index.php';</script>";
			
		}
	
?>
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
<?php } else{ echo "<script> alert (sem contatos na agenda!!'); </script>"; } ?>