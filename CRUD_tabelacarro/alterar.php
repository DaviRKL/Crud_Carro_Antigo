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
		<a class="active" href='alteracao.php'>Alterar</a>
		<a href='exclusao.php'>Excluir</a>
	</div>
	<h3 align = center> Tabela CRUD sobre Carros - Alteração</h3>
<?php
	include_once('conexao.php');

	$id= $_POST['id'];
	$modelo= $_POST['modelo'];	
	$marca = $_POST['marca'];	
	$ano = $_POST['ano'];	
	$datacad = $_POST['datacad'];
	
	
$target_dir = "imagens/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["foto"]["tmp_name"]);
if($check !== false) {
echo "O arquivo é uma imagem - " . $check["mime"] . ".";
$uploadOk = 1;
} 
else {
echo "O arquivo não é imagem.";
$uploadOk = 0;
}
}

if ($_FILES["foto"]["size"] > 5000000) {
echo "Desculpe, seu arquivo é muito grande.";
$uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Desculpe, somente arquivos JPG, JPEG, PNG & GIF são aceitos.";
$uploadOk = 0;
}

if ($uploadOk == 0) {
echo "Desculpe, não foi feito o upload do seu arquivo.";
$sqlupdate = "update tabelacarro set modelo='$modelo', marca='$marca', ano='$ano', datacad='$datacad'  where id=$id";

}
 else {
if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
echo "O upload de ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " foi concluído.<br>";
		
$sqlupdate = "update tabelacarro set modelo='$modelo', marca='$marca', ano='$ano', datacad='$datacad', foto='$foto' where id=$id";


} else {
echo "Desculpe, ocorreu um erro ao fazer o upload do seu arquivo.";
}
}
	$resultado = @mysqli_query($conexao, $sqlupdate);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		echo "Registro Alterado com Sucesso";
	} 
	mysqli_close($conexao);
?>
<br><br>
	<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
</body>
</html>
