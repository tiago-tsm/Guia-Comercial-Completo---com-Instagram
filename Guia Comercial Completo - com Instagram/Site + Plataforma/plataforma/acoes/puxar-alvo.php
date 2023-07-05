<?php
require('../bd/conexao.php');

//Variavel $nome recebe valor passado campo nome do post
$vaiPara= $_POST["vaiPara"];
$cidade= $_POST["cidade"];

//Se variavel nome for vazia escreve - nada para ver aqui curioso
if ($vaiPara==''){
	echo "ACESSO RESTRITO";
	exit;
}else{

if ($vaiPara=="anunciante"){
	// COMANDO SQL
$consulta = "SELECT * FROM `anunciantes` where cidade='$cidade' order by nome";
$query = mysqli_query($conexao,$consulta) or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
	
	while ($anunciante = mysqli_fetch_assoc($query)){
		$resultado .="<option value=\"".$anunciante['id']."\">".$anunciante['nome']."</option>";
		
	} 
	}
	
	if ($quantos<1) {
		$resultado="<option value=\"\">Nenhum anunciante cadastrado</option>";
		
	}
	
} else {
	$resultado = 0;
}
	
	echo $resultado;
}


if ($vaiPara=="promocao"){
$aconsulta = "SELECT * FROM `promocoes` where cidade='$cidade' order by titulo";
$aquery = mysqli_query($conexao,$aconsulta) or die(mysqli_error());
$aquantos=mysqli_num_rows($aquery);

if ($aquery == true) {
	
	if ($aquantos>0){
	
	while ($promo = mysqli_fetch_assoc($aquery)){
		$resultado .="<option value=\"".$promo['id']."\">".$promo['titulo']."</option>";
		
	} 
	}
	
	if ($aquantos<1) {
		$resultado .="<option value=\"\">Nenhuma promoção cadastrada</option>";
		
	}
	
} else {
	$resultado = 0;
}
	
	echo $resultado;	
}

if ($vaiPara=="categoria"){
$bconsulta = "SELECT * FROM `categorias` order by nome_categoria";
$bquery = mysqli_query($conexao,$bconsulta) or die(mysqli_error());
$bquantos=mysqli_num_rows($bquery);

if ($bquery == true) {
	
	if ($bquantos>0){
	
	while ($categoria = mysqli_fetch_assoc($bquery)){
		$resultado .="<option value=\"".$categoria['id']."\">".$categoria['nome_categoria']."</option>";
		
	} 
	}
	
	if ($bquantos<1) {
		$resultado .="<option value=\"\">Nenhuma categoria cadastrada</option>";
		
	}
	
} else {
	$resultado = 0;
}
	
	echo $resultado;	
}
	

	
}

 ?>