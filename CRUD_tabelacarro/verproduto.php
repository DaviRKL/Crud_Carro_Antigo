<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title> CRUD - PHP com mysqli </title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<body>

<div class="topnav" align= center>
	<a href="index.php">In√≠cio</a>
	<a href='inclusao.php'>Incluir</a>
	<a href='consulta.php'>Consultar</a>
	<a class="active" href='geral.php'>Consulta Geral</a>
	<a href='alteracao.php'>Alterar</a>
	<a href='exclusao.php'>Excluir</a>
	</div>
	

<?php

	function convertedata($data){
		
		$novadata = new DateTime($data);
		return $novadata->format("d/m/Y");
	}

	include_once('conexao.php');
	// recuperando a informaÁ„o da URL
	// verifica se par‚metro est· correto e dento da normalidade 
	if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
			$id = base64_decode($_GET['id']);
	} else {
		header('Location: index.php');
	}
	// realizando a pesquisa com o id recebido
	$query = mysqli_query($conexao,"select * from tabelacarro where id = $id");

	if (!$query) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inv√°lida:</b>' . @mysqli_error($conexao)); 
	}

	$dados=mysqli_fetch_array($query);
	
	echo "<table border='1px' align=center><td width='250px'>";
	if (empty($dados['foto'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $dados['foto'];
		}
	
	echo "<img src='imagens/$imagem'>";
	echo "<td width='500px' align= center>";
	
	//echo "<b>Data: </b>".convertedata($dados['data'])."<br><br>";	
	echo "<b>Id: </b>".$dados['id']."<br>";
	echo "<b>Marca: </b>".$dados['modelo']."<br>";
	echo "<b>Modelo: </b>".$dados['marca']."<br>";	
	echo "<b>Ano: </b>".$dados['ano']."<br>";	
	echo "<b>Data de cadastro: </b>".convertedata($dados['datacad'])."<br>";
	echo "</td></tr></table>";
	
	mysqli_close($conexao);
?>
<br>
<input type='button' onclick="window.location='geral.php';" value="Voltar">
</body>
</html>
