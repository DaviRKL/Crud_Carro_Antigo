<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
</head>
<title> CRUD - PHP com mysqli </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<body>

<div class="topnav" align= center>
		<a href="index.php">Início</a>
		<a href='inclusao.php'>Incluir</a>
		<a href='consulta.php'>Consultar</a>
		<a href='geral.php'>Consulta Geral</a>
		<a href='alteracao.php'>Alterar</a>
		<a class="active" href='exclusao.php'>Excluir</a>
	</div>
	
	<h3 align = center> Tabela CRUD sobre Carros - Exclusão - Consulta do Produto</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['id'];

	// criando a linha do  DELETE
	$sqldelete =  "delete from  tabelacarro where id = '$codigo'";
	
    		
	// executando instru��o SQL
	$resultado = @mysqli_query($conexao, $sqldelete);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		echo "Registro Excluído com Sucesso";
		
	} 
	mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='exclusao.php';" value="Voltar">
</body>
</html>
