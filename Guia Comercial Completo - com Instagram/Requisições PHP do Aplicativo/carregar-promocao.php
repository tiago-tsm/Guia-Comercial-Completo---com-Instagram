<?php
require('conexao.php');

$valida= $_POST["chave"];
$promocao=$_POST["promocao"];

if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{
	
$puxar="SELECT * FROM `promocoes` where id='$promocao'";
$query = mysqli_query($conexao,$puxar)or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
				
		while ($dados = mysqli_fetch_assoc($query)){
			
			$anunciante=$dados['anunciante'];
					
			$apuxar="SELECT * FROM `anunciantes` where id='$anunciante'";
			$aquery = mysqli_query($conexao,$apuxar)or die(mysqli_error());
			$oanunc = mysqli_fetch_assoc($aquery);
						
			$telefoneLigar=$oanunc['telefone_ligar'];
			$telefoneLigar = str_replace('(', "", $telefoneLigar);
			$telefoneLigar = str_replace(')', "", $telefoneLigar);
			$telefoneLigar = str_replace(' ', "", $telefoneLigar);
			$telefoneLigar = str_replace('-', "", $telefoneLigar);
			
			$telefoneWhats=$oanunc['telefone_whats'];
			$telefoneWhats = str_replace('(', "", $telefoneWhats);
			$telefoneWhats = str_replace(')', "", $telefoneWhats);
			$telefoneWhats = str_replace(' ', "", $telefoneWhats);
			$telefoneWhats = str_replace('-', "", $telefoneWhats);
			
			$resultado.='<div class="display-flex flex-direction-column justify-content-flex-end align-items-stretch full-height">';
		if ($dados['imagem']==""){
          $resultado.='  <div class="flex-grow-1 display-flex flex-direction-column justify-content-flex-end card header-image no-margin" style="height:200px;background-image:url(\'img/banners/banner-default.jpg\')">';
		  }else{
			 $resultado.='<div class="flex-grow-1 display-flex flex-direction-column justify-content-flex-end card header-image no-margin" style="height:200px;background-image:url(\''.$caminho_site.'/dist/img/promocoes/'.$dados['imagem'].'\')">'; 
		} 
		
              
            $resultado.='</div>';
		
					
           $resultado.='<div class="card no-margin">
              <div class="card-content card-content-padding">
			  <center>
			   <b class="text-title" style="text-transform:uppercase;">'.$dados['titulo'].'</b><br>';
			   
			   if ($dados['desconto']==""){
				  //NADA AQUI 
			   }else{
				 $resultado.='<h1 class="badge" style="text-transform: uppercase;background:green;"><b style="color:white">'.$dados['desconto'].' </b></h1>';  
			   }
			  
			 $resultado.='<br>
			  
                <p style="color:gray"> <b class="text-title" style="text-transform:uppercase;">'.$oanunc['nome'].'</b><br>'.$oanunc['endereco'].'<br><i class="mdi mdi-phone"></i>'.$oanunc['telefone_ligar'].'</p>
				
				 <div class="block">
			<div class="row">
			
				<div class="col-20">
				<!--LIGAR-->
              <div class="circle" onclick="ligar()"><center>
			 
				  <div class="circle__inner">
					<div class="circle__wrapper">
					  <div class="circle__content"><i class="mdi mdi-phone"></i></div>
					</div>
				  </div>
				</div>
				<b class="text-title">Ligar</b>
				
			<!--\LIGAR-->
				</div>
				
				<script>
				function ligar(){
					window.open("tel:'.$telefoneLigar.'", "_blank");					
				}
				</script>
				
				<div class="col-20">
				<!--MENSAGEM-->
              <div class="circle" onclick="whats()">
				  <div class="circle__inner">
					<div class="circle__wrapper">
					  <div class="circle__content"><i class="mdi mdi-whatsapp"></i></div>
					</div>
				  </div>
				</div>
				<b class="text-title">Whats</b>
			<!--\MENSAGEM-->
				</div>
				
				<script>
				function whats(){
					window.open("https://api.whatsapp.com/send?phone=55'.$telefoneWhats.'&text=", "_blank");					
				}
				</script>
				
				<div class="col-20">
				<!--FACEBOOK-->
              <div class="circle" onclick="face()">
				  <div class="circle__inner">
					<div class="circle__wrapper">
					  <div class="circle__content"><i class="mdi mdi-facebook"></i></div>
					</div>
				  </div>
				</div>
				<b class="text-title">Face</b>
			<!--\FACEBOOK-->
				</div>
				
				<script>
				function face(){';
				if ($oanunc['facebook']==""){
				$resultado.='app.dialog.alert("Este anunciante não informou esse dado.","<b>OPS!</b>")';
				}else{
				$resultado.='window.open("'.$oanunc['facebook'].'", "_blank")';	
				}
										
				$resultado.='}
				</script>
				
					<div class="col-20">
				<!--FACEBOOK-->
              <div class="circle" onclick="insta()">
				  <div class="circle__inner">
					<div class="circle__wrapper">
					  <div class="circle__content"><i class="mdi mdi-instagram"></i></div>
					</div>
				  </div>
				</div>
				<b class="text-title">Insta</b>
			<!--\FACEBOOK-->
				</div>
				
				<script>
				function insta(){';
				if ($oanunc['instagram']==""){
				$resultado.='app.dialog.alert("Este anunciante não informou esse dado.","<b>OPS!</b>")';
				}else{
				$resultado.='window.open("'.$oanunc['instagram'].'", "_blank")';	
				}
										
				$resultado.='}
				</script>
				
				<div class="col-20">
				<!--MAPA-->
              <div class="circle" onclick="mapa()">
				  <div class="circle__inner">
					<div class="circle__wrapper">
					  <div class="circle__content"><i class="mdi mdi-google-maps"></i></div>
					</div>
				  </div>
				</div>
				<b class="text-title">Mapa</b>
			<!--\MAPA-->
				</div>
				
				<script>
				function mapa(){';
				if ($oanunc['mapa']==""){
				$resultado.='app.dialog.alert("Este anunciante não informou esse dado.","<b>OPS!</b>")';
				}else{
				$resultado.='window.open("'.$oanunc['mapa'].'", "_blank")';	
				}
										
				$resultado.='}
				</script>
				
				</div>
			</div>
				  
 
				</center>
              </div>
            </div>';
           
		   
		    $resultado.='<div class="card card-outline">
			<div class="block">
			<center>
			<h1 class="text-title" style="text-transform: uppercase;"><b>APRESENTE ESSE CUPOM:</b></h1>
			<p style="background:#cccccc;font-size:32px;padding:30px;border:6px dashed gray;"><b>'.$dados['codigo'].'</b></p>
						
				<br>
			</center>
			</div>
            </div>';
			
			$resultado.='<div class="card-outline">
			<div class="block">
			<center>
			<h1 class="text-title" style="text-transform: uppercase;"><b>INFORMAÇÕES:</b></h1>
			'.$dados['informacoes'].'
						
				<br>
			</center>
			</div>
            </div>';
		   
		   
          $resultado.='</div>';
		}	
	}else{
		//NENHUM PEDIDO AINDA
		$resultado.='<div class="card card-outline">
			  <div class="card-content card-content-padding"><center>Esta promoção não existe mais no aplicativo.</center></div>
			</div>';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}	

	echo $resultado;
	
}



?>