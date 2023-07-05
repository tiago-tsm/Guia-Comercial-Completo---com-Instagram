<?php
require('../bd/conexao.php');
session_start();
if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_POST['nomeAnunciante']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../anunciantes.php"); exit;
	
}else{

$usuario=$_SESSION['LoginUsuario'];	

//CAPA
if(!empty($_FILES['capa']['name'])){
$ext_capa = strtolower(substr($_FILES['capa']['name'],-4)); //Pegando extensão do arquivo
$new_name_capa = date("Y.m.d-H.i.s") . $ext_capa; //Definindo um novo nome para o arquivo
$dir_capa = '../dist/img/anunciantes/capas/'; //Diretório para uploads

//MOVENDO CAPA 
move_uploaded_file($_FILES['capa']['tmp_name'], $dir_capa.$new_name_capa); //Fazer upload do arquivo
}else{
$new_name_capa="";	
}

//PERFIL
if(!empty($_FILES['perfil']['name'])){
$ext_perfil = strtolower(substr($_FILES['perfil']['name'],-4)); //Pegando extensão do arquivo
$new_name_perfil = date("Y.m.d-H.i.s") . $ext_perfil; //Definindo um novo nome para o arquivo
$dir_perfil = '../dist/img/anunciantes/perfil/'; //Diretório para uploads

//MOVENDO PERFIL 
move_uploaded_file($_FILES['perfil']['tmp_name'], $dir_perfil.$new_name_perfil); //Fazer upload do arquivo
}else{
$new_name_perfil="";	
}

$anunciante=$_POST['nomeAnunciante'];
$cidade=$_POST['cidade'];
$categoria=$_POST['categoria'];
$telefoneChamadas=$_POST['telefoneChamadas'];
$telefoneWhats=$_POST['telefoneWhats'];
$linkFacebook=$_POST['linkFacebook'];
$linkInstagram=$_POST['linkInstagram'];
$enderecoCompleto=$_POST['enderecoCompleto'];
$linkMapa=$_POST['linkMapa'];
$descricaoEmpresa=$_POST['descricaoEmpresa'];

$hoje=date('d/m/Y');

$inserir="INSERT INTO `anunciantes` (nome,categoria,cidade,imagem_perfil,capa_perfil,telefone_ligar,telefone_whats,facebook,instagram,mapa,endereco,descricao,views,data_cadastro) value ('$anunciante','$categoria','$cidade','$new_name_perfil','$new_name_capa','$telefoneChamadas','$telefoneWhats','$linkFacebook','$linkInstagram','$linkMapa','$enderecoCompleto','$descricaoEmpresa','0','$hoje')";

$query = mysqli_query($conexao,$inserir) or die(mysqli_error());

if ($query == true) {
	header("Location: ../anunciantes.php?result=ok"); exit;
}else{
	header("Location: ../anunciantes.php?result=fail"); exit;
}
	
} 

 ?>