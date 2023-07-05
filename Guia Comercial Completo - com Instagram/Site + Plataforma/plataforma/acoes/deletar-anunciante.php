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

$deleta="DELETE FROM anunciantes WHERE id='$id'";
		$dquery = mysqli_query($conexao,$deleta)or die(mysqli_error());
		
$xdeleteconsulta = "DELETE FROM banners WHERE vai_para='anunciante' and alvo='$id'";
$xdeletequery = mysqli_query($conexao,$xdeleteconsulta) or die(mysqli_error());	

$zxdeleteconsulta = "DELETE FROM destaques WHERE anunciante='$id'";
$zxdeletequery = mysqli_query($conexao,$zxdeleteconsulta) or die(mysqli_error());	

$yxdeleteconsulta = "DELETE FROM promocoes WHERE anunciante='$id'";
$yxdeletequery = mysqli_query($conexao,$yxdeleteconsulta) or die(mysqli_error());

if ($dquery == true) {
	header("Location: ../anunciantes.php?result=deleted"); exit;
}else{
	header("Location: ../anunciantes.php?result=fail"); exit;
}

?>