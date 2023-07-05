<?php
require('conexao.php');

$valida= ($_POST["chave"]);
$categoria= ($_POST["categoria"]);
$cidade= ($_POST["cidade"]);

if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{
	
$puxar="SELECT * FROM `anunciantes` where categoria='$categoria' and cidade='$cidade' order by views desc";
$query = mysqli_query($conexao,$puxar)or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
		while ($dados = mysqli_fetch_assoc($query)){
			$resultado.='<li>
					  <a href="#" class="item-link item-content item-anunc" data-anunciante="'.$dados['id'].'" data-capa="'.$dados['capa_perfil'].'" data-perfil="'.$dados['imagem_perfil'].'" data-endereco="'.$dados['endereco'].'" data-ligar="'.$dados['telefone_ligar'].'" data-whats="'.$dados['telefone_whats'].'" data-facebook="'.$dados['facebook'].'" data-mapa="'.$dados['mapa'].'" data-sobre="'.$dados['descricao'].'">';
					  
					  if ($dados['imagem_perfil']!==""){
						$resultado.='<div class="item-media "><img src="'.$caminho_site.'/dist/img/anunciantes/perfil/'.$dados['imagem_perfil'].'" width="60" height="60"></div>';
					  }else{
						$resultado.='<div class="item-media "><img src="img/banners/camera.jpg" width="60" height="60"></div>';  
					  }	
						
						$resultado.='<div class="item-inner">
						  <div class="item-title"><b class="text-title">'.$dados['nome'].'</b><br><i class="mdi mdi-phone text-title"></i> '.$dados['telefone_ligar'].'</span><br><span><i class="mdi mdi-eye text-title"></i> '.$dados['views'].'</span></div>						
						</div>
					  </a>
					</li>';
		}	
	}else{
		//NENHUM PEDIDO AINDA
		$resultado.='<li> 
					  <a href="#" id="novoLink" class="item-link item-content">
						<div class="item-inner">
						  <div class="item-title-row">
							<div class="item-title"><center><b>Nenhum anunciante ainda </b></center></div>
							 </div>						  
						</div></a>
						</li>';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}	

	echo $resultado;
	
}



?>