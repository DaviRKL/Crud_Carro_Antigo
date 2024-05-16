<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title> CRUD - PHP com mysqli </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<body>

<div class="topnav" align= center>
		<a href="index.php">Início</a>
		<a class="active" href='inclusao.php'>Incluir</a>
		<a href='consulta.php'>Consultar</a>
		<a href='geral.php'>Consulta Geral</a>
		<a href='alteracao.php'>Alterar</a>
		<a href='exclusao.php'>Excluir</a>
	</div>
	<h3 align = center> Tabela CRUD sobre Carros - Inclusão</h3>

<form name="produto" action="incluir.php" enctype="multipart/form-data" method="post" align = center>
<b>Modelo: </b><br>  <input type="text" name="modelo" style="width:500px"  required="required" ><br><br>
<b>Marca: </b><br> <input type="text" name= "marca" style="width:500px"  required="required" ><br><br>
<b>Ano: </b><br>  <input type="number" name="ano" style="width:500px"  required="required" ><br><br>
<b>DataCad: </b><br> <input type="date" name="datacad" style="width:500px" value="<?php echo $dados['datacad']; ?>"  required="required" > <br><br>
<b>Foto: </b><br> <input type="file" name="foto" style="width:500px"> <br><br>

<input type="submit" value="Ok">
<input type="reset" value="Limpar">
<input type='button' onclick="window.location='index.php';" value="Voltar">
</form>
</body>
</html>
