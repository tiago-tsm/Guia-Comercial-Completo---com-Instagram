<?php
require('../bd/conexao.php');
session_start();
if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_POST['tituloPromocao']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../promocoes.php"); exit;
	
}else{

$usuario=$_SESSION['LoginUsuario'];	

//CAPA
if(!empty($_FILES['imagemPromocao']['name'])){
$ext_imagemPromocao = strtolower(substr($_FILES['imagemPromocao']['name'],-4)); //Pegando extensão do arquivo
$new_name_imagemPromocao = date("Y.m.d-H.i.s") . $ext_imagemPromocao; //Definindo um novo nome para o arquivo
$dir_imagemPromocao = '../dist/img/promocoes/'; //Diretório para uploads

//MOVENDO CAPA 
move_uploaded_file($_FILES['imagemPromocao']['tmp_name'], $dir_imagemPromocao.$new_name_imagemPromocao); //Fazer upload do arquivo
}else{
$new_name_imagemPromocao="";	
}


$titulo=$_POST['tituloPromocao'];
$oanunciante=$_POST['anunciante'];

//PARA PEGAR A CIDADE
$zxconsulta = "SELECT * FROM `anunciantes` WHERE id='$oanunciante'";
$zxquery = mysqli_query($conexao,$zxconsulta) or die(mysqli_error());
$anunciante = mysqli_fetch_assoc($zxquery);
$cidade=$anunciante['cidade'];

$codigo=$_POST['codigoCupom'];
$datavalidade=$_POST['dataValidade'];
$desconto=$_POST['desconto'];
$informacaoPromocao=$_POST['informacaoPromocao'];

$hoje=date('d/m/Y');

$inserir="INSERT INTO `promocoes` (imagem,titulo,anunciante,cidade,codigo,desconto,informacoes,data_inicio,data_vencimento) value ('$new_name_imagemPromocao','$titulo','$oanunciante','$cidade','$codigo','$desconto','$informacaoPromocao','$hoje','$datavalidade')";

$query = mysqli_query($conexao,$inserir) or die(mysqli_error());

if ($query == true) {
	header("Location: ../promocoes.php?result=ok"); exit;
}else{
	header("Location: ../promocoes.php?result=fail"); exit;
}
	
} 

 ?>