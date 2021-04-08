<?php
$conexao = mysqli_connect("localhost", "root", "horus4321", "banco");
$us_id= $_POST['us_id']; 
$us_nome = $_POST['txt_nome'];
$us_idade = $_POST['num_idade'];

$sql = "update usuario set us_nome = '" . $us_nome . "' where us_id = ".$us_id;
$execsql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
header('location:exibe.php');

?>