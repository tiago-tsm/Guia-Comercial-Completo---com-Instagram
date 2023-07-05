<?php
$conexao = mysqli_connect('localhost', 'root', '');
$banco = mysqli_select_db($conexao,'guiacomercial');
mysqli_set_charset($conexao,'utf8');

?>