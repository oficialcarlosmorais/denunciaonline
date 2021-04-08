<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<article class="container">
		<form action="insere.php" method="post">
			<div class="form-group">
			Nome: <input type="text" name="txt_nome" required placeholder="Nome Completo" />		
			idade: <input type="number" name="num_idade" min='0' max='100'  required />
			<input type="submit" name="btn_ok" value="Enviar">
			</div>
		</form>

<table class="table table-striped thead-light table-bordered">
	<tr>
		<th>#</th>
		<th>Nome do usuário</th>
		<th>Idade</th>
		<th colspan="2"></th>
	</tr>
<?php
$conexao = mysqli_connect("localhost", "root", "horus4321", "banco");
$sql = "SELECT * FROM usuario";
$registro = mysqli_query($conexao, $sql);

if (mysqli_num_rows($registro) > 0) {
	$usuario = array();
    // output data of each row
    while($linha = mysqli_fetch_assoc($registro)) {
    	$contador = $contador+1;
    	$usuario = array("id"=>$linha['us_id'], "nome"=>$linha['us_nome'], "idade"=>$linha['us_idade']);
    	echo "<tr><td>" . $contador . "</td><td>" . $usuario["nome"] . "</td><td>" . $usuario["idade"] ."</td><td><a href=" . '"editar.php?id=' . $usuario["id"] . '&nome=' . $usuario["nome"] . '">EDITAR</a></td><td><a href="excluir.php?id=' . $usuario["id"] . '&nome=' . $usuario["nome"]. '">EXCLUIR</a></td></tr>';
     }
}
?>
</table>
</article>

</body>
</html>