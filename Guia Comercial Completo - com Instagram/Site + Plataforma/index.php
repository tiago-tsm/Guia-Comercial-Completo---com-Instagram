<?php
require('bd/conexao.php');

$xconsulta = "SELECT * FROM `destaques` order by id";
$xquery = mysqli_query($conexao,$xconsulta) or die(mysqli_error());
$xquantos=mysqli_num_rows($xquery);

$promoconsulta = "SELECT * FROM `promocoes` order by id desc";
$promoquery = mysqli_query($conexao,$promoconsulta) or die(mysqli_error());
$promoquantos=mysqli_num_rows($promoquery);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Guia Comercial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="shortcut icon" href="images/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/materialdesignicons.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="#" class=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">Seu telefone aqui</span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">email@seuemail.com</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black mb-0">Guia<span class="text-primary"><i class="mdi mdi-map-marker"></i> </span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#destaque-section" class="nav-link">Destaques</a></li>
                <li><a href="#promo-section" class="nav-link">Promoções</a></li>
                <li><a href="#app-section" class="nav-link">Aplicativo</a></li>
                <li><a href="https://wa.me/5549988070996?text=Ol%C3%A1.+Tenho+interesse+em+anunciar+no+guia+comercial.+Meu+nome+%C3%A9" target="_blank" class="nav-link">Anuncie</a></li>                
                <li><a href="plataforma/login.html" class="btn btn-black btn-outline-black ml-1 rounded-0">Login</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  
     
    <div class="site-blocks-cover overlay" style="background-image: url(images/banner-default.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row mb-4">
              <div class="col-md-12 text-center">
                <h1>O Melhor Guia Comercial!</h1>
                <p class="mb-5 lead">Seja bem-vindo ao melhor guia comercial de [cidade] e região!</p>
                <div>
                  <a href="https://wa.me/5549988070996?text=Ol%C3%A1.+Tenho+interesse+em+anunciar+no+guia+comercial.+Meu+nome+%C3%A9" target="_blank" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Anunciar</a>
                  <a href="#" class="btn btn-white py-3 px-5 rounded-0 d-block d-sm-inline-block">BAIXAR APLICATIVO</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  


    
    <div class="site-section" id="destaque-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Anunciantes Incríveis</h3>
            <h2 class="section-title mb-3">Nossos Destaques</h2>
            <p>Confira os melhores comerciantes de toda a região!</p>
          </div>
        </div>
        <div class="row">
				
		<?php if ($xquery == true) {
					if ($xquantos>0){
					while ($xdestaque = mysqli_fetch_assoc($xquery)){ 
					
					$idAnunciante=$xdestaque['anunciante'];
					$anuncianteconsulta = "SELECT * FROM `anunciantes` where id='$idAnunciante'";
					$anunciantequery = mysqli_query($conexao,$anuncianteconsulta) or die(mysqli_error());
					$puxaanunciante = mysqli_fetch_assoc($anunciantequery);
					
					$telefoneWhats=$puxaanunciante['telefone_whats'];
					$telefoneWhats = str_replace('(', "", $telefoneWhats);
					$telefoneWhats = str_replace(')', "", $telefoneWhats);
					$telefoneWhats = str_replace(' ', "", $telefoneWhats);
					$telefoneWhats = str_replace('-', "", $telefoneWhats);
									
					?>
	
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="product-item">
              <figure>
                <img src="<?php echo $caminho_site;?>/dist/img/anunciantes/perfil/<?php echo $puxaanunciante['imagem_perfil'];?>" alt="Image" class="img-fluid">
              </figure>
              <div class="px-4">
                <h3><a href="#"><b><?php echo $puxaanunciante['nome'];?></b></a></h3>
                <div class="mb-3">
                  <i class="mdi mdi-phone"></i> <?php echo $puxaanunciante['telefone_ligar'];?>
                </div>
                <p class="mb-4"><?php echo $puxaanunciante['endereco'];?></p>
                <div>
				<?php if ($puxaanunciante['mapa']!==""){?>
                  <a href="<?php echo $puxaanunciante['mapa']; ?>" class="btn btn-black mr-1 rounded-0">Onde Fica?</a>
				<?php }?>
                  <a href="https://api.whatsapp.com/send?phone=55<?php echo $telefoneWhats; ?>&text=" target="_blank" class="btn btn-black btn-outline-black ml-1 rounded-0"><i class="mdi mdi-whatsapp"></i> Whatsapp</a>
                </div>
              </div>
            </div>
          </div>
		  
					<?php } }else{ ?>
				 <div class="col-lg-12">
				<div class="card">
						  <div class="card-body">
							<center><b>Em breve destaques aqui...</b><br><a href="#">Gostaria de ser um destaque?</a></center>
						  </div>
						</div><br><br>
						</div>		
					<?php }} ?>

              

          
        </div>
      </div>
    </div>
    
    <div class="site-blocks-cover inner-page-cover overlay get-notification"  style="background-image: url(images/hero_2.jpg); background-attachment: fixed;" data-aos="fade">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <form class="col-md-7" method="post">
            <h2><b>GRUPO DO WHATSAPP</b></h2>
            <p>Entre agora no nosso grupo de novidades do comércio da cidade e não perca nenhuma promoção especial!</p>
              <center><a href="#" style="background:green; color:white; padding:30px" class="btn rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block"><b>ENTRAR NO GRUPO</b></a></center>
          
           
          </form>
        </div>

      </div>
    </div>

    <div class="site-section bg-light" id="promo-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Você não pode perder!</h3>
            <h2 class="section-title mb-3">Promoções Incríveis!</h2>
            <p>Confira algumas promoções incríveis do nosso guia. Apresente o código da promoção e ganhe descontos exclusivos! </p>
          </div>
        </div>
		
		<?php $conta=0; if ($promoquery == true) {	
				if ($promoquantos>0){		
				   while ($promo = mysqli_fetch_assoc($promoquery)){ 
				    $qranunciante=$promo['anunciante'];
				    $conta=$conta+1;
					$apuxar="SELECT * FROM `anunciantes` where id='$qranunciante'";
					$aquery = mysqli_query($conexao,$apuxar)or die(mysqli_error());
					$oanunc = mysqli_fetch_assoc($aquery);
					
					$qtelefoneWhats=$oanunc['telefone_whats'];
					$qtelefoneWhats = str_replace('(', "", $qtelefoneWhats);
					$qtelefoneWhats = str_replace(')', "", $qtelefoneWhats);
					$qtelefoneWhats = str_replace(' ', "", $qtelefoneWhats);
					$qtelefoneWhats = str_replace('-', "", $qtelefoneWhats);
				   ?>
				  
        <div class="bg-white py-4 mb-4">
          <div class="row mx-4 my-4 product-item-2 align-items-start">
            <div class="col-md-6 mb-5 mb-md-0">
              <img src="<?php echo $caminho_site;?>/dist/img/promocoes/<?php echo $promo['imagem'];?>" alt="Image" class="img-fluid">
			  
                <center><p style="background:#cccccc;font-size:32px;padding:20px;border:6px dashed gray;"><small style="font-size:14px;">Apresente este código:</small><br><b><?php echo $promo['codigo'];?></b></p></center>
			  
            </div>
           
            <div class="col-md-5 ml-auto product-title-wrap">
              <span class="number"><?php echo $conta; ?></span>
              <h3 class="text-black mb-4 font-weight-bold"><?php echo $promo['titulo'];?><br><span class="badge" style="background:green; color:white"><?php echo $promo['desconto'];?>% de desconto</span></h3>
			  
			  <p><b><?php echo $oanunc['nome'];?></b><br><i class="mdi mdi-phone"></i> <?php echo $oanunc['telefone_ligar'];?><br><?php echo $oanunc['endereco'];?></p>
              <p class="mb-4"><?php echo $promo['informacoes'];?></p>
              
              <div class="mb-4"> 
			  
              </div>
              <p>
                <a href="https://api.whatsapp.com/send?phone=55<?php echo $qtelefoneWhats; ?>&text=" target="_blank" class="btn btn-black btn-outline-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block"><i class="mdi mdi-whatsapp"></i>Whatsapp</a>
				<?php if ($oanunc['mapa']!==""){?>
                  <a href="<?php echo $oanunc['mapa'];?>" class="btn btn-black rounded-0 d-block d-lg-inline-block">Onde Fica?</a>
				<?php }?>
                
              </p>
            </div>
          </div>
        </div>
		
				<?php }}else{ ?>
					 <div class="col-lg-12">
				<div class="card">
						  <div class="card-body">
							<center><b>Em breve promoções aqui...</b><br><a href="#">Gostaria de publicar uma promoção?</a></center>
						  </div>
						</div><br><br>
						</div>
		<?php }} ?>

       

      </div>
    </div>


    <div class="site-section" id="app-section">
      <div class="container">
        <div class="row align-items-lg-center">
          <div class="col-md-8 mb-5 mb-lg-0 position-relative">
            <img src="images/app.jpg" class="img-fluid" alt="Image">
            <div class="experience">
              <span class="year">BAIXE NOSSO APP!</span>
              <span class="caption">São mais de 100 categorias!</span>
            </div>
          </div>
          <div class="col-md-3 ml-auto">
            <h3 class="section-sub-title">Guia COmercial</h3>
            <h2 class="section-title mb-3">Por que baixar?</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui fuga ipsa, repellat blanditiis nihil, consectetur. Consequuntur eum inventore, rem maxime, nisi excepturi ipsam libero ratione adipisci alias eius vero vel!</p>
            <p><a href="#" class="btn btn-black btn-black--hover rounded-0">Baixe agora!</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">O que oferecemos</h3>
            <h2 class="section-title mb-3">Por que anunciar conosco?</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-pie_chart"></span></div>
              <div>
                <h3>Marketing de Qualidade</h3>
                <p>Apareça para milhares de clientes em potencial que estão procurando seu negócio!</p>
               
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-money"></span></div>
              <div>
                <h3>Preço Baixo!</h3>
                <p>Apareça para muitas pessoas pagando muito pouco!</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-bell"></span></div>
              <div>
                <h3>Notificações Push!</h3>
                <p>Mande uma mensagem para todos os usuários do aplicativo de uma vez!</p>
                
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-beenhere"></span></div>
              <div>
                <h3>Atendimento Humanizado</h3>
                <p>Nossa equipe está pronta para atender suas necessidades!</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-business_center"></span></div>
              <div>
                <h3>Destaque-se</h3>
                <p>Seja um anunciante destaque e apareça no topo para todos verem.</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-phone-square"></span></div>
              <div>
                <h3>Contatos</h3>
                <p>Permite que seus clientes entrem em contato com você diretamente!</p>
               
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  
    <footer class="site-footer bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">Sobre Nós</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
              </div>
              <div class="col-md-3 ">
                <h2 class="footer-heading mb-4">Links Rápidos</h2>
                <ul class="list-unstyled">
                  <li><a href="#home-section">Home</a></li>
                <li><a href="#destaque-section">Destaques</a></li>
                <li><a href="#promo-section">Promoções</a></li>
                <li><a href="#app-section">Aplicativo</a></li>
                <li><a href="#testimonials-section">Anuncie</a></li>                
                <li><a href="#">Login</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <h2 class="footer-heading mb-4">Nos Siga!</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 ml-auto">
            <h2 class="footer-heading mb-4">Baixe agora!</h2>
			<h4 class="h5">Guia Comercial</h4>
            <a href="#"><img src="images/download.png" alt="Image" class="img-fluid mb-3"></a>
           
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados.
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>