<?php
$us_id= $_GET["id"];
$us_nome = $_GET["nome"];
$conexao = mysqli_connect("localhost", "root", "horus4321", "banco");
$sql = "SELECT us_idade FROM usuario WHERE us_id = $us_id";
$registros = mysqli_query($conexao, $sql);

if (mysqli_num_rows($registros) > 0) {
	$usuario = array();
    
    while($linha = mysqli_fetch_assoc($registros)) {
   	$usuario = array("idade"=>$linha['us_idade']);
    }
}
?>
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
<strong>Digite seus novos dados</strong><br>
Nome atual: <em><?php echo $us_nome; ?></em><br>
Idade atual: <em><?php echo $usuario['idade']; ?></em>
		<form action="alter.php" method="post">
			<div class="form-group">
			Novo nome: <input type="text" name="txt_nome" required>	
			Nova idade: <input type="number" name="num_idade" min='0' max='100' required>
			<input type="hidden" name="us_id" value=<?php echo $us_id; ?>>
			<input type="submit" name="btn_ok" value="Enviar">
			</div>                                                            
		</form>

</article>

</body>
</html>