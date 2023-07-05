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

//SELECIONAR AS CIDADES
$xconsulta = "SELECT * FROM `usuarios_administrativos` order by id";
$xquery = mysqli_query($conexao,$xconsulta) or die(mysqli_error());
$xquantos=mysqli_num_rows($xquery);

//SELECIONAR AS CIDADES
$acidadeconsulta = "SELECT * FROM `cidades`";
$acidadequery = mysqli_query($conexao,$acidadeconsulta) or die(mysqli_error());
$acidadequantos=mysqli_num_rows($acidadequery);

$zxconsulta = "SELECT * FROM `anunciantes` order by nome";
$zxquery = mysqli_query($conexao,$zxconsulta) or die(mysqli_error());
$zxquantos=mysqli_num_rows($zxquery);

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
   
.smartphone {
  position: relative;
  width: 360px;
  height: 640px;
  margin: auto;
  border: 16px black solid;
  border-top-width: 60px;
  border-bottom-width: 60px;
  border-radius: 36px;
}

/* The horizontal line on the top of the device */
.smartphone:before {
  content: '';
  display: block;
  width: 60px;
  height: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #333;
  border-radius: 10px;
}

/* The circle on the bottom of the device */
.smartphone:after {
  content: '';
  display: block;
  width: 35px;
  height: 35px;
  position: absolute;
  left: 50%;
  bottom: -65px;
  transform: translate(-50%, -50%);
  background: #333;
  border-radius: 50%;
}

