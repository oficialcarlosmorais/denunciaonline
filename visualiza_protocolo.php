<?php
include_once('inicio.php');
?>
<div class="container">
  <article class="bg-light text-dark">
    <?php 
    include_once('cabecalho_correg.html')
     ?>
<?php
$protocolo = $_POST['form_protocolo'];
$err = 0;
if ($protocolo == ''){
  $erro = 1;
} else {
  include_once('conexao.php');
  $sql = "SELECT * FROM movimentacao WHERE mv_dn_id=$protocolo";
  $result = mysqli_query($conexao, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
      $mv_dn_id = array();
      $mv_msg = array();
      $mv_data_inicio = array();
      $mv_cpf = array();
while($row = mysqli_fetch_assoc($result)) {
      array_push($mv_dn_id, $row['mv_dn_id']);
      array_push($mv_msg, $row['mv_msg']);
      array_push($mv_data_inicio, $row['mv_data']);
      array_push($mv_cpf,$row['mv_cpf']);
      }
  } else {$erro = 2;}
  }
   ?>

<div class="container">
<article>
<div class="container-fluid">
  <form action="recebe_login.php" method="post" style="border: 2px solid silver; margin:auto; padding: 10px; border-radius: 10px;">

<?php 

switch ($erro) {
  case 1:
    echo '<div class="input-container"><div class="alert alert-danger"><strong>Campo "protocolo" em branco!</strong> Volte e digite um número de protocolo. Verifique o campo citado e tente novamente. <a href="correg_login.php">Voltar</a></div></div>';
    break;

  case 2:
    echo '<div class="input-container"><div class="alert alert-danger"><strong>Nenhum protocolo encontrado!</strong> Verifique o número digitado e tente novamente. <a href="correg_login.php">Voltar</a> </div></div>';
    break;
  
  default:

    include_once('visualiza_protocolo_flush.php');
    break;
}


?>
</article>
</div>

<?php include_once('rodape.php'); ?>


