<?php

require_once('cabecalho.php');
require_once('conexao.php');
$dn_id = $_GET['dn_id'];

$sql = "SELECT * FROM denuncia WHERE dn_id=$dn_id";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { $dn_id=$row['dn_id'];?>

<div class="container">
<article>
<div id="header" class="container-fluid header bg-secondary">

<div class="row">  
  <div class="col-sm-4">
    <img src="pmap.png" class="img-fluid" id="brasaopm" style="padding-bottom: 10px">
  </div>
  <div class="col-sm-4 align-self-center">
    <p id="pheader">GOVERNO DO ESTADO DO AMAPÁ<br>
    POLÍCIA MILITAR<br>
    CORREGEDORIA-GERAL
    </p>
  </div>
  <div class="col-sm-4"><img src="correg.png" id="brasaocorreg" class="img-fluid float-right" style="padding-bottom: 10px"></div>

</article>
</div>

<div class="container">
<article>
<div class="card bg-light text-dark">
  <div class="card-body">
  <!--<div class="row">
    <div class="col">Protocolo: </div>
    <div class="col">Nº do PAP: </div>
    <div class="col">Origem: </div>
  </div>
  <div class="row">
    <div class="col">Encarregado: </div>
    <div class="col">Origem: </div>
  </div>-->
    <strong>Protocolo nº: </strong><?php echo $dn_id . " <br><strong> Status: </strong>" . $row["dn_status"] . " <br><strong>Origem:</strong> " . $row["dn_origem"] . " <br><strong> Encarregado: </strong>" . $row["dn_encarregado"];?></div>
</div>

<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO RECLAMANTE</p></div>
  <div class="form-group">
    <strong>Nome:</strong> <?php echo $row["dn_nome"]; ?>
  </div>

  <div class="form-group">
  <strong>Sexo:</strong> <?php
  if ($row['dn_sexo'] == 'm') {
                $sexo = "Masculino";
              }

              if ($row['us_sexo'] == 'f') {
                $sexo = "Feminino";
              }

              if ($row['us_sexo'] == 'o') {
                $sexo = "Outro";
              }
   echo $sexo; ?>
  </div>

  <div class="row">
    <div class="col"><div class="form-group">
    <strong>CPF:</strong> <?php echo $row["dn_cpf"]; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    <strong>RG:</strong> <?php echo $row["dn_rg"]; ?>
    </div>
  </div>
  </div>  

  <div class="form-group">
    <strong>Endereço:</strong> <?php echo $row["dn_endereco"]; ?>
  </div>

  <div class="form-group">
    <strong>Ponto de referência:</strong> <?php echo $row["dn_referencia"]; ?>
  </div>

  <div class="form-group">
    <strong>Bairro:</strong> <?php echo $row["dn_bairro"]; ?>
  </div>

  <div class="form-group">
    <strong>E-mail:</strong> <?php echo $row["dn_email"]; ?>
  </div>

<div class="row">
<div class="col"><div class="form-group">
    <strong>Telefone: </strong><?php echo $row["dn_telefone"]; ?>
  </div></div>

<div class="col"><div class="form-group">
    <strong>Whatsapp: </strong> <?php echo $row["dn_whatsapp"]; ?>
  </div></div>
</div>
</article>
</div>

<div class="container">

<article>
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DA OCORRÊNCIA</p></div>
  <div class="form-group">
    <strong>Denunciado(s): </strong> <?php echo $row["dn_denunciado"]; ?>
  </div>

  <div class="form-group">
    <strong>Batalhão PM: </strong> <?php echo $row["dn_batalhao"]; ?>
  </div>

  <div class="form-group">
  <strong>Local do fato: </strong> <?php echo $row["dn_local"]; ?>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <strong>Data: </strong> <?php echo date('d/m/Y', strtotime($row["dn_data"])); ?>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <strong>Hora: </strong> <?php echo $row["dn_hora"]; ?>
      </div>
    </div>
  </div>

  <div class="container-fluid header bg-secondary"><p class="text-light">TESTEMUNHAS</p></div>

  <div class="form-group" id="test_nome">
    <strong>Nome da testemunha: </strong> <?php echo $row["dn_test_nome"]; ?>
  </div>

  <div class="form-group" id="test_telefone">
  <strong>Telefone: </strong> <?php echo $row["dn_test_telefone"]; ?>
  </div>
</article>

<article>
  <div class="container-fluid header bg-secondary"><p class="text-light">RELATO DO FATO</p></div>

  <div class="card bg-light text-dark">
    <div class="card-body"><?php echo nl2br($row["dn_relato"]); ?></div>
  </div>

<div class="container-fluid header bg-secondary"><p class="text-light">ANEXO</p></div>

    <div class="form-group">
    <label>Anexo 1: </label>
    <?php  
    
      echo "<img width=400vw src=/correg/".$row['dn_anexo']. ">";}
      } else {
    echo "Nenhum anexo";
}

    ?>
    </div>

