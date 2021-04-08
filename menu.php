<nav class="container-fluid d-flex justify-content-between">
	<div class="dropdown">
		<a class="navbar-brand" href="correg_painel.php">
			<img src="pmap.png" alt="PMAP" style="width:40px;">
		</a>
		<a class="navbar-brand" href="correg_painel.php">
			<img src="correg.png" alt="Corregedoria-Geral" style="width:40px;">
		</a>
	</div>
	
	<div class="dropdown align-self-center">
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			<img src="ico_mil.png" class="img-fluid" style="max-width: 20px;">
				<?php
					echo $patente . " " . $nome_guerra;
				?>
  		</button>
  		<div class="dropdown-menu">
<?php
		if ($_SESSION['us_permissao'] == 'DBA'){
  		echo '<a class="dropdown-item" href="visualiza_resumo_usuario.php">Editar usuários</a>';
    	}
?>
  		
  		<a class="dropdown-item" href="correg_painel.php?exit=1">Sair</a>
    	</div>
	</div>

</nav>