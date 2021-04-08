<?php
include("admin/pdo.class.php");

//IMANAGER
if($_POST['btn_add']){
	$dados =[
		"nome"=>$_POST['nome'],
		"sobrenome"=>$_POST['sobrenome'],
		"senha"=>$_POST['senha'],
		"cpf"=>$_POST['cpf']
		];
	ECHO $dados['dsc'], $dados['qtd'], $dados['valor'], $dados['habilita'];   
	Novo($dados);
	$cpf=$dados['cpf'];
	header("location:show_cliente.php?cpf=$cpf");
	} else {echo "nada";
	ECHO $dados['dsc'], $dados['qtd'], $dados['valor'], $dados['habilita'];   
}


if($_POST['btn_cadastrar']){
	$dados =[
		"dsc"=>$_POST['dsc'],
		"qtd"=>$_POST['qtd'],
		"valor"=>$_POST['valor'],
		"habilita"=>$_POST['habilita']
		];
	ECHO $dados['dsc'], $dados['qtd'], $dados['valor'], $dados['habilita'];   
	Cadastrar($dados);
	header('location:show_produto.php');
	} else {echo "nada";
	ECHO $dados['dsc'], $dados['qtd'], $dados['valor'], $dados['habilita'];   
}

?>