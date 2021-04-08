<?php
$conexao = mysqli_connect("localhost", "root", "horus4321", "banco");
$us_idade= $_POST["num_idade"]; 
$us_nome = $_POST["txt_nome"]; 

if(isset($_POST['btn_ok'])) {
	mysqli_query($conexao, "INSERT INTO usuario (us_nome, us_idade) VALUES ('$us_nome', '$us_idade')") or die(mysqli_error($conexao));}
header('location:exibe.php');
?>