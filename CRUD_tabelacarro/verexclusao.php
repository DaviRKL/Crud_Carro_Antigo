<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title> CRUD - PHP com mysqli </title>
</head>
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
		<a href='geral.php'>Consulta Geral</a>
		<a href='alteracao.php'>Alterar</a>
		<a class="active" href='exclusao.php'>Excluir</a>
	</div>
	<h3 align = center> Tabela CRUD sobre Carros - Exclusão - Consulta do Produto</h3>

<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['id'];

	// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelacarro where id = $codigo";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		$num = @mysqli_num_rows($resultado);
		if ($num==0){
		echo "<b>Código: </b>não localizado !!!!<br><br>";
		echo '<input type="button" onclick="window.location='."'exclusao.php'".';" value="Voltar"><br><br>';
		exit;		
		}else{
			$dados=mysqli_fetch_array($resultado);
			unlink ('imagens/'.$dados['foto']);
		}
	} 
	if (empty($dados['foto'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $dados['foto'];
		}
$id = base64_encode($dados['id']);

	mysqli_close($conexao);
?>
<form name="produto" action="excluir.php" method="post" align = center>
<b>Id:</b><br> <input type="number"  style="width:500px" value="<?php echo $dados['id']; ?>"><br><br>
<b>Modelo:</b><br> <input type="text"   style="width:500px" value="<?php echo $dados['modelo']; ?>" ><br><br>
<b>Marca: </b><br><input type="text"   style="width:500px" value="<?php echo $dados['marca']; ?>" ><br><br>
<b>Ano: </b><br> <input type="date" style="width:500px" value="<?php echo $dados['ano']; ?>" ><br><br>
<b>DataCad:</b><br><input type="date" style="width:500px" value="<?php echo $dados['datacad']; ?>"> <br><br>
<b>Foto:</b><br><?php echo "<img src='imagens/$imagem'  >";?><br><br>

	<input type='hidden' name='id' value="<?php echo $dados['id']; ?>">
	<input type='submit' value='Apagar'>
	<input type='button' onclick="window.location='exclusao.php';" value="Voltar">
</form>
</body>
</html>
