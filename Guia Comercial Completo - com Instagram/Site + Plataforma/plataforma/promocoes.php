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
$xconsulta = "SELECT * FROM `promocoes` order by id";
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
        Promoções
        <small>Controle de promoções</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Promoções</li>
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
              <li class="active"><a href="#tab_1" data-toggle="tab">Promoções válidas</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-plus-circle"></i> Adicionar</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                
				<div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th class="hidden">ID</th>
				<th><i class="mdi mdi-camera"></i></th>
				<th>Anunciante</th>
				 <th>Cidade</th> 
                  <th>Titulo</th>
                  <th>Desconto</th>				  
                 
				   <th>Vencimento</th> 				  
				  <th>Opções</th>   				  
                </tr>
                </thead>
                <tbody>
				<?php
				   if ($xquery == true) {
						if ($xquantos>0){
					while ($xpromocoes = mysqli_fetch_assoc($xquery)){
						
					//VERIFICAR PARA DELETAR DESTAQUES VENCIDOS
					$hoje=date('Y-m-d');
					$data_vencimento=$xpromocoes['data_vencimento'];					
					$nova_data = explode("/", $data_vencimento);
					$vencimento=$nova_data[2] . "-" . $nova_data[1] . "-" . $nova_data[0];
					
					$qualehID=$xpromocoes['id'];
					
					//SE HOJE FOR MAIOR QUE VENCIMENTO
					if(strtotime($hoje) > strtotime($vencimento)){
								//VENCIDO
							$deleteconsulta = "DELETE FROM promocoes WHERE id='$qualehID'";
							$deletequery = mysqli_query($conexao,$deleteconsulta) or die(mysqli_error());
							
							//DELETAR BANNER
							$xdeleteconsulta = "DELETE FROM banners WHERE vai_para='promocao' and alvo='$qualehID'";
							$xdeletequery = mysqli_query($conexao,$xdeleteconsulta) or die(mysqli_error());
					}else{	
						
						//PEGAR ANUNCIANTE
					$idAnunciante=$xpromocoes['anunciante'];
					$anuncianteconsulta = "SELECT * FROM `anunciantes` where id='$idAnunciante'";
					$anunciantequery = mysqli_query($conexao,$anuncianteconsulta) or die(mysqli_error());
					$puxaanunciante = mysqli_fetch_assoc($anunciantequery);
					$anunciante=$puxaanunciante['nome'];

					//PEGAR A CIDADE
					$idCidade=$xpromocoes['cidade'];
					$cidadeconsulta = "SELECT * FROM `cidades` where id='$idCidade'";
					$cidadequery = mysqli_query($conexao,$cidadeconsulta) or die(mysqli_error());
					$puxacidades = mysqli_fetch_assoc($cidadequery);
					$cidade=$puxacidades['cidade']. ' - ' .$puxacidades['estado'];					
					?>	
                <tr>
				 <td class="hidden"><?php echo $xpromocoes['id'] ?></td>
				 <?php if ($xpromocoes['imagem']==""){ ?>
				 <td><img src="dist/img/camera.jpg" width="40" height="40"></td>
				 <?php }else { ?>
				 <td><a href="#" data-toggle="modal" data-target="#modalImagem-<?php echo $xpromocoes['id'] ?>"><img src="dist/img/promocoes/<?php echo $xpromocoes['imagem'] ?>" width="40" height="40"></a></td>
				 <?php } ?>
				 <td><?php echo $anunciante ?>
                  </td>
                  <td><?php echo $cidade ?></td>
                  <td><?php echo $xpromocoes['titulo'] ?>
                  </td>
				  
				   <td><?php echo $xpromocoes['desconto']." %" ?>
                  </td>
				  <td><?php echo $xpromocoes['data_vencimento'] ?></td>
                  <td>
				  <div class="btn-group">
                      
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $xpromocoes['id'] ?>"><i class="fa fa-trash"></i> Excluir</button>
                     
                    </div>
				  
				  </td>
                                 
                </tr>
				
				<div class="modal fade" id="modalImagem-<?php echo $xpromocoes['id'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Imagem da promoção</b></h4>
              </div>
              <div class="modal-body">
                <div class="row">
				<div class="col-md-12">
					
				<img style="max-width:100%;"  alt="" src="dist/img/promocoes/<?php echo $xpromocoes['imagem'] ?>">
							 
			 </div>
			 </div>
				
				
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
				
				<div class="modal fade" id="modal-<?php echo $xpromocoes['id'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>CONFIRMAÇÃO</b></h4>
              </div>
              <div class="modal-body">
                <p>Tem certeza que deseja deletar promoção <b>"<?php echo $xpromocoes['titulo'] ?>"</b>?<br>Isso também excluirá qualquer banner relacionado a essa promoção...</p>
              </div>
              <div class="modal-footer">
			    <a href="acoes/deletar-promocao.php?ref=<?php echo $xpromocoes['id'] ?>" class="btn btn-danger pull-left">Sim. Deletar!</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
				
					<?php }}}}?>
               
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
				
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
             <form id="imagemForm" method="POST" action="acoes/adiciona-promocao.php" enctype="multipart/form-data">   
			<div class="row">
			
			 <div class="col-md-4">
			 <img id="imgPreview2" style="cursor:pointer;max-width:100%;" width="850" height="250" alt="" src="dist/img/promocional.jpg">
			 <input type="file" name="imagemPromocao" id="xfileImagem" accept="image/*" class="hidden" ><br><br>
			 
			 <div class="form-group col-md-12">
			<label for="inputCity">Título da Promoção <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" name="tituloPromocao" id="tituloPromocao" placeholder="Título da promoção" required>
		
			</div>
			 
			 </div>
			 
			 <div class="col-md-8">
			 
			 			
			<div class="form-group col-md-8">
			<label for="inputCity">Anunciante <sup style="color:red"><b>*</b></sup></label>
			  <select name="anunciante" class="form-control" required>
                   
                     <option value="" disabled selected>Selecione um anunciante</option>
                     <?php
				   if ($zxquery == true) {
						if ($zxquantos>0){
					while ($acatego = mysqli_fetch_assoc($zxquery)){		
					?>	
                     <option value="<?php echo $acatego['id'] ?>"><?php echo $acatego['nome'] ?> </option>
                    
					<?php }}}?>
                  </select>
			</div>
			
			<div class="form-group col-md-4">
			<label for="inputCity">Código Cupom <sup style="color:red"><b>*</b></sup></label>
			  <input type="text" class="form-control" name="codigoCupom" id="codigoCupom" placeholder="Código Cupom" required>
		
			</div>
			
			
			
			<div class="form-group col-md-6">
                <label>Válida até <sup style="color:red"><b>*</b></sup></label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" placeholder="00/00/0000" name="dataValidade" id="datepicker" required>
                </div>
                <!-- /.input group -->
              </div>
			  
			  <div class="form-group col-md-6">
                <label>Desconto <sup style="color:red"><b></b></label>

                <div class="input-group date">
                  
                  <input type="text" class="form-control pull-right" name="desconto" placeholder="Desconto" id="desconto">
				  <!--<div class="input-group-addon">
                    <i class="fa fa-percent"></i>
                  </div>-->
                </div>
                <!-- /.input group -->
              </div>
			
			
			
			
			
			<div class="form-group col-md-12">
					 
			
              <label><b>Informações da Promoção</b> <sup style="color:red"><b>*</b></sup>
                
              </label>
              
            <!-- /.box-header -->
           
              
                <textarea name="informacaoPromocao" id="informacaoPromocao" class="textarea" placeholder="Detalhes sobre a promoção..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            
            
		
			</div>
			
			
			
			<div class="form-group col-md-4">			
			<button type="submit" class="btn btn-block btn-success btn-lg">Adicionar Promoção</button>
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
                <p>Promoção adicionada com sucesso!</p>
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
                <p>Promoção deletada com sucesso!</p>
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
		
		<div class="modal modal-success fade" id="modal-edited">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>SUCESSO</b></h4>
              </div>
              <div class="modal-body">
                <p>Promoção editada com sucesso!</p>
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
   $("#promocoes").addClass('active');
   $('#telefoneWhats').mask('(00) 00000-0000');
   $('#telefoneChamadas').mask('(00) 00000-0000');
   
   
   var date = new Date();
date.setDate(date.getDate()-1);
   
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  language: 'pt-BR',
	  orientation: 'bottom',
	  startDate: date
    })
	
	
   
   $(function () {
    $('#example1').DataTable();
	
	$('[data-toggle="tooltip"]').tooltip()
	
	<?php if(empty($_GET)){ ?> 

<?php }else { ?> 

<?php if ($_GET['result']=='ok'){ ?>	
	$('#modal-success').modal('show');
	<?php }; ?> 
	
	<?php if ($_GET['result']=='edited'){ ?>	
	$('#modal-edited').modal('show');
	<?php }; ?> 

	<?php if ($_GET['result']=='deleted'){ ?>	
	$('#modal-deleted').modal('show');
	<?php }; ?>

	<?php if ($_GET['result']=='fail'){ ?>	
	$('#modal-danger').modal('show');
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
   
});
</script>

 
	
	
</body>
</html>