<?php
require('conexao.php');

$valida= ($_POST["chave"]);
$cidade= ($_POST["cidade"]);

if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{
	
function custom_echo($x, $length)
{
	utf8_encode($x);
  if(strlen($x)<=$length)
  {
    return $x;
  }
  else
  {
    $y=substr($x,0,$length) . '..';
    return $y;
  }
}

//PUXAR BANNER SUPERIOR	
$puxar="SELECT * FROM `banners` where cidade='$cidade' order by id";
$query = mysqli_query($conexao,$puxar)or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
		
			$resultado.=' <!--BANNER ANIMADO -->
						<div data-pagination=\'{"el": ".swiper-pagination"}\' class="swiper-container swiper-init banner-swiper">
						 <div class="swiper-pagination"></div>
						  <div class="swiper-wrapper">';
						  
						  while ($banners = mysqli_fetch_assoc($query)){
				
				if($banners['vai_para']=="categoria"){
					$iddaCat=$banners['alvo'];
					//PEGAR A CATEGORIA
					$xcat_puxar="SELECT * FROM `categorias` where id='$iddaCat'";
					$xcat_query = mysqli_query($conexao,$xcat_puxar)or die(mysqli_error());
					$catdetail = mysqli_fetch_assoc($xcat_query);
					 $xicone=$catdetail['icone'];
					 $xicone = str_replace('"', "'", $xicone);
					
				$resultado.='<!--BANNER -->
							<div class="swiper-slide swip-banner" data-nome="'.$catdetail['nome_categoria'].'" data-icone="'.$xicone.'" data-alvo="'.$banners['vai_para'].'" data-id="'.$banners['alvo'].'"><center><img src="'.$caminho_site.'/dist/img/banners/'.$banners['imagem'].'" style="max-width:100%; max-height:100%"></center></div>';
				}else{
					$resultado.='<!--BANNER -->
							<div class="swiper-slide swip-banner"  data-alvo="'.$banners['vai_para'].'" data-id="'.$banners['alvo'].'"><center><img src="'.$caminho_site.'/dist/img/banners/'.$banners['imagem'].'" style="max-width:100%; max-height:100%"></center></div>';
				}
							}
																					
						  $resultado.='</div>
										</div> ';
			
	}else{
		//NENHUM BANNER AINDA (MOSTRAR PADRÃO)
		$resultado.='	<!--BANNER ANIMADO -->
						<div data-pagination=\'{"el": ".swiper-pagination"}\' class="swiper-container swiper-init banner-swiper">
						 <div class="swiper-pagination"></div>
						  <div class="swiper-wrapper">
						  
						  <!--BANNER 01 -->
							<div class="swiper-slide"><center><img src="img/banners/banner.jpg" style="max-width:100%; max-height:100%"></center></div>
																					
						  </div>
						</div>';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}	
/////FIM DO BANNER ////////////////////////

//PUXAR CATEGORIAS SLIDER
$cat_puxar="SELECT * FROM `categorias` order by categoria";
$cat_query = mysqli_query($conexao,$cat_puxar)or die(mysqli_error());
$cat_quantos=mysqli_num_rows($cat_query);

if ($cat_query == true) {
	
	if ($cat_quantos>0){
		
			$resultado.=' <!--CATEGORIAS SLIDER -->
						<div data-pagination=\'{"el": ".swiper-pagination"}\' data-space-between="10" data-slides-per-view="5" class="swiper-container swiper-init icon-swiper skin"> 
							<div class="swiper-wrapper tema-azul" style="text-align:center;">';
						  
						  while ($categoria = mysqli_fetch_assoc($cat_query)){
							  $icone=$categoria['icone'];
							$icone = str_replace('"', "'", $icone);
				$resultado.='<!-- ICONE -->
							  <div class="swiper-slide swip-categoria" data-nome="'.$categoria['nome_categoria'].'" data-icone="'.$icone.'" data-categoria="'.$categoria['id'].'">
							  <center>
								  <div class="circle">
								  <div class="circle__inner">
									<div class="circle__wrapper">
									  <div class="circle__content">'.$categoria['icone'].'</div>
									</div>
								  </div>
								</div>
								<b class="text-white" style="font-size:10px;white-space: nowrap;" >'.custom_echo($categoria['nome_categoria'],12).'</b>
							   </center>	
							  </div>';
							}
																					
						  $resultado.='</div>
										</div> ';
			
	}else{
		//NENHUMA CATEGORIA AINDA
		$resultado.='';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}	
/////FIM CATEGORIAS SLIDER ////////////////////////

//PUXAR DESTAQUES SLIDER /////////////////
$dest_puxar="SELECT * FROM `destaques` where cidade='$cidade' order by id";
$dest_query = mysqli_query($conexao,$dest_puxar)or die(mysqli_error());
$dest_quantos=mysqli_num_rows($dest_query);

if ($dest_query == true) {
	
	if ($dest_quantos>0){

		
			$resultado.='<div class="card card-outline" style="border-radius: 5%;">
						  <div class="card-content card-content-padding">
							<center><b class="text-title"><i class="mdi mdi-star"></i> DESTAQUE </b>
							<br><span style="color:gray">Conheça as melhores empresas</span><br><br>
							
							<!-- DESTAQUE -->
					<div data-pagination=\'{"el": ".swiper-pagination"}\' data-space-between="20" data-slides-per-view="2" class="swiper-container swiper-init destaque-swiper">
					<div class="swiper-pagination"></div>
				  
				
				  <div class="swiper-wrapper">';				  
				  while ($destaque = mysqli_fetch_assoc($dest_query)){
					$idAnunc=$destaque['anunciante'];
					//PUXAR O ANUNCIANTE
					$anunc_puxar="SELECT * FROM `anunciantes` where id='$idAnunc' and cidade='$cidade'";
					$anunc_query = mysqli_query($conexao,$anunc_puxar)or die(mysqli_error());
					$an_quantos=mysqli_num_rows($anunc_query);
					$anunciante=mysqli_fetch_assoc($anunc_query);	
					
						$resultado.='<!--DESTAQUE -->
					<div class="swiper-slide swip-destaque" data-anunciante="'.$anunciante['id'].'"><center><img src="'.$caminho_site.'/dist/img/anunciantes/perfil/'.$anunciante['imagem_perfil'].'" style="max-width:100%; max-height:100%;border:1px solid #d2d2d2;"><b class="text-title">'.$anunciante['nome'].'</b><br>'.$anunciante['telefone_ligar'].'</center></div>';
										
					  
				    
					}
					
					
				  $resultado.='</div>
								</div>
							</center>
						  </div>
						</div>';
						  
						  
				
			
	}else{
		//NENHUMA CATEGORIA AINDA
		$resultado.='';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}
/////FIM DESTAQUE SLIDER ////////////////////////

//PUXAR PROMOÇÕES SLIDER /////////////////
$promo_puxar="SELECT * FROM `promocoes` where cidade='$cidade' order by id";
$promo_query = mysqli_query($conexao,$promo_puxar)or die(mysqli_error());
$promo_quantos=mysqli_num_rows($promo_query);

if ($promo_query == true) {
	
	if ($promo_quantos>0){
		
			$resultado.='<div class="card card-outline" style="border-radius: 5%;">
						  <div class="card-content card-content-padding">
							<center><b class="text-title"><i class="mdi mdi-bullhorn"></i> PROMOÇÕES</b>
							<br><span style="color:gray">Conheça as melhores promoções</span><br><br>
							
							<!-- DESTAQUE -->
					<div data-pagination=\'{"el": ".swiper-pagination"}\' data-space-between="20" data-slides-per-view="2" class="swiper-container swiper-init promocoes-swiper">
				  <div class="swiper-pagination"></div>
				  
				
				  <div class="swiper-wrapper">';
				  
				  while ($promocoes = mysqli_fetch_assoc($promo_query)){
					  
					  $hoje=date('Y-m-d');
					$data_vencimento=$promocoes['data_vencimento'];					
					$nova_data = explode("/", $data_vencimento);
					$vencimento=$nova_data[2] . "-" . $nova_data[1] . "-" . $nova_data[0];
					
					$qualehID=$promocoes['id'];
					
					//SE HOJE FOR MAIOR QUE VENCIMENTO
					if(strtotime($hoje) > strtotime($vencimento)){
								//VENCIDO
							$deleteconsulta = "DELETE FROM promocoes WHERE id='$qualehID'";
							$deletequery = mysqli_query($conexao,$deleteconsulta) or die(mysqli_error());
							
							//DELETAR BANNER
							$xdeleteconsulta = "DELETE FROM banners WHERE vai_para='promocao' and alvo='$qualehID'";
							$xdeletequery = mysqli_query($conexao,$xdeleteconsulta) or die(mysqli_error());
							$resultado.='<center><b>Em Breve...</b></center>';
					}else{	
					$resultado.='<div class="swiper-slide swip-promocao" data-promotion="'.$promocoes['id'].'"><center><img src="'.$caminho_site.'/dist/img/promocoes/'.$promocoes['imagem'].'" style="max-width:100%; max-height:100%"><b class="text-title">'.$promocoes['titulo'].'</b><br>';
					
					if ($promocoes['desconto']==""){
					$resultado.='</center></div>';	
					}else{
					$resultado.=''.$promocoes['desconto'].' </center></div>';	
					}
					
					
					}
										  
				    
					}
					
					
				  $resultado.='</div>
								</div>
							</center>
						  </div>
						</div>';
						  
						  
				
			
	}else{
		//NENHUMA CATEGORIA AINDA
		$resultado.='';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}


	echo $resultado;
	
}



?>