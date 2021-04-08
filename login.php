<?php
include("admin/pdo.class.php");
$id=1;
	foreach (login($id) as $value) {
		$id = $value->id;
		$dsc = $value->dsc;
		$qtd = $value->qtd;
		$valor = $value->valor;
		$habilita = $value->habilita;
 } 
?>
