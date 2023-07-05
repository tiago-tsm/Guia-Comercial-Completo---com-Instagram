<?php
require('../bd/conexao.php');
session_start();
if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_POST['anunciante']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../destaques.php"); exit;
	
}else{

$usuario=$_SESSION['LoginUsuario'];	
$oanunciante=$_POST['anunciante'];
$dataValidade=$_POST['dataValidade'];

$anunc_puxar="SELECT * FROM `anunciantes` where id='$oanunciante'";
$anunc_query = mysqli_query($conexao,$anunc_puxar)or die(mysqli_error());
$dadoanunciante=mysqli_fetch_assoc($anunc_query);	
$cidade=$dadoanunciante['cidade'];



$hoje=date('d/m/Y');

$inserir="INSERT INTO `destaques` (anunciante,cidade,data_inicio,data_validade) value ('$oanunciante','$cidade','$hoje','$dataValidade')";

$query = mysqli_query($conexao,$inserir) or die(mysqli_error());

if ($query == true) {
	header("Location: ../destaques.php?result=ok"); exit;
}else{
	header("Location: ../destaques.php?result=fail"); exit;
}
	
} 

 ?>