<div id="noprint">
  <form action="edita_denuncia.php" method="post">
    <input type="hidden" name="dn_id" value=<?php echo $dn_id; ?>> 
  <div class="alert alert-success">
    <em> Aperte CTRL+P para imprimir sua via.</em>
  </div>

<div class="row bg-painel text-dark">
  <div class="cow">
    <div class="card-body bg-painel text-dark">
      <label for="form_origem">Selecione a origem:</label>
      <select id="form_origem" name="form_origem" style="display: inline;">
        <option value="" selected disabled>Origem:</option>
        <option value="Comando Geral">Comando Geral</option>
        <option value="Presencial">Presencial</option>
        <option value="Online">Online</option>
        <option value="Judiciária">Judiciário</option>
        <option value="Ministério Público">Ministério Público</option>
        <option value="Delegacia de Polícia">Delegacia de Polícia</option>
        <option value="Outros">Outros</option>        
      </select>
    </div>
  </div>
  <div class="cow">
    <div class="card-body text-dark bg-painel">
      <label for="form_encarregado">Selecione um encarregado:</label>
      <select id="form_encarregado" name="form_encarregado">
      <option value="" selected disabled>Encarregados:</option>

        <?php
          $sql = "SELECT * FROM usuario";
          $result = mysqli_query($conexao, $sql);
        if ($_SESSION['us_permissao'] == 'DBA' or $_SESSION['us_permissao'] == 'Corregedor' or $_SESSION['us_permissao'] == 'Chefe'){
          
          if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              if ($row['us_patente'] == 'sd') {
                $enc_patente = "Soldado ";
              }
              if ($row['us_patente'] == 'cb') {
                $enc_patente = "Cabo ";
              }
              if ($row['us_patente'] == '3sgt') {
                $enc_patente = "3º Sargento ";
              }
              if ($row['us_patente'] == '2sgt') {
                $enc_patente = "2º Sargento ";
              }
              if ($row['us_patente'] == '1sgt') {
                $enc_patente = "1º Sargento ";
              }
              if ($row['us_patente'] == 'st') {
                $enc_patente = "Sub Tenente ";
              }
              if ($row['us_patente'] == 'cad1') {
                $enc_patente = "Cadete 1º ano ";
              }
              if ($row['us_patente'] == 'cad2') {
                $enc_patente = "Cadete 2º ano ";
              }
              if ($row['us_patente'] == 'cad3') {
                $enc_patente = "Cadete 3º ano ";
              }
              if ($row['us_patente'] == 'asp') {
                $enc_patente = "Aspirante a Oficial ";
              }
              if ($row['us_patente'] == '2ten') {
                $enc_patente = "2º Tenente ";
              }
              if ($row['us_patente'] == '1ten') {
                $enc_patente = "1º Tenente ";
              }
              if ($row['us_patente'] == 'cap') {
                $enc_patente = "Capitão ";
              }
              if ($row['us_patente'] == 'maj') {
                $enc_patente = "Major ";
              }
              if ($row['us_patente'] == 'tc') {
                $enc_patente = "Tenente Coronel ";
              }
              if ($row['us_patente'] == 'cel') {
                $enc_patente = "Coronel ";
              }

              echo '<option value="' .$enc_patente. " ". $row['us_nome_guerra'] .'">' . $enc_patente. $row['us_nome_guerra'] . "</option>"; }
          }
        }
        echo '</select></div></div><div class="cow"><div class="card-body bg-painel text-dark"><input type="submit" class="btn btn-primary" value="Editar"></div></div>';
        mysqli_close($conexao);?>
          

<?php
if ($_SESSION['us_permissao'] == 'DBA' or $_SESSION['us_permissao'] == 'Encarregado'){
echo '<div class="card-body bg-painel text-dark"><textarea id="form_andamento" name="form_andamento" placeholder="Digite aqui o encaminhamento da do PAP (intimações, encaminhamentos...)" cols="100" rows="10"></textarea>';
echo "<input type=hidden value=" . $_SESSION['us_cpf'] . " name=us_cpf>"; 
echo '<input type="submit" class="btn btn-primary" value="Editar">';
}
echo "<input type=hidden value=" . $dn_id . " name=dn_id>";

?>
</div>  
</div>
</form>

</div>
</article>
</div>

<div class="container-fluid" style="border: 1px solid black;">
<article>
<div class="row">
  <div class="cow-sm-8">
    8
  </div>
  <div class="cow-sm-4">
    4
  </div>
</div>
</article>
</div>


  <?php require_once('rodape.php');?>
