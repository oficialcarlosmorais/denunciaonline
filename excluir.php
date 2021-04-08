<?php
$conexao = mysqli_connect("localhost", "root", "horus4321", "banco");
$us_id= $_GET["id"]; 
$us_nome = $_GET["nome"]; 

$sql = "DELETE FROM usuario WHERE us_id=" . $us_id;
$execsql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
header('location:exibe.php');

?>