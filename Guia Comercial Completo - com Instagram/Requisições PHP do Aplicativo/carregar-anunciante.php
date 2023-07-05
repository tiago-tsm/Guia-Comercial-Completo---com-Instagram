<?php
require('conexao.php');

$valida= $_POST["chave"];
$anunciante=$_POST["anunciante"];

if ($valida==''){
	echo "ACESSO NEGADO!";
	exit;
}else{
	
$puxar="SELECT * FROM `anunciantes` where id='$anunciante'";
$query = mysqli_query($conexao,$puxar)or die(mysqli_error());
$quantos=mysqli_num_rows($query);

if ($query == true) {
	
	if ($quantos>0){
				
		while ($dados = mysqli_fetch_assoc($query)){
			
			$viewsatuais=$dados['views'];
			$total=$viewsatuais+1;
		
		$atualizapuxar="UPDATE anunciantes SET views ='$total' where id='$anunciante'";
		$atualizaquery = mysqli_query($conexao,$atualizapuxar)or die(mysqli_error());
			
			$telefoneLigar=$dados['telefone_ligar'];
			$telefoneLigar = str_replace('(', "", $telefoneLigar);
			$telefoneLigar = str_replace(')', "", $telefoneLigar);
			$telefoneLigar = str_replace(' ', "", $telefoneLigar);
			$telefoneLigar = str_replace('-', "", $telefoneLigar);
			
			$telefoneWhats=$dados['telefone_whats'];
			$telefoneWhats = str_replace('(', "", $telefoneWhats);
			$telefoneWhats = str_replace(')', "", $telefoneWhats);
			$telefoneWhats = str_replace(' ', "", $telefoneWhats);
			$telefoneWhats = str_replace('-', "", $telefoneWhats);
			
			$resultado.='<div class="display-flex flex-direction-column justify-content-flex-end align-items-stretch full-height">';
		if ($dados['capa_perfil']==""){
          $resultado.='  <div class="flex-grow-1 display-flex flex-direction-column justify-content-flex-end card header-image no-margin" style="height:200px;background-image:url(\'img/banners/banner-default.jpg\')">';
		  }else{
			 $resultado.='<div class="flex-grow-1 display-flex flex-direction-column justify-content-flex-end card header-image no-margin" style="height:200px;background-image:url(\''.$caminho_site.'/dist/img/anunciantes/capas/'.$dados['capa_perfil'].'\')">'; 
		} 
		if ($dados['imagem_perfil']==""){	
		 $resultado.=' <center> <img width="120" height="120" src="img/banners/camera.jpg" class="card-content  scrim-heading no-margin" style="border:2px solid white;"></center>';
		}else{
			$resultado.=' <center> <img width="120" height="120" src="'.$caminho_site.'/dist/img/anunciantes/perfil/'.$dados['imagem_perfil'].'" class="card-content  scrim-heading no-margin" style="border:2px solid white;"></center>';
		}
              
            $resultado.='</div>';
		
					
           $resultado.='<div class="card no-margin">
              <div class="card-content card-content-padding">
			  <center><h1 class="text-title" style="text-transform: uppercase;"><b>'.$dados['nome'].'</b></h1>
                <p style="color:gray">'.$dados['endereco'].'<br><i class="mdi mdi-phone"></i>'.$dados['telefone_ligar'].'</p>
				
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
				if ($dados['facebook']==""){
				$resultado.='app.dialog.alert("Este anunciante não informou esse dado.","<b>OPS!</b>")';
				}else{
				$resultado.='window.open("'.$dados['facebook'].'", "_blank")';	
				}
										
				$resultado.='}
				</script>
				
				<div class="col-20">
				<!--INSTAGRAM-->
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
				if ($dados['instagram']==""){
				$resultado.='app.dialog.alert("Este anunciante não informou esse dado.","<b>OPS!</b>")';
				}else{
				$resultado.='window.open("'.$dados['instagram'].'", "_blank")';	
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
				if ($dados['mapa']==""){
				$resultado.='app.dialog.alert("Este anunciante não informou esse dado.","<b>OPS!</b>")';
				}else{
				$resultado.='window.open("'.$dados['mapa'].'", "_blank")';	
				}
										
				$resultado.='}
				</script>
				
				</div>
			</div>
				  
 
				</center>
              </div>
            </div>';
           
		   if ($dados['descricao']!==""){
		    $resultado.='<div class="card">
			<div class="block">
			<center>
			<h1 class="text-title" style="text-transform: uppercase;"><b>SOBRE A EMPRESA</b></h1>
			<p>'.$dados['descricao'].'</p>
						
				<br>
			</center>
			</div>
            </div>';
		   }
		   
          $resultado.='</div>';
		}	
	}else{
		//NENHUM PEDIDO AINDA
		$resultado.='<div class="card card-outline">
			  <div class="card-content card-content-padding"><center>Este anunciante não existe mais no aplicativo.</center></div>
			</div>';
	}
	
}else{
	$resultado=0; //NÃO DEU CERTO
}	

	echo $resultado;
	
}



?>