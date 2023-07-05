<?php
require('../bd/conexao.php');
session_start();

if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../login.html"); exit;
	
	}; 
	
if ($_GET['ref']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: ../configuracoes.php"); exit;
	
}; 	

$usuario=$_SESSION['LoginUsuario'];
$id=$_GET['ref'];

$deleta="DELETE FROM usuarios_administrativos WHERE id='$id'";
		$dquery = mysqli_query($conexao,$deleta)or die(mysqli_error());

if ($dquery == true) {
	header("Location: ../configuracoes.php?result=deleted"); exit;
}else{
	header("Location: ../configuracoes.php?result=fail"); exit;
}

?>