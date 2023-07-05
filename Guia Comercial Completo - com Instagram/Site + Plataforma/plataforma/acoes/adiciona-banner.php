<?php
require('../bd/conexao.php');
session_start();
if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_POST['alvo']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../banners.php"); exit;
	
}else{

$usuario=$_SESSION['LoginUsuario'];	

//CAPA
if(!empty($_FILES['imagemBanner']['name'])){
$ext_imagemBanner = strtolower(substr($_FILES['imagemBanner']['name'],-4)); //Pegando extensão do arquivo
$new_name_imagemBanner = date("Y.m.d-H.i.s") . $ext_imagemBanner; //Definindo um novo nome para o arquivo
$dir_imagemBanner = '../dist/img/banners/'; //Diretório para uploads

//MOVENDO CAPA 
move_uploaded_file($_FILES['imagemBanner']['tmp_name'], $dir_imagemBanner.$new_name_imagemBanner); //Fazer upload do arquivo
}else{
header("Location: ../banners.php?result=semimagem"); exit;
}

$cidade=$_POST['cidadeBanner'];
$vaiPara=$_POST['vaiPara'];
$alvo=$_POST['alvo'];


$hoje=date('d/m/Y');

$inserir="INSERT INTO `banners` (imagem,cidade,vai_para,alvo,data) value ('$new_name_imagemBanner','$cidade','$vaiPara','$alvo','$hoje')";

$query = mysqli_query($conexao,$inserir) or die(mysqli_error());

if ($query == true) {
	header("Location: ../banners.php?result=ok"); exit;
}else{
	header("Location: ../banners.php?result=fail"); exit;
}
	
} 

 ?>