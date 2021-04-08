<?php
$conexao = mysqli_connect("localhost", "root", "horus4321", "tarefas2020_1");
 
$id= $_POST["id"]; 
$dsc = $_POST['dsc'];
$qtd = $_POST['qtd'];
$valor =$_POST['valor'];
$valor = (float) $valor;
$habilita = $_POST['habilita'];

$sql = "update produtos set dsc = '" . $dsc . "', qtd = '" . $qtd . "', valor = '" . $valor .  "', habilita = '" . $habilita .  "' where id = ".$id;
/*$execsql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

$sql = "update produtos set qtd = '" . $qtd . "' where id = ".$id;
$execsql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

$sql = "update produtos set valor = '" . $valor . "' where id = ".$id;
$execsql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

$sql = "update produtos set habilita = '" . $habilita . "' where id = ".$id;*/
$execsql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
header('location:exibe_produto.php');

?>