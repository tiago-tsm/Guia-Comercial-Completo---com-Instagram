<?php
require('conexao.php');

//Variavel $nome recebe valor passado campo nome do post
$appvalidation= mysqli_real_escape_string($conexao,$_REQUEST["appvalidation"]);

//Se variavel nome for vazia escreve - nada para ver aqui curioso
if ($appvalidation==''){
	echo "ACESSO RESTRITO";
	exit;
}else{
	
// COMANDO SQL
$consulta = "SELECT * FROM `cidades` order by cidade";
$query = mysqli_query($conexao,$consulta) or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
	$resultado .="<option value=\"\">Selecione uma Cidade</option>";
	while ($cidades = mysqli_fetch_assoc($query)){
		$resultado .="<option value=\"".$cidades['id']."\">".$cidades['cidade']." - ".$cidades['estado']."</option>";
		
	} 
	}
	
	if ($quantos<1) {
		$resultado .="<option value=\"\">Nenhuma cidade instalada</option>";
		
	}
	
} else {
	$resultado = 0;
}
	
	echo $resultado;
	
}

?>