<?php
require('../conexao.php');
 if(isset($_FILES['pic']))
 {
	
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = '../../promo/'; //Diretório para uploads
 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
	$upload="UPDATE promocoes SET imagem = 'https://seupedidoo.com.br/promo/$new_name' WHERE id = $id;";
	$uquery = mysqli_query($conexao,$upload)or die(mysqli_error());
	
	if ($uquery == true) {
	header("Location: ../promo-view.php?id=$id"); exit;
	}else{
	header("Location: ../promo-view.php?id=$id"); exit;
	}
	
 } ?>