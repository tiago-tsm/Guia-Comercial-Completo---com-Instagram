<?php
require('../bd/conexao.php');
session_start();
if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
$nomeUser=$_POST['nomeUser'];
$loginUser=$_POST['loginUser'];
$senhaUser=$_POST['senhaUser'];	
	
if ($_POST['nomeUser']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../configuracoes.php"); exit;
	
}else{

$usuario=$_SESSION['LoginUsuario'];	

$consulta = "SELECT * FROM `usuarios_administrativos` where login='$usuario'";
$query = mysqli_query($conexao,$consulta) or die(mysqli_error());
$usuario = mysqli_fetch_assoc($query);

$cargo=$usuario['cargo'];

if ($cargo=="Moderador"){
	header("Location: ../configuracoes.php?result=nopermission"); exit;
}else{
	

//VERIFICAR SE JÁ TEM AQUELE E-MAIL CADASTRADO
$Aconsulta = "SELECT * FROM `usuarios_administrativos` where login='$loginUser'";
$Aquery = mysqli_query($conexao,$Aconsulta) or die(mysqli_error());
$Aquantos=mysqli_num_rows($Aquery);

if ($Aquantos==1){
	header("Location: ../configuracoes.php?result=emailrepeat"); exit;
}else{
	$hoje=date('Y-m-d');

$inserir="INSERT INTO `usuarios_administrativos` (nome,login,senha,cargo,data_cadastro) value ('$nomeUser','$loginUser','$senhaUser','Moderador','$hoje')";

$query = mysqli_query($conexao,$inserir) or die(mysqli_error());

if ($query == true) {
	header("Location: ../configuracoes.php?result=ok"); exit;
}else{
	header("Location: ../configuracoes.php?result=fail"); exit;
}
}


	
	
}


	
} 

 ?>