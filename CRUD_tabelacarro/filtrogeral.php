<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> CRUD - PHP com mysqli </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<body>
<style>
img{
	border:4px solid ;
	color: #3DDDDF;
	width:400px;
}
</style>
<div class="topnav" align= center>
		<a href="index.php">Início</a>
		<a href='inclusao.php'>Incluir</a>
		<a href='consulta.php'>Consultar</a>
		<a class="active" href='geral.php'>Consulta Geral</a>
		<a href='alteracao.php'>Alterar</a>
		<a href='exclusao.php'>Excluir</a>
	</div>
	<h3 align = center> Tabela CRUD sobre Carros - Consulta</h3>
<?php
	include_once('conexao.php');
	
	$sqlmarca =$_POST['cars'];
	$sqlordem = "select * from tabelacarro where marca like '$sqlmarca'";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlordem);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		$num = @mysqli_num_rows($resultado);
		if ($num==0){
		echo "<b>Marca: </b>não localizado !!!!<br><br>";
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		exit;
		}
		
        else{
echo "<table border='1px' align= center>";
	echo "<tr>
	<th width='30px' align='center'>Id</th>
	<th width='100px'>Modelo</th>
	<th width='250px'>Marca</th>
	<th width='100px'>Ano</th>
	<th width='100px'>DataCad</th>
	<th width='100px'>Foto</th>
	<tr>";			
		while($dados=mysqli_fetch_array($resultado)) 
		{
		echo "<tr>";
		echo "<td align='center'>". $dados['id']."</td>";
		echo "<td>". $dados['modelo']."</td>";
		echo "<td>". $dados['marca']."</td>";
		echo "<td>". $dados['ano']."</td>";
		echo "<td align='center'>". $dados['datacad']."</td>";		
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
	}}
	echo "</table>";
	
	mysqli_close($conexao);
?>

		
<input type='button' onclick="window.location='index.php';" value="Voltar" style= "color: #106A72 ">
</body>
</html>
