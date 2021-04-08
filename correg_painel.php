<?php
require_once('cabecalho.php');
require_once('conexao.php');
?>
<div class="container">
<article class="d-flex justify-content-between">

<a href="visualiza_resumo_denuncia.php"><div class="jumbotron" style="max-width: 320px;">
	<img src="denuncia.png" class="mx-auto d-block" style="max-width: 100px; height: auto;">
  <h3 align=center>Denúncias</h3>

  <?php
   	$sql = "SELECT * FROM denuncia WHERE dn_status='AGUARDANDO'";
		$result = mysqli_query($conexao, $sql);

		if (mysqli_num_rows($result) > 0) {
    		// output data of each row
    		while($row = mysqli_fetch_assoc($result)) { $n_denuncia = $n_denuncia+1;} 
    	echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'."Existem <strong>$n_denuncia</strong> denúncias novas.</div>";
    	}
 
    ?>
  
  </div></a>

  <div class="jumbotron"  style="max-width: 320px;">
	<img src="agenda.png" class="mx-auto d-block" style="max-width: 100px; height: auto;">
  <h3 align=center>Agendamentos</h3>



<?php
    $sql = "SELECT * FROM agendamento WHERE ag_data=date('Y/m/d', now())";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) { $n_agendamento = $n_agendamento+1;} 
      echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'."Existem <strong>$n_agendamento</strong> para hoje.</div>";
      }
 
    ?>
  </div>

<?php 
if ($_SESSION['us_permissao'] == 'DBA' or $SESSION['us_permissao'] == 'corregedor') {$style = '"max-width: 320px;"'; } else {$style = '"display: none;"';} ?>

  <a href="visualiza_resumo_usuario.php"><div class="jumbotron" style=<?php echo $style;?>>
	<img src="ico_mil.png" class="mx-auto d-block" style="max-width: 100px; height: 100px;">
  <h3 align=center>Usuários</h3>

  <?php
    $sql = "SELECT * FROM usuario WHERE us_status='ativo'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) { $n_usuarios = $n_usuarios+1;} 
      echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'."Existem <strong>$n_usuarios</strong> usuários habilitados no sistema.</div>";
      }
 
    ?>
  </div>
</a>
</article>
</div>

<?php 
include_once('rodape.php');
?>