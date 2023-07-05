<?php
require('conexao.php');

$valida= ($_POST["chave"]);
$cidade= ($_POST["cidade"]);

if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{
	
$puxar="SELECT * FROM `destaques` order by id";
$query = mysqli_query($conexao,$puxar)or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
		while ($dados = mysqli_fetch_assoc($query)){
			$idAnun=$dados['anunciante'];
			$xpuxar="SELECT * FROM `anunciantes` where id='$idAnun' and cidade='$cidade'";
			$xquery = mysqli_query($conexao,$xpuxar)or die(mysqli_error());		
			$xdados = mysqli_fetch_assoc($xquery);
			
			$resultado.='<li>
					  <a href="#" class="item-link item-content item-anunc" data-anunciante="'.$xdados['id'].'" data-capa="'.$xdados['capa_perfil'].'" data-perfil="'.$xdados['imagem_perfil'].'" data-endereco="'.$xdados['endereco'].'" data-ligar="'.$xdados['telefone_ligar'].'" data-whats="'.$xdados['telefone_whats'].'" data-facebook="'.$xdados['facebook'].'" data-mapa="'.$xdados['mapa'].'" data-sobre="'.$xdados['descricao'].'">';
					  
					  if ($xdados['imagem_perfil']!==""){
						$resultado.='<div class="item-media "><img src="'.$caminho_site.'/dist/img/anunciantes/perfil/'.$xdados['imagem_perfil'].'" width="60" height="60"></div>';
					  }else{
						$resultado.='<div class="item-media "><img src="img/banners/camera.jpg" width="60" height="60"></div>';  
					  }	
						
						$resultado.='<div class="item-inner">
						  <div class="item-title"><b class="text-title">'.$xdados['nome'].'</b><br><i class="mdi mdi-phone text-title"></i> '.$xdados['telefone_ligar'].'</span><br><span><i class="mdi mdi-eye text-title"></i> '.$xdados['views'].'</span></div>						
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
							<div class="item-title"><center><b>Nenhum destaque </b></center></div>
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