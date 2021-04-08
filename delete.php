<?php
include("admin/pdo.class.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
	Deletar($id);
	header('location:show_produto.php');
	echo "<a href='show_produto.php' class='btn btn-primary'>Voltar</a>";
	}
	else 
	{ echo "<h1>Nenhum registro a deletar</h1><a href='show_produto.php' class='btn btn-primary'>Voltar</a>";}
?>

			