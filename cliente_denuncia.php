<?php
require_once('cabecalho.php');
?>
<div class="container">
<article class="d-flex flex-column">
  <a href="index.html"><img src="images/logo.png" width="150"></a>
<h3>Criar sua conta IManager</h3><br>

<form action="add_produto.php" method="post">
<label for="nome">Nome:</label>
 <input type="text" class="form-control" name="nome" required placeholder="nome do produto" /><br>
<label for="sobrenome">Sobrenome:</label>
<input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required />
<br>
<label for="cpf">CPF:</label>
<input type="text" class="form-control" name="cpf" placeholder="Somente números" required /><br>
<label for="senha">Senha:</label>
<input type="password" class="form-control" name="senha" required /><br>
<input type="submit" class="btn btn-success" name="btn_add" value="Cadastrar">
</article>
</div>

<?php 
include_once('rodape.php');
?>