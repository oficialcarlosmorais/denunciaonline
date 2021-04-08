<?php
require_once('cabecalho.php');
require_once('conexao.php');
$us_id = $_GET['us_id'];

// Check connection
$sql = "SELECT * FROM usuario WHERE us_id=$us_id";
$result = mysqli_query($conexao, $sql); 

if (mysqli_num_rows($result) > 0) {
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

              if ($row['us_sexo'] == 'm') {
                $usuariosexo = "Masculino";
              }

              if ($row['us_sexo'] == 'f') {
                $usuariosexo = "Feminino";
              }

              if ($row['us_sexo'] == 'o') {
                $usuariosexo = "Outro";
              }

    $usuario = array("cpf"=>$row['us_cpf'], "rg"=>$row['us_rg'], "rgm"=>$row['us_rgm'], "nome"=>$row['us_nome'], "nome_guerra"=>$row['us_nome_guerra'], "patente"=>$usuariopatente, "sexo"=>$usuariosexo, "endereco"=>$row['us_endereco'], "bairro"=>$row['us_bairro'], "email"=>$row['us_email'], "telefone"=>$row['us_telefone'], "whatsapp"=>$row['us_whatsapp'], "senha"=>$row['us_senha'], "permissao"=>$row['us_permissao'], "status"=>$row['us_status'],);
  }
} else {echo "Nenhum registro encontrado<br>";}
mysqli_close($conexao);
?>

<div class="container">
<article>
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO USUÁRIO</p></div>

<div class="container-fluid">

 <div class="form-group">
    Nome: <?php echo $usuario['nome']; ?>
  </div>

  <div class="form-group">

  </div>

  <div class="form-group">
    Nome de guerra: <?php echo $usuario['nome_guerra']; ?>
  </div>

  <div class="form-group">
  Sexo: <?php echo $usuario['sexo']; ?>
  </div>

  <div class="row">
    <div class="col"><div class="form-group">
    CPF: <?php echo $usuario['cpf']; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    RG: <?php echo $usuario['rg']; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    RGM: <?php echo $usuario['rgm']; ?>
    </div>
  </div>
  </div>  

  <div class="form-group">
    Endereço: <?php echo $usuario['endereco']; ?>
  </div>

  <div class="form-group">
    Bairro: <?php echo $usuario['bairro']; ?>
  </div>

  <div class="form-group">
    E-mail: <?php echo $usuario['email']; ?>
  </div>

<div class="row">
<div class="col"><div class="form-group">
    Telefone: <?php echo $usuario['telefone']; ?>
  </div></div>

<div class="col"><div class="form-group">
    Whatsapp: <?php echo $usuario['whatsapp'];?>
  </div></div>

<div class="col"><div class="form-group">
    Permissão: <?php echo $usuario['permissao'];?>
  </div></div>
<div class="col"><div class="form-group">
    Status: <?php echo $usuario['status'];?>
  </div></div>
</div>
</div>
</article>
</div>

<div class="container">
<article class="bg-painel text-dark form-group">
<div class="container-fluid bg-painel text-dark form-group">

<div id="noprint">
 <form action="edita_usuario.php" method="post">
    <div class="row">
      <div class="cow" style="padding: 10px;">
      <input type="hidden" name="us_id" value=<?php echo $us_id; ?>>
      <div class="bg-painel">
      <label for="form_status">Status:</label>
      <select id="form_status" name="form_status">
        <option selected disabled><?php echo $usuario['status'];?></option>
        <option value="ativo">ATIVO</option>
        <option value="inativo">INATIVO</option>
      </select>
      </div>
      </div>
      <div class="cow" style="padding: 10px;">
      <div class="bg-painel text-dark form-group">
      <label for="form_permissao">Permissão:</label>
      <select id="form_permissao" name="form_permissao">
        <option selected disabled>Selecione</option>
        <option value="corregedor">Corregedor</option>
        <option value="chefe">Chefe</option>
        <option value="encarregado">Encarregado</option>
        <option value="auxiliar">Auxiliar</option>
        <option value="DBA">DBA</option>
      </select>
      </div>
      </div>
      <div class="cow" style="padding: 10px;">
      <input type="submit" class="btn btn-primary">
      </div>

    </div>

    </form>
  </div>
</article>
</div>

 <?php
 include_once('rodape.php');
 ?>