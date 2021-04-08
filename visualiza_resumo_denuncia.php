<?php
require_once('cabecalho.php');
require_once('conexao.php');
?>

<div class="container">
<article>
<!--<div class="row bg-primary">
<div class="col-sm-2">Protocolo</div><div class="col-sm-3">Reclamante</div><div class="col-sm-3">Denunciado</div><div class="col-lg-2">Data da denúncia</div><div class="col-sm-1">Status</div><div class="col-sm-1">Ações</div>
</div>-->
<TABLE style="max-width: 1200px;" class="table table-responsive table-hover">
  <tr>
    <th colspan="5" style="text-align: center; background-color: white; border:1px solid black;">DENÚNCIAS</th>
  </tr>
  <tr>
  <th style="width:20%;">Protocolo</th><th style="width:25%;">Reclamante</th><th style="width:25%;">Denunciado</th><th>Data da denúncia</th><th>Status</th>
  </tr>
  <?php

    $sql = "SELECT * FROM denuncia";
    $result = mysqli_query($conexao, $sql);

      if (mysqli_num_rows($result) > 0) {
     // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          /*echo '<div class="row"><div class="col-sm-2">' . $row['dn_id'] . '</div><div class="col-sm-3">' . $row['dn_nome'] . '</div><div class="col-sm-3">' . $row['dn_denunciado'] . '</div><div class="col-sm-2">' . $row['dn_ins_data'] . '</div><div class="col-sm-1">' . $row['dn_status'] . '</div><div class="col-sm-1"><p class="btn btn-primary align-self-center" onclick=' . "'" . 'window.location="visualiza_denuncia.php?dn_id=' . $row['dn_id']. '";' . "';>Editar</p></div></div>";*/

          $dn_ins_data = date("d/m/Y", strtotime($row['dn_ins_data']));

          echo "<tr onclick=\"window.location='visualiza_denuncia.php?dn_id=" . $row['dn_id'] . "';\"  style=\"cursor:pointer;\">
 <td>" . $row['dn_id'] . "</td>
  <td class=nome style=\"background:" . $fundo . ";\">" . $row['dn_nome'] . "</td>
 <td>" . $row['dn_denunciado'] . "</td><td>R$ " . $dn_ins_data . "</td> <td>" . $row['dn_status'] . "</td> </tr>";
          
//         echo '<tr><td '.  'onclick=' . "'" . 'window.location="visualiza_denuncia.php?dn_id=' . $row['dn_id']. '";' . "'";
//          echo " cursor: pointer;". '"'  .' style="max-width:20%;" ' . ">" . $row['dn_id'] . "</td><td cursor: default;>" . $row['dn_nome'] . "</td><td>" . $row['dn_denunciado'] . "</td><td>" . $dn_ins_data . "</td><td>" .$row['dn_status']. '</td></tr>'; 
//<td><p class="btn btn-primary align-self-center" onclick=' . "'" . 'window.location="visualiza_denuncia.php?dn_id=' . $row['dn_id']. '";' . "';>Editar</p></td>
            }
      } else {echo '<th colspan="5" style="text-align: center; background-color: white; border:1px solid black;">Nenhum registro encontrado</th>';}

mysqli_close($conexao);

?>
</TABLE>
</article>
</div>
<?php require_once('rodape.php');?>
 </body>
  </html>