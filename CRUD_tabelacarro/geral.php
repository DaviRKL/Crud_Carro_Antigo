<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<title> CRUD - PHP com mysqli </title>
<body>

<div class="topnav" align= center>
		<a href="index.php">Início</a>
		<a href='inclusao.php'>Incluir</a>
		<a href='consulta.php'>Consultar</a>
		<a class="active" href='geral.php'>Consulta Geral</a>
		<a href='alteracao.php'>Alterar</a>
		<a href='exclusao.php'>Excluir</a>
	</div>

<h3 align = center>Tabela CRUD sobre Carros - Consulta Geral</h3>
<p align = center>* Clique na imagem para ver detalhes</p>
<form method="post" action="filtrogeral.php" align= center>
<label for="cars">Escolha uma marca de carro:</label>
		<select id="cars" name="cars">
  <option name="cars" value="ford">Ford</option>
  <option name="cars" value="jeep">Jeep</option>
  <option name="cars" value="porsche">Porsche</option>
  <option name="cars" value="toyota">Toyota</option>
  <option name="cars" value="nissan">Nissan</option>

</select>
<input type="submit" value="Selecionar">
</form>

<?php
function convertedata($data){
		
		$novadata = new DateTime($data);
		return $novadata->format("d/m/Y");
	}

	include_once('conexao.php');
	
	// ajustando a instrução select para ordenar por produto
	$query = mysqli_query($conexao,"select * from tabelacarro order by id");

	if (!$query) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao));  
	}

	echo "<table border='1px' align= center>";
	echo "<tr>
	<th width='30px' align='center'>Id</th>
	<th width='100px'>Modelo</th>
	<th width='250px'>Marca</th>
	<th width='100px'>Ano</th>
	<th width='100px'>DataCad</th>
	<th width='100px'>Foto</th>
	<tr>";

	while($dados=mysqli_fetch_array($query)) 
	{
		echo "<tr>";
		echo "<td align='center'>". $dados['id']."</td>";
		echo "<td>". $dados['modelo']."</td>";
		echo "<td>". $dados['marca']."</td>";
		echo "<td>". $dados['ano']."</td>";
		echo "<td align='center'> ".convertedata($dados['datacad'])."</td>";		
		// buscando a na pasta imagem
		if (empty($dados['foto'])){
			$foto = 'SemImagem.png';
		}else{
			$foto = $dados['foto'];
		}
		$id = base64_encode($dados['id']);

		echo "<td align='center'><a href='verproduto.php?id=$id'><img src='imagens/$foto' width='50px' heigth='50px'></a>";
		echo "</tr>";
	}
	echo "</table>";
	
	mysqli_close($conexao);
?>
<br>
</body>
</html>
