<?php
require('conexao.php');

$cidade= $_POST["cidade"];
$valida= $_POST["chave"];


if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{

$hoje=date('Y-m-d');
	
	// COMANDO PROMOCOES
$promoconsulta = "SELECT * FROM `promocoes` where cidade='$cidade'";
$promoquery = mysqli_query($conexao,$promoconsulta) or die(mysqli_error());
$promoquantos=mysqli_num_rows($promoquery);

if ($promoquery == true) {
	
	if ($promoquantos>0){
		
		
						  while ($promo = mysqli_fetch_assoc($promoquery)){
							
							$resultado.='<div class="card demo-card-header-pic" data-promotion="'.$promo['id'].'">
							  <div style="background-image:url('.$caminho_site.'/dist/img/promocoes/'.$promo['imagem'].')" class="card-header align-items-flex-end">';
							  
							  if ($promo['desconto']==""){
								  //NADA
							  }else{
								$resultado.='<b class="badge color-green">'.$promo['desconto'].'</b>';  
							  }
							  
							  
							  $resultado.='</div>
							  <div class="card-content card-content-padding">
								<p class="date"><b style="color:black;">'.$promo['titulo'].'</b></p>
								
							  </div>
							  <div class="card-footer">Válida até '.$promo['data_vencimento'].'</div>
							</div><br>';
							
						  }
						  
						  $resultado.='<script>
						  $(".card").on("click",function(){
													var id=$(this).attr("data-promotion");
													localStorage.setItem("idPromocao",id);													
													app.views.main.router.navigate("/promocao/");
												});
									</script> ';
		
	}else{
		$resultado.='<div class="card card-outline">
  <div class="card-content card-content-padding"><center>Nenhuma promoção no momento</center></div>
</div>';
	}
	
}

	
	
	echo $resultado;
	
}

?>