/* The screen (or content) of the device */
.smartphone .content {
  width: 100%;
  height: 100%;
  background: url('dist/img/android-back.png');
   background-size: 100% 100%;
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
        <i class="fa fa-gears"></i> Configurações
        <small>Controle geral</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Configurações</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      
	  <div class="col-md-12">
	 <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-user"></i> Usuários Administrativos</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-bell"></i> Notificações Push</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <?php if ($cargo=="Administrativo") { ?>  
				<div class="row">
					<div class="col-md-12">
					<form id="imagemForm" method="POST" action="acoes/adiciona-usuario.php">
					<div class="form-group col-md-3">
			<label for="inputCity">Nome <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" name="nomeUser" id="nomeUser" placeholder="Nome do usuário" required>
		
			</div>
			
			<div class="form-group col-md-3">
			<label for="inputCity">Login <sup style="color:red"><b>*</b></sup></label>
			  <input type="email" class="form-control" name="loginUser" id="loginUser" placeholder="emal@provedor.com" required>
		
			</div>
			
			<div class="form-group col-md-3">
			<label for="inputCity">Senha <sup style="color:red"><b>*</b></sup></label>
			  <input type="password" class="form-control" name="senhaUser" id="senhaUser" placeholder="Senha" required>
		
			</div>
			
			<div class="col-md-3">			
			<button style="padding:20px" type="submit" class="btn btn-block btn-success btn-lg">Adicionar Usuário</button>
			</div>
					</form>
					</div>
				</div>
			  <?php } ?>
			  
				<div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th class="hidden">ID</th>
				<th>Nome</th>
				<th>Login</th>
				 <th>Cargo</th> 
				 <th>Cadastrado em:</th>
                 <th>Opções</th>   				  
                </tr>
                </thead>
                <tbody>
				<?php
				   if ($xquery == true) {
						if ($xquantos>0){
					while ($xusers = mysqli_fetch_assoc($xquery)){
					$nova_data = explode("-", $xusers['data_cadastro']);
					$data=$nova_data[2] . "/" . $nova_data[1] . "/" . $nova_data[0];
									
					?>	
                <tr>
				 <td class="hidden"><?php echo $xusers['id'] ?></td>
				<td><?php echo $xusers['nome'] ?></td>
				 <td><?php echo $xusers['login'] ?></td>
				 <?php
				   if ($xusers['cargo']=="Administrativo") {					
					?>	
                  <td><b style="color:#f6c500"><i class="fa fa-star"></i></b> <?php echo $xusers['cargo'] ?></td>
				   <?php }else{ ?>
				   <td><i class="fa fa-address-book"></i></b> <?php echo $xusers['cargo'] ?></td>
				   <?php } ?>
				  <td><?php echo $data ?></td>
                 
				 <?php
				   if ($xusers['cargo']=="Administrativo") {					
					?>
                  <td><i><b>Impossível deletar administrador</b></i></td>
				  <?php }else{ ?>
				  <?php if ($cargo=="Administrativo") { ?>				 
				  <td>
				  <div class="btn-group">
                      
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $xusers['id'] ?>"><i class="fa fa-trash"></i> Excluir</button>
                     
                    </div>
				  
				  </td>
				  <?php }else{ ?>
				  <td><i class="fa fa-ban"></i> <i>Você não tem permissões</i></td>
				  <?php }} ?>
                                 
                </tr>			
				
				
				<div class="modal fade" id="modal-<?php echo $xusers['id'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>CONFIRMAÇÃO</b></h4>
              </div>
              <div class="modal-body text-center">
                <p>Tem certeza que deseja deletar usuário <b><?php echo $xusers['nome'] ?> </b>?
				
				</p>
              </div>
              <div class="modal-footer">
			    <a href="acoes/deletar-usuario.php?ref=<?php echo $xusers['id'] ?>" class="btn btn-danger pull-left">Sim. Deletar!</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
				
					<?php }}}?>
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
				
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
             <form method="POST" action="acoes/notificacao-push.php" enctype="multipart/form-data">   
			<div class="row">
			
			 <div class="col-md-6">
			 
			 <div class="form-group col-md-12">
			  <label for="inputCity">Título Notificação <small style="color:gray">(Máximo 50 caracteres)</small></label>
			  <input type="text" class="form-control" maxlength="50" name="tituloNotificacao" id="tituloNotificacao" placeholder="Titulo da notificação" required>
			</div>
			
			<div class="form-group col-md-12">
			  <label for="inputCity">Conteúdo Notificação <small style="color:gray">(Máximo 150 caracteres)</small></label>
			  <textarea rows="5" class="form-control" maxlength="150" name="conteudoNotificacao" id="conteudoNotificacao" placeholder="Conteúdo da notificação"  required></textarea>
			</div>
			
			<div class="row">
			<div class="form-group col-md-12">
			<div class="col-md-4">			
			<button type="submit" class="btn btn-block btn-success btn-lg"><i class="fa fa-send"></i> Enviar Notificação</button>
			</div>
			</div>
			 </div>
			 			 
			 </div>
			 
			 <div class="col-md-6">
			 <center><label> Pré-Visualização </label></center>
			 <div class="smartphone">
			  <div class="content">
				<div id="simuladorNotificao" class="box box-solid hidden" style="margin-top:30%">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bell"></i> Guia Comercial</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <b id="recebeTitulo" style="word-break: break-all;">Titulo</b>
			 <p id="recebeConteudo" style="word-break: break-all;">Conteúdo</p>
            </div>
            <!-- /.box-body -->
          </div>
			  </div>
			</div>			
			
			 
			 </div>
			 
			 
			
			</div>
			</form>
			
		
		
				
				
              </div>
              <!-- /.tab-pane -->
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
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
                <p>Usuário adicionado com sucesso!</p>
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
                <p>Usuário removido com sucesso!</p>
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
		
		<div class="modal modal-success fade" id="modal-notok">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><i class="fa fa-bell"></i> NOTIFICAÇÃO ENVIADA</b></h4>
              </div>
              <div class="modal-body">
                <p>Notificação Push enviada com sucesso!</p>
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
                <p>Houve algum problema. Tente novamente!</p>
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
		
		<div class="modal modal-danger fade" id="modal-nopermission">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>VOCÊ NÃO É ADMINISTRADOR!</b></h4>
              </div>
              <div class="modal-body">
                <p>Você não tem permissão para adicionar usuários. Por favor, peça ao administrador que adicione o usuário em questão!</p>
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
		
		<div class="modal modal-danger fade" id="modal-emailrepeat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>E-MAIL JÁ CADASTRADO!</b></h4>
              </div>
              <div class="modal-body">
                <p>Este e-mail já está cadastrado. Informe outro por favor!</p>
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
		
		<div class="modal modal-danger fade" id="modal-onesignal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>API KEY E APP ID NÃO CONFIGURADO!</b></h4>
              </div>
              <div class="modal-body">
                <p>Por favor, configure corretamente as informações de notificações da onesginal junto ao servidor!<br><b>Notificação não enviada</b></p>
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
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.pt-BR.min.js"></script>
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
   //$("#banners").addClass('active');
   $('#telefoneWhats').mask('(00) 00000-0000');
   $('#telefoneChamadas').mask('(00) 00000-0000');
   $('#desconto').mask('00');
   
   var date = new Date();
date.setDate(date.getDate()-1);
   
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  language: 'pt-BR',
	  orientation: 'bottom',
	  startDate: date
    })
	
