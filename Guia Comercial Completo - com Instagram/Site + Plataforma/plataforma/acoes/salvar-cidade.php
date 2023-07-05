<?php
require('../bd/conexao.php');
session_start();

//Login só para Testes
//$_SESSION['LoginUsuario']='oficina-exemplo';

if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_POST['nomeCidade']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../cidades.php"); exit;
	
}else{

$usuario=$_SESSION['LoginUsuario'];	

$cidade=$_POST['nomeCidade'];
$estado=$_POST['nomeEstado'];


$inserir="INSERT INTO `cidades` (cidade,estado) value ('$cidade','$estado')";
$query = mysqli_query($conexao,$inserir)or die(mysqli_error());

if ($query == true) {
	header("Location: ../cidades.php?result=ok"); exit;
}else{
	header("Location: ../cidades.php?result=fail"); exit;
}
	
} 	






?>