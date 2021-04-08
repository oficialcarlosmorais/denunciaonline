<?php
require_once('cabecalho.php');
require_once('conexao.php');

if ($_SESSION['us_permissao'] == 'DBA' or $SESSION['us_permissao'] == 'corregedor') { } else {header('location: correg_painel.php?error=4');}
?>

<div class="container">
<article>

<TABLE class="table-responsive" style="width: 80%;">
  <tr>
    <th colspan="6" style="text-align: center; background-color: white; border:1px solid black;">USUÁRIOS</th>
  </tr>
  <tr>
  <th>Nome</th><th>E-mail</th><th>Telefone</th><th>Permissão</th><th>Status</th>
  </tr>
  <?php

    $sql = "SELECT * FROM usuario";
    $result = mysqli_query($conexao, $sql);

      if (mysqli_num_rows($result) > 0) {
     // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          
             if ($row['us_patente'] == 'sd') {
                $usuariopatente = "Soldado ";
              }
              if ($row['us_patente'] == 'cb') {
                $usuariopatente = "Cabo ";
              }
              if ($row['us_patente'] == '3sgt') {
                $usuariopatente = "3º Sargento ";
              }
              if ($row['us_patente'] == '2sgt') {
                $usuariopatente = "2º Sargento ";
              }
              if ($row['us_patente'] == '1sgt') {
                $usuariopatente = "1º Sargento ";
              }
              if ($row['us_patente'] == 'st') {
                $usuariopatente = "Sub Tenente ";
              }
              if ($row['us_patente'] == 'cad1') {
                $usuariopatente = "Cadete 1º ano ";
              }
              if ($row['us_patente'] == 'cad2') {
                $usuariopatente = "Cadete 2º ano ";
              }
              if ($row['us_patente'] == 'cad3') {
                $usuariopatente = "Cadete 3º ano ";
              }
              if ($row['us_patente'] == 'asp') {
                $usuariopatente = "Aspirante a Oficial ";
              }
              if ($row['us_patente'] == '2ten') {
                $usuariopatente = "2º Tenente ";
              }
              if ($row['us_patente'] == '1ten') {
                $usuariopatente = "1º Tenente ";
              }
              if ($row['us_patente'] == 'cap') {
                $usuariopatente = "Capitão ";
              }
              if ($row['us_patente'] == 'maj') {
                $usuariopatente = "Major ";
              }
              if ($row['us_patente'] == 'tc') {
                $usuariopatente = "Tenente Coronel ";
              }
              if ($row['us_patente'] == 'cel') {
                $usuariopatente = "Coronel ";
              }
         echo '<tr><td '.  'onclick=' . "'" . 'window.location="visualiza_usuario.php?us_id=' . $row['us_id']. '";' . "'";
          echo " cursor: pointer;". '"'  .' style="max-width:20%;" ' . ">" . $usuariopatente . " " .$row['us_nome_guerra']. "</td><td>" . $row['us_email'] . "</td><td>" . $row['us_telefone'] . "</td><td>" .$row['us_permissao']. "</td><td>" .$row['us_status'].'</td></tr>'; 

            }
      } else {echo '<th colspan="5" style="text-align: center; background-color: white; border:1px solid black;">Nenhum registro encontrado</th>';}

mysqli_close($conexao);

?>
</TABLE>
</article>  
</div>
<?php include_once('rodape.php'); ?>
