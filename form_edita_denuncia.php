<?php

require_once('cabecalho.php');
require_once('conexao.php');
/*
$den_nome = $_POST["form_nome"];
$den_sexo = $_POST["form_sexo"];
$den_cpf = $_POST["form_cpf"];
$den_rg = $_POST["form_rg"];
$den_endereco = $_POST["form_endereco"];
$den_referencia = $_POST["form_referencia"];
$den_bairro = $_POST["form_bairro"];
$den_email = $_POST["form_email"];
$den_telefone = $_POST["form_telefone"];
$den_whatsapp = $_POST["form_whatsapp"];
$den_denunciado = $_POST["form_denunciado"];
$den_bpm = $_POST["form_bpm"];
$den_local = $_POST["form_local"];
$den_data = $_POST["form_data"];
$den_hora = $_POST["form_hora"];
$den_test_nome = $_POST["form_testm_nome"];
$den_test_telefone = $_POST["form_testm_telefone"];
$den_relato = $_POST["form_relato"];
$den_enquadramento = $_POST["form_enquadramento"];
$den_ins_data = '2020/03/24';
$den_status = 'AGUARDANDO';
$den_ins_hora = date("H:M", strtotime("now"));
$den_id = strtotime("now").$den_cpf;
$ag_data = date("Y-m-d", strtotime("+2 days"));*/

$dn_id = $_GET['dn_id'];

$sql = "SELECT * FROM denuncia WHERE dn_id=$dn_id";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>


<div class="container">
<article>
<div id="header" class="container-fluid header bg-secondary">

<div class="row">  
  <div class="col-sm-4">
    <img src="pmap.png" class="img-fluid" id="brasaopm" style="padding-bottom: 10px">
  </div>
  <div class="col-sm-4">
    <p id="pheader">GOVERNO DO ESTADO DO AMAPÁ<br>
    POLÍCIA MILITAR<br>
    CORREGEDORIA-GERAL<br>
    SUBDIVISÃO DE DENÚNCIA
    </p>
  </div>
  <div class="col-sm-4"><img src="correg.png" id="brasaocorreg" class="img-fluid float-right" style="padding-bottom: 10px"></div>

</article>
</div>

<div class="container">
<article>
<form action="recebe_denuncia.php" method="post">

<div class="row">
  <div class="card-body">Protocolo nº: <?php echo $row["dn_id"] . " | Status: " . $row["dn_status"];?>
  </div>
</div>
<div class="row bg-light text-dark">
  <div class="card-body bg-light text-dark">
      <label for="form_origem">Origem:</label>
      <select id="form_origem" name="form_origem" style="display: inline;">
        <option value="cmd_geral">Comando Geral</option>
        <option value="presencial">Presencial</option>
        <option value="online">Online</option>
        <option value="judiciaria">Judiciário</option>
        <option value="mp">Ministério Público</option>
        <option value="delegacia">Delegacia de Polícia</option>
        <option value="outras">Outros</option>        
      </select>
    </div>
</div>
</div>


<div class="container">
<article>
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO DENUNCIANTE</p></div>
  <div class="form-group">
    Nome: <?php echo $row["dn_nome"]; ?>
  </div>

  <div class="form-group">
  Sexo: <?php echo $row["dn_sexo"]; ?>
  </div>

  <div class="row">
    <div class="col"><div class="form-group">
    CPF: <?php echo $row["dn_cpf"]; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    RG: <?php echo $row["dn_rg"]; ?>
    </div>
  </div>
  </div>  

  <div class="form-group">
    Endereço: <?php echo $row["dn_endereco"]; ?>
  </div>

  <div class="form-group">
    Ponto de referência: <?php echo $row["dn_referencia"]; ?>
  </div>

  <div class="form-group">
    Bairro: <?php echo $row["dn_bairro"]; ?>
  </div>

  <div class="form-group">
    E-mail: <?php echo $row["dn_email"]; ?>
  </div>

<div class="row">
<div class="col"><div class="form-group">
    Telefone:<?php echo $row["dn_telefone"]; ?>
  </div></div>

<div class="col"><div class="form-group">
    Whatsapp: <?php echo $row["dn_whatsapp"]; ?>
  </div></div>
</div>
</article>
</div>

<div class="container">

<article>
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DA OCORRÊNCIA</p></div>
  <div class="form-group">
    Denunciado(s): <?php echo $row["dn_denunciado"]; ?>
  </div>

  <div class="form-group">
    Batalhão PM: <?php echo $row["dn_bpm"]; ?>
  </div>

  <div class="form-group">
  Local do fato: <?php echo $row["dn_local"]; ?>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        Data: <?php echo $row["dn_data"]; ?>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        Hora: <?php echo $row["dn_hora"]; ?>
      </div>
    </div>
  </div>

  <div class="container-fluid header bg-secondary"><p class="text-light">TESTEMUNHAS</p></div>

  <div class="form-group" id="test_nome">
    Nome da testemunha: <?php echo $row["dn_test_nome"]; ?>
  </div>

  <div class="form-group" id="test_telefone">
  Telefone: <?php echo $row["dn_test_telefone"]; ?>
  </div>
</article>

<article>
  <div class="container-fluid header bg-secondary"><p class="text-light">RELATO DO FATO</p></div>

  <div class="card bg-light text-dark">
    <div class="card-body"><?php echo nl2br($row["dn_relato"]);} ?></div>
  </div>

<?php } else {
    echo "Nenhum registro encontrado!";
}

mysqli_close($conexao);

?>
<div class="container-fluid header bg-secondary"><p class="text-light">ANEXO</p></div>

    <div class="form-group">
    <label>Anexo 1: </label>
    <?php  
    if ($ck_anexo =! '1') {
      echo "<em>Sem anexos</em>";
    } else {
      echo $anexo1;
    }

    ?>
    </div>

<div id="noprint">
  <div class="alert alert-success">Aperte CTRL+P para imprimir</div>
    <?php echo '<buttom class="btn btn-primary"' . " onclick=\"window.location='form_edita_denuncia.php?dn_id=" . $dn_id . "';\"  style=\"cursor:pointer;\">Editar</buttom>";

  ?>
  
</div>
</form>

</div>
</article>

 </body>
  </html>