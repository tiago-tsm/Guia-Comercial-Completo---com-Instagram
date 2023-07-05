<?php
require('../bd/conexao.php');
session_start();

if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_GET['ref']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../anunciantes.php"); exit;
	
}; 	

$usuario=$_SESSION['LoginUsuario'];
$id=$_GET['ref'];

$deleta="DELETE FROM promocoes WHERE id='$id'";
		$dquery = mysqli_query($conexao,$deleta)or die(mysqli_error());
		
$xdeleteconsulta = "DELETE FROM banners WHERE vai_para='promocao' and alvo='$id'";
$xdeletequery = mysqli_query($conexao,$xdeleteconsulta) or die(mysqli_error());		

if ($dquery == true) {
	header("Location: ../promocoes.php?result=deleted"); exit;
}else{
	header("Location: ../promocoes.php?result=fail"); exit;
}

?>