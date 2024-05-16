<!DOCTYPE HTML>
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
		<a class="active" href='consulta.php'>Consultar</a>
		<a href='geral.php'>Consulta Geral</a>
		<a href='alteracao.php'>Alterar</a>
		<a href='exclusao.php'>Excluir</a>
	</div>
<h3 align = center> Tabela CRUD sobre Carros - Consulta</h3>
<form name="produto" action="consultar.php" method="post" align = center>
<b>Insira o Id do carro para consultar:</b><br> <input type="number" name="id" style="width:500px" required="required"><br><br>
<input type="submit" value="Ok">
<input type="reset" value="Limpar">
<input type='button' onclick="window.location='index.php';" value="Voltar">
</form>
</body>
</html>
