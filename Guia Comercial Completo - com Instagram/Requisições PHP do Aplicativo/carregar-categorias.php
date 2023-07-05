<?php
require('conexao.php');

$valida= ($_POST["chave"]);

if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{
	
$puxar="SELECT * FROM `categorias` order by categoria";
$query = mysqli_query($conexao,$puxar)or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
		while ($dados = mysqli_fetch_assoc($query)){
			$icone=$dados['icone'];
			$icone = str_replace('"', "'", $icone);
			$resultado.='<li>
			
<a href="#" class="item-link item-content" data-nome="'.$dados['nome_categoria'].'" data-icone="'.$icone.'" data-categoria="'.$dados['id'].'">
						<div class="item-media text-title">'.$dados['icone'].'</div>
						<div class="item-inner">
						  <div class="item-title">'.$dados['nome_categoria'].'</div>						
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
							<div class="item-title"><center><b>Nenhuma categoria </b></center></div>
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