$("#tituloNotificacao").on('input', function() {
    var edValue = document.getElementById("tituloNotificacao");
    var s = edValue.value;
	
	var xedValue = document.getElementById("conteudoNotificacao");
	var xs = xedValue.value;
    
	
	if ((s.length > 0)||(xs.length > 0)){
		
		$("#simuladorNotificao").removeClass('hidden');
		$("#simuladorNotificao").addClass('block');
	}else{
		$("#simuladorNotificao").removeClass('block');
		$("#simuladorNotificao").addClass('hidden');
	}

    var lblValue = document.getElementById("recebeTitulo");
    lblValue.innerText = ""+s;
});

$("#conteudoNotificacao").on('input', function() {
    var edValue = document.getElementById("conteudoNotificacao");
    var s = edValue.value;
	
	var xedValue = document.getElementById("tituloNotificacao");
	var xs = xedValue.value;
	
	if ((s.length > 0)||(xs.length > 0)){
		
		$("#simuladorNotificao").removeClass('hidden');
		$("#simuladorNotificao").addClass('block');
	}else{
		$("#simuladorNotificao").removeClass('block');
		$("#simuladorNotificao").addClass('hidden');
	}

    var lblValue = document.getElementById("recebeConteudo");
    lblValue.innerText = ""+s;
});


   
   $(function () {
    $('#example1').DataTable();
	
	$('[data-toggle="tooltip"]').tooltip()
	
	<?php if(empty($_GET)){ ?> 

<?php }else { ?> 

<?php if ($_GET['result']=='ok'){ ?>	
	$('#modal-success').modal('show');
	<?php }; ?> 
	
	<?php if ($_GET['result']=='notok'){ ?>	
	$('#modal-notok').modal('show');
	<?php }; ?> 

	<?php if ($_GET['result']=='deleted'){ ?>	
	$('#modal-deleted').modal('show');
	<?php }; ?>

	<?php if ($_GET['result']=='fail'){ ?>	
	$('#modal-danger').modal('show');
	<?php }; ?>	
	
	<?php if ($_GET['result']=='nopermission'){ ?>	
	$('#modal-nopermission').modal('show');
	<?php }; ?>	
	
	<?php if ($_GET['result']=='emailrepeat'){ ?>	
	$('#modal-emailrepeat').modal('show');
	<?php }; ?>
	
	<?php if ($_GET['result']=='onesignal'){ ?>	
	$('#modal-onesignal').modal('show');
	<?php }; ?>
 
<?php }; ?> 
	
    
	
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
	
	$("#vaiPara").on('change', function() {
		$("#alvo").empty();
		var vaiPara=$("#vaiPara").val();
		
		$.ajax({
		type: 'POST',
		data: {vaiPara:vaiPara},
		url: 'acoes/puxar-alvo.php',
		crossDomain: true,
				
		success: function (resposta) {
		//alert(resposta);
		if (resposta !== '0') {
		
		$("#alvo").append(resposta);
		}

		if (resposta == 0) {
		
		$('#modal-danger').modal('show');
		
		}

		},

		error: function (erro) {

		alert('Erro ao puxar: ' + erro.responseText);

		//RETORNO DE ERRO. NORMALMENTE ASSOCIADO A FALTA DE INTERNET OU NÃO COMUNICAÇÃO COM O ARQUIVO PHP;

		}


		});
	});
	
	
	
	
   
});
</script>

 
	
	
</body>
</html>
