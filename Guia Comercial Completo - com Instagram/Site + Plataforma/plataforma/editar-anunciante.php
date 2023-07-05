<?php
require('bd/conexao.php');

session_start();

//Login só para Testes
//$_SESSION['LoginUsuario']='oficina-exemplo';

if ($_SESSION['LoginUsuario']==''){
	
	// Redireciona o visitante de volta pro login
	header("Location: login.html"); exit;
	
}; 

$loginUser=$_SESSION['LoginUsuario'];
$id = $_GET['id'];
if ($id==""){
header("Location: anunciantes.php"); exit;	
}else{

//SELECIONAR OS DADOS DO USUARIO LOGADO
$consulta = "SELECT * FROM `usuarios_administrativos` where login='$loginUser'";
$query = mysqli_query($conexao,$consulta) or die(mysqli_error());
$usuario = mysqli_fetch_assoc($query);

$nome=$usuario['nome'];
$cargo=$usuario['cargo'];

//SELECIONAR AS CIDADES
$xconsulta = "SELECT * FROM `anunciantes` where id='$id'";
$xquery = mysqli_query($conexao,$xconsulta) or die(mysqli_error());
$xquantos=mysqli_num_rows($xquery);
$xanunciantes = mysqli_fetch_assoc($xquery);

//SELECIONAR AS CIDADES
$acidadeconsulta = "SELECT * FROM `cidades`";
$acidadequery = mysqli_query($conexao,$acidadeconsulta) or die(mysqli_error());
$acidadequantos=mysqli_num_rows($acidadequery);

$zxconsulta = "SELECT * FROM `categorias` order by id";
$zxquery = mysqli_query($conexao,$zxconsulta) or die(mysqli_error());
$zxquantos=mysqli_num_rows($zxquery);
	
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guia Comercial - Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="dist/css/materialdesignicons.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style>
   

.card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
    background-size: cover;
    height: 200px;
}



.cardheader:hover .middle {
  opacity: 1;
  cursor:pointer;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}



.cam {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.text {
  background-color: gray;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
  z-idex:999;
}

.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}



.card.hovercard .avatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}



.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}




  </style>
  
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Guia</b> Comercial</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nome; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo $nome; ?>
                  <small><b><?php echo $cargo; ?></b></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="logout.php"><i class="fa fa-sign-out"></i> Sair</a>
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
             
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="configuracoes.php"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <?php require('componentes/menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	  <a href="anunciantes.php"><i class="fa fa-arrow-left"></i> Voltar para lista </a>
        
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Editar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      
	  <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-edit"></i>

              <h3 class="box-title">Modo de Edição (<b><?php echo $xanunciantes['nome'] ?></b>)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
			 <form id="imagemForm" method="POST" action="acoes/atualiza-anunciante.php" enctype="multipart/form-data"> 
              <input type="hidden" class="form-control" name="idAnunciante" value="<?php echo $xanunciantes['id'] ?>" id="idAnunciante" placeholder="ID">			 
			<div class="row">
			
			 <div class="col-md-4">
			 
			 <div class="card hovercard">
                <div class="cardheader">
				<?php if ($xanunciantes['capa_perfil']==""){ ?>
				<img id="imgPreview2" style="cursor:pointer;max-width:100%;" width="850" height="250" alt="" src="dist/img/capa.jpg">
				<?php }else{ ?>
				<img id="imgPreview2" style="cursor:pointer;max-width:100%;" width="850" height="250" alt="" src="dist/img/anunciantes/capas/<?php echo $xanunciantes['capa_perfil'] ?>">
				<?php }?>
					<div class="middle">
						<div class="text"><i class="mdi mdi-lead-pencil"></i> Trocar capa</div>
					  </div>
					  
                </div>
                <div class="avatar">
				<?php if ($xanunciantes['imagem_perfil']==""){ ?>
                    <img id="imgPreview" style="cursor:pointer;" alt="" src="dist/img/camera.jpg">
					<?php }else{ ?>
			<img id="imgPreview" style="cursor:pointer;" alt="" src="dist/img/anunciantes/perfil/<?php echo $xanunciantes['imagem_perfil'] ?>">
					<?php }?>
					<input type="file" name="perfil" id="fileImagem" accept="image/*" class="hidden">
					<input type="file" name="capa" id="xfileImagem" accept="image/*" class="hidden">
                </div>
                <div class="info"><br>
                    <div class="form-group col-md-12">
			<label for="inputCity">Nome do anunciante <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" name="nomeAnunciante" value="<?php echo $xanunciantes['nome'] ?>" id="nomeAnunciante" placeholder="Nome do anunciante" required>
		
			</div>
                </div>
              
            </div>
			 
			 
			 </div>
			 
			 <div class="col-md-8">
			 
			 <div class="form-group col-md-6">
			<label for="inputCity">Cidade <sup style="color:red"><b>*</b></sup></label>
			  <select name="cidade" class="form-control" required>
			   <option value="" disabled selected>Selecione uma Cidade</option>
			  <?php
				   if ($acidadequery == true) {
						if ($acidadequantos>0){
					while ($acidades = mysqli_fetch_assoc($acidadequery)){		
					?>	
                     <option value="<?php echo $acidades['id'] ?>" <?php if ($acidades['id']==$xanunciantes['cidade']){ ?> selected <?php } ?> ><?php echo $acidades['cidade'] ?> - <?php echo $acidades['estado'] ?> </option>
                    
					<?php }}}?>
                  </select>
			</div>
			
			<div class="form-group col-md-6">
			<label for="inputCity">Categoria <sup style="color:red"><b>*</b></sup></label>
			  <select name="categoria" class="form-control" required>
                   
                     <option value="" disabled selected>Selecione uma Categoria</option>
                     <?php
				   if ($zxquery == true) {
						if ($zxquantos>0){
					while ($acatego = mysqli_fetch_assoc($zxquery)){		
					?>	
                     <option value="<?php echo $acatego['id'] ?>" <?php if ($acatego['id']==$xanunciantes['categoria']){ ?> selected <?php } ?>><?php echo $acatego['nome_categoria'] ?> </option>
                    
					<?php }}}?>
                  </select>
			</div>
			
			<div class="form-group col-md-4">
			<label for="inputCity">Telefone Chamadas <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" value="<?php echo $xanunciantes['telefone_ligar'] ?>" name="telefoneChamadas" id="telefoneChamadas" placeholder="(00) 00000-0000" required>
		
			</div>
			
			<div class="form-group col-md-4">
			<label for="inputCity">Telefone Whatsapp <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" name="telefoneWhats" value="<?php echo $xanunciantes['telefone_whats'] ?>" id="telefoneWhats" placeholder="(00) 00000-0000" required>
		
			</div>
			
			<div class="form-group col-md-4">
			<label for="inputCity">Link do Facebook</label>
			  <input type="text" class="form-control" name="linkFacebook" value="<?php echo $xanunciantes['facebook'] ?>" id="linkFacebook" placeholder="Link Facebook">
		
			</div>
			
			<div class="form-group col-md-6">
			<label for="inputCity">Endereço Completo <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" name="enderecoCompleto" value="<?php echo $xanunciantes['endereco'] ?>" id="enderecoCompleto" placeholder="Endereço Completo" required>
		
			</div>
			
			<div class="form-group col-md-6">
			<label for="inputCity">Link do Mapa</label>
			  <input type="text" class="form-control" name="linkMapa" value="<?php echo $xanunciantes['mapa'] ?>" id="linkMapa" placeholder="Link Google Maps">
		
			</div>
			
			<div class="form-group col-md-12">
			<label for="inputCity">Descrição da Empresa <sup style="color:red"><b>*</b></sup></label>
			  <textarea class="form-control" rows="5" name="descricaoEmpresa" id="descricaoEmpresa" placeholder="Descrição Empresa" required><?php echo $xanunciantes['descricao'] ?></textarea>
		
			</div>
			
			<div class="row">
			
			<div class="col-md-4">			
			<button type="submit" class="btn btn-block btn-success btn-lg">Salvar Alterações</button>
			</div>
			</div>
			 
			 </div>
			 
			 
			
			</div>
			</form>
			
		
			 
            </div>
            <!-- /.box-body -->
          </div>
        </div>
	  
      </div>
      <!-- /.row -->
      <!-- Main row -->
	  
	  
	  
	  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php require ('componentes/footer.php') ?>
 
 <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>SUCESSO</b></h4>
              </div>
              <div class="modal-body">
                <p>Anunciante adicionado com sucesso!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		<div class="modal modal-success fade" id="modal-deleted">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>SUCESSO</b></h4>
              </div>
              <div class="modal-body">
                <p>Anunciante deletado com sucesso!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		  <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>FALHOU!</b></h4>
              </div>
              <div class="modal-body">
                <p>Houve algum problema. Anunciante não foi adicionado. Tente novamente!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		

 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/jquery.mask.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
   $("#anunciantes").addClass('active');
   $('#telefoneWhats').mask('(00) 00000-0000');
   $('#telefoneChamadas').mask('(00) 00000-0000');
   
   $(function () {
    $('#example1').DataTable();
	
	$('[data-toggle="tooltip"]').tooltip()
	
	
	
    
	
  })
  
  function readURL(input) {
		  if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function(e) {
			  $('#imgPreview').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		  }
		}

		$("#fileImagem").change(function() {
		  readURL(this);
		 
		});
	
	$("#imgPreview").on('click', function() {
		$("#fileImagem").click();
	});
	
	function xreadURL(input) {
		  if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function(e) {
			  $('#imgPreview2').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		  }
		}

		$("#xfileImagem").change(function() {
		  xreadURL(this);
		  
		});
	
	$("#imgPreview2").on('click', function() {
		$("#xfileImagem").click();
	});
	
	$(".middle").on('click', function() {
		$("#xfileImagem").click();
	});
	
	
   
});
</script>

 
	
	
</body>
</html>
