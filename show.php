<?php 
include("admin/pdo.class.php");


echo $contador . "<Br>";

?>

<!DOCTYPE html>
<?php
require_once('cabecalho.php');
?>
<div class="container">
<article class="d-flex flex-column">
  <a href="index.html"><img src="images/logo.png" width="150"></a>
<h3>Parabéns! Conta criada com sucesso!</h3><br>
		
<table style="width: 100%;" class="table table-striped thead-light table-bordered flex-grow-1">
	<tr>
		<th class="flex-grow-1">CPF</th>
		<th class="flex-grow-1">NOME</th>
		<th class="flex-grow-1">SOBRENOME</th>
		<th class="flex-grow-1">SENHA</th>
	</tr>
<?php

$cpf = $_GET['cpf'];
foreach (MostrarEdicao($cpf) as $value) {
		$contador = $contador+1;
		$nome = $value->usf_nome;
		$sobrenome = $value->usf_sobrenome;
		$senha = $value->usf_senha;
		$cpf = $value->usf_cpf;
		$id = $value->usf_id;

		    	echo "<tr><td>" . $cpf . "</td><td>" . $nome . "</td><td>" . $sobrenome . "</td><td>" . $senha . "</td></tr>";
 }   	

?>
</table>

</article>

<?php 
include_once('rodape.php');
?>