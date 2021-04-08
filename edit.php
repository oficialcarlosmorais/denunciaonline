<?php
include("admin/pdo.class.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
	foreach (MostrarEdicao($id) as $value) {
		$id = $value->id;
		$dsc = $value->dsc;
		$qtd = $value->qtd;
		$valor = $value->valor;
		$habilita = $value->habilita;
 } ;

}

if($_POST['btn-editar']){
	$dados =[
		"dsc"=>$_POST['dsc'],
		"qtd"=>$_POST['qtd'],
		"valor"=>$_POST['valor'],
		"habilita"=>$_POST['habilita'],
		"id"=>$_POST['id']
		];
	Atualizar($id, $dados);
	header('location:show_produto.php');
	}

if($_POST['btn-cancelar']){
	header('location:show_produto.php');
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
<h3>Editar registro</h3>
<hr>
<form method="post">
	<div class="form-group">
		<label for="dsc">Descrição do Produto</label>
		<input class="form-control" type="text" name="dsc" id="dsc" value="<?php echo $dsc;?>" required>
		<small>Dados inportantes para o Banco de Dados</small>
	</div>
	<div class="form-group">
		<label for="qtd">Quantidade</label>
		<input class="form-control" type="number" name="qtd" value="<?php echo $qtd;?>" required>
		<small>Insira a quantidade</small>
	</div>

	<div class="form-group">
		<label for="valor">Valor do Produto</label>
		<input class="form-control" type="number" name="valor" id="valor" value="<?php echo $valor;?>" required>
		<small>Insira o novo valor</small>
	</div>

	<div class="form-group">
		<label for="valor">Valor do Produto</label>
		<select id="valor" name="habilita">
				<option selected value="<?php echo $habilita;?>" > </option>
				<option value="S">Sim</option>	
				<option value="N">Não</option>		
			</select>
	</div>

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="btn-editar" value="Editar">

		<a class="btn btn-danger"  href="javascript:history.back()">Cancelar</a>
	</div>
</form>

</article>
</body>
</html>
