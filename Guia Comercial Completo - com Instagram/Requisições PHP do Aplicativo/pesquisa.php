<?php
require('conexao.php');

//Variavel $nome recebe valor passado campo nome do post
$pesquisa= mysqli_real_escape_string($conexao,$_REQUEST["pesquisa"]);
$cidade= mysqli_real_escape_string($conexao,$_REQUEST["cidade"]);
$appvalidation= mysqli_real_escape_string($conexao,$_REQUEST["appvalidation"]);


//Se variavel nome for vazia escreve - nada para ver aqui curioso
if ($appvalidation==''){
	echo "ACESSO RESTRITO!";
	exit;
}else{
	
// COMANDO SQL
$consulta = "SELECT * FROM `anunciantes` where (cidade='$cidade') and (nome LIKE '%".$pesquisa."%' OR descricao LIKE '%".$pesquisa."%') order by views";
$query = mysqli_query($conexao,$consulta) or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){	
		
		while ($aberto = mysqli_fetch_assoc($query)){
							$resultado.='<li>
					  <a href="#" class="item-link item-content item-anunc" data-anunciante="'.$aberto['id'].'" data-capa="'.$aberto['capa_perfil'].'" data-perfil="'.$aberto['imagem_perfil'].'" data-endereco="'.$aberto['endereco'].'" data-ligar="'.$aberto['telefone_ligar'].'" data-whats="'.$aberto['telefone_whats'].'" data-facebook="'.$aberto['facebook'].'" data-mapa="'.$aberto['mapa'].'" data-sobre="'.$aberto['descricao'].'">';
					  
					  if ($aberto['imagem_perfil']!==""){
						$resultado.='<div class="item-media "><img src="'.$caminho_site.'/dist/img/anunciantes/perfil/'.$aberto['imagem_perfil'].'" width="60" height="60"></div>';
					  }else{
						$resultado.='<div class="item-media "><img src="img/banners/camera.jpg" width="60" height="60"></div>';  
					  }	
						
						$resultado.='<div class="item-inner">
						  <div class="item-title"><b class="text-title">'.$aberto['nome'].'</b><br><i class="mdi mdi-phone text-title"></i> '.$aberto['telefone_ligar'].'</span><br><span><i class="mdi mdi-eye text-title"></i> '.$aberto['views'].'</span></div>						
						</div>
					  </a>
					</li>';
						   } 
	
	}
	
	if ($quantos<1) {
		$resultado .="<li><br><br><br><br><center><h1><i class='mdi mdi-magnify'></i></h1> <p>Nada encontrado para o termo <b>\"".$pesquisa."\"</b></p></center><br><br></li>";
		
	}
	
} else {
	$resultado = 0;
}
	
	echo $resultado;
	
}

?>