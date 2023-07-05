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

//SELECIONAR OS DADOS DO USUARIO LOGADO
$consulta = "SELECT * FROM `usuarios_administrativos` where login='$loginUser'";
$query = mysqli_query($conexao,$consulta) or die(mysqli_error());
$usuario = mysqli_fetch_assoc($query);

$nome=$usuario['nome'];
$cargo=$usuario['cargo'];

//SELECIONAR AS CATEGORIAS
$xconsulta = "SELECT * FROM `categorias`";
$xquery = mysqli_query($conexao,$xconsulta) or die(mysqli_error());
$xquantos=mysqli_num_rows($xquery);

$wconsulta = "SELECT * FROM `anunciantes`";
$wquery = mysqli_query($conexao,$wconsulta) or die(mysqli_error());
$wquantos=mysqli_num_rows($wquery);

$pconsulta = "SELECT * FROM `promocoes`";
$pquery = mysqli_query($conexao,$pconsulta) or die(mysqli_error());
$pquantos=mysqli_num_rows($pquery);

$cconsulta = "SELECT * FROM `destaques`";
$cquery = mysqli_query($conexao,$cconsulta) or die(mysqli_error());
$cquantos=mysqli_num_rows($cquery);

//TOP 3 VIEWS
$tconsulta = "SELECT * FROM `anunciantes` order by views desc limit 3";
$tquery = mysqli_query($conexao,$tconsulta) or die(mysqli_error());
$tquantos=mysqli_num_rows($tquery);

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
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Dashboard
        <small>Painel de Controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $xquantos ?></h3>

              <p><b>Categorias</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-bookmark"></i>
            </div>
            <a href="categorias.php" class="small-box-footer">Veja todas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $wquantos ?></h3>

              <p>Anunciantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="anunciantes.php" class="small-box-footer">Veja todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $pquantos ?></h3>

              <p>Promoções</p>
            </div>
            <div class="icon">
             <i class="fa fa-ticket"></i>
            </div>
            <a href="promocoes.php" class="small-box-footer">Veja todas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $cquantos ?></h3>

              <p>Destaques</p>
            </div>
            <div class="icon">
              <i class="fa fa-star"></i>
            </div>
            <a href="destaques.php" class="small-box-footer">Veja Todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
      <!-- Main row -->
	  
	  <?php if ($wquantos>0){ ?>
	  <h2 class="page-header">Top Anunciantes</h2>
	  
      <div class="row">
	  <?php while ($anunciante = mysqli_fetch_assoc($tquery)){ 
	  $idCategoria=$anunciante['categoria'];
	  $reconsulta = "SELECT * FROM `categorias` where id='$idCategoria'";
	  $requery = mysqli_query($conexao,$reconsulta) or die(mysqli_error());
      $requantos=mysqli_num_rows($requery);
	  $categor = mysqli_fetch_assoc($requery);
	  
	  $idCidade=$anunciante['cidade'];
	  $ciconsulta = "SELECT * FROM `cidades` where id='$idCidade'";
	  $ciquery = mysqli_query($conexao,$ciconsulta) or die(mysqli_error());
      $ciquantos=mysqli_num_rows($ciquery);
	  $cidade = mysqli_fetch_assoc($ciquery);
	  
	  ?>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
         <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><b><?php echo $anunciante['nome'] ?></b></h3>
              <h4 class="widget-user-desc"><?php echo $categor['icone'] ?> <?php echo $categor['nome_categoria'] ?> </h4>
			  <h5 class="widget-user-desc"><i class="fa fa-building"></i> <?php echo $cidade['cidade'] ?> - <?php echo $cidade['estado'] ?></h5>
            </div>
            <div class="widget-user-image">
			<?php if ($anunciante['imagem_perfil']!==""){ ?>
              <img class="img-circle" src="dist/img/anunciantes/perfil/<?php echo $anunciante['imagem_perfil'] ?>" alt="Perfil">
			<?php }else{ ?>
			  <img class="img-circle" src="dist/img/camera.jpg" alt="Perfil">
			<?php } ?>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $anunciante['views'] ?></h5>
                    <span class="description-text"><b>VISITANTES</b></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
	  <?php } ?>
        
      </div>
	   <?php } ?>
	  
	  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php require ('componentes/footer.php') ?>

 
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
<script>
$(document).ready(function() {
   $("#inicio").addClass('active');
});
</script>
</body>
</html>
