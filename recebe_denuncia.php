<?php
require_once('conexao.php');
// Check connection

$den_nome = $_POST["form_nome"];
$den_sexo = $_POST["form_sexo"];
$den_cpf = $_POST["form_cpf"];
$den_rg = $_POST["form_rg"];
$den_endereco = $_POST["form_endereco"];
$den_cidade = $_POST["form_cidade"];
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
$den_ins_data = date("Y/m/d", strtotime("now"));
$den_status = 'AGUARDANDO';
$den_ins_hora = date("H:i", strtotime("now"));
$den_id = strtotime("now").$den_cpf;
$ag_data = date("Y-m-d", strtotime("+2 days"));
//precisa capturar o último pap, adicionar +1 e salvar na tabela

$sql = "SELECT * FROM pap ORDER BY pap_numero DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $pap = array('numero' => $row['pap_numero']);

      $prox_pap = ($pap['numero'] + 1);
    }
} 
mysqli_query($conexao, "INSERT INTO pap (pap_numero, pap_data_abertura, pap_status) VALUES ('$prox_pap', '$den_ins_data', '$den_status')") or die(mysqli_error($conexao));

//script de upload
$target_dir = strtoupper(str_replace(" ", "_", $den_id));

$anexo1=$target_dir."anexo.".strtolower(pathinfo(basename($_FILES["anexo1"]["name"]),PATHINFO_EXTENSION));

//para uso no final do formulário
$ck_anexo = strtolower(pathinfo(basename($_FILES["anexo1"]["name"]),PATHINFO_EXTENSION));
//para uso no final do formulário

$baseanexo1 = basename($_FILES["anexo1"]["name"]);

if (!file_exists($target_dir)){
mkdir("anexos/$target_dir");

} 

$target_anexo1 = "anexos/".$target_dir ."/". $anexo1;
$uploadOk = 1;

$imageFileType = strtolower(pathinfo(basename($_FILES["anexo1"]["name"]),PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "2 - File is an image - " . $check["mime"] . "<br>1 - ";
        $uploadOk = 1;
    } else {
        echo "2 - File is not an image<br>";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "3 - Sorry, file already exists<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "err4 -Sorry, your file is too large<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $erro = "err5 - Desculpe, somente formatos JPG & JPEG permitidos.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    
    if (move_uploaded_file($_FILES["anexo1"]["tmp_name"], $target_anexo1)) {
        //echo "<br>DUT ". basename( $_FILES["dut"]["name"]). " has been uploaded. | basedut = " . $basedut;
        $anexo1 = "<br><img src=".$target_anexo1." width=400vw>";
        $den_anexo = $target_anexo1;
    } else {
        $erro .= "<br>Sorry, there was an error uploading your DUT."; 
    }

}
//script de upload


mysqli_query($conexao, "INSERT INTO denuncia (dn_n_pap,dn_cpf, dn_rg, dn_nome, dn_sexo, dn_endereco, dn_cidade, dn_referencia, dn_bairro, dn_email, dn_telefone, dn_whatsapp, dn_denunciado, dn_batalhao, dn_test_nome, dn_test_telefone, dn_local, dn_relato, dn_enquadramento, dn_data, dn_hora, dn_ins_data, dn_status, dn_ins_hora, dn_anexo, dn_id) VALUES ('$prox_pap','$den_cpf','$den_rg', '$den_nome','$den_sexo', '$den_endereco', '$den_cidade' , '$den_referencia','$den_bairro', '$den_email', '$den_telefone', '$den_whatsapp', '$den_denunciado', '$den_bpm', '$den_test_nome', '$den_test_telefone', '$den_local', '$den_relato', '$den_enquadramento', '$den_data', '$den_hora', '$den_ins_data', '$den_status', '$den_ins_hora', '$den_anexo', '$den_id')") or die(mysqli_error($conexao));

mysqli_query($conexao, "INSERT INTO agendamento (ag_den_id, ag_data, ag_status) VALUES ('$den_id','$ag_data', 'AGUARDANDO')") or die(mysqli_error($conexao));

mysqli_query($conexao, "INSERT INTO movimentacao (mv_data, mv_us_cpf, mv_dn_id, mv_msg) VALUES ('$den_ins_data', '', $den_id, 'Instaurado PAP nº $prox_pap.')") or die (mysqli_error($conexao));

$sql = "SELECT * FROM denuncia WHERE dn_id=$den_id AND dn_cpf=$den_cpf";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>

<!DOCTYPE html>
  <head>
    <meta http-equiv="content-type" content="text/html, charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en " />  
    <meta name="author" content="1º Tenente Carlos Morais" />
    <meta name="description" content="Denúncias online para a CORREGEDORIA-GERAL" />
    <meta name="keywords" content="corregedoria, PM, PMAP, denúncia" />
    <meta name="generator" content=sublime />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="copyright" content="Governo do Estado do Amapá" />    
    <title>CORREGEDORIA-GERAL DA PMAP - Denúncia recebida</title>
    <style type="text/css">
    article {
      border: 1px solid silver;
      padding: 15px;
      margin: 10px;
      border-radius: 5px;
      box-shadow: 1px 1px 10px grey; 
    }

    .header {
      border: 1px solid silver;
      padding-top: 15px;
      border-radius: 5px;
      margin: 5px;
    }

    #pheader{color: white;}

    p {
      font-weight: bold;
      text-align: center;}

@media only screen and (max-width: 775px) {
  #brasaocorreg {
    display: none;
  }

  #brasaopm {
    display: none;
  }

  #header {
    background-image: url("pmap.png");
    background-repeat: no-repeat;
    background-blend-mode: lighten;
    background-position: center;
  }

  #pheader{
    color: black;
    font-size: 15px;
  }

  .justificado {text-align: justify;}



}

@media print {
    #noprint {display: none;}
  }
    </style>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    
function PrintDiv() {    
       window.print();
       window.location.href = "http://178.128.7.86/form_denuncia.php";
            }
  </script>

  </head>
  <body>

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
    CORREGEDORIA-GERAL
    </p>
  </div>
  <div class="col-sm-4"><img src="correg.png" id="brasaocorreg" class="img-fluid float-right" style="padding-bottom: 10px"></div>

</article>
</div>

<div class="container">
<article>
<form action="recebe_denuncia.php" method="post">

<div class="card bg-light text-dark">
    <div class="card-body"><strong>Protocolo nº: </strong><?php echo $row["dn_id"] . "<br>";?>
    <strong>PAP nº: </strong>000<?php echo $prox_pap . "-" . date("Y", strtotime($den_ins_data)) . "/CORREG/PMAP";?></div>
</div>

<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO RECLAMANTE</p></div>
  <div class="form-group">
    <strong>Nome:</strong> <?php echo $row["dn_nome"]; ?>
  </div>

  <div class="form-group">
  <strong>Sexo: </strong> <?php if ($row['dn_sexo'] == 'm') {
                $sexo = "Masculino";
              }

              if ($row['dn_sexo'] == 'f') {
                $sexo = "Feminino";
              }

              if ($row['dn_sexo'] == 'o') {
                $sexo = "Outro";
              }
   echo $sexo; ?>
  </div>

  <div class="row">
    <div class="col"><div class="form-group">
    <strong>CPF: </strong> <?php echo $row["dn_cpf"]; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    <strong>RG: </strong> <?php echo $row["dn_rg"]; ?>
    </div>
  </div>
  </div>  

  <div class="form-group">
    <strong>Endereço: </strong> <?php echo $row["dn_endereco"]; ?>
  </div>

  <div class="form-group">
    <strong>Ponto de referência:</strong> <?php echo $row["dn_referencia"]; ?>
  </div>

  <div class="form-group">
    <strong>Bairro: </strong> <?php echo $row["dn_bairro"]; ?>
  </div>

  <div class="form-group">
    <strong>Cidade: </strong> <?php echo $row["dn_cidade"]; ?>
  </div>

  <div class="form-group">
    <strong>E-mail: </strong> <?php echo $row["dn_email"]; ?>
  </div>

<div class="row">
<div class="col"><div class="form-group">
    <strong>Telefone: </strong><?php echo $row["dn_telefone"]; ?>
  </div></div>

<div class="col"><div class="form-group">
   <strong> Whatsapp: </strong> <?php echo $row["dn_whatsapp"]; ?>
  </div></div>
</div>
</article>
</div>

<div class="container">

<article>
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DA OCORRÊNCIA</p></div>
  <div class="form-group">
    <strong>Reclamado(s): </strong> <?php echo $row["dn_denunciado"]; ?>
  </div>

  <div class="form-group">
    <strong>Batalhão PM: </strong> <?php echo $row["dn_batalhao"]; ?>
  </div>

  <div class="form-group">
  <strong>Local do fato: </strong><?php echo $row["dn_local"]; ?>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <strong>Data: </strong><?php echo date("d/m/Y", strtotime($row["dn_data"])); ?>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <strong>Hora: </strong><?php echo $row["dn_hora"]; ?>
      </div>
    </div>
  </div>

  <div class="container-fluid header bg-secondary"><p class="text-light">TESTEMUNHAS</p></div>

  <div class="form-group" id="test_nome">
    <strong>Nome da testemunha: </strong><?php echo $row["dn_test_nome"]; ?>
  </div>

  <div class="form-group" id="test_telefone">
  <strong>Telefone: </strong><?php echo $row["dn_test_telefone"]; ?>
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
  <div class="alert alert-success" style="text-align: justify;">
  <strong>Reclamação registrada com sucesso!</strong><em> Aperte CTRL+P para imprimir sua via.<br>1 - Compareça dia <strong><?php //echo date("d/m/Y", strtotime($ag_data)); ?>22/04/2020 às 11h da manhã a Corregedoria-Geral da PMAP <em>(Rua Hildemar Maia, nº 132, bairro: Buritizal)</em></strong> com seus <strong>documentos</strong> e outras provas que tiver para <strong>validar sua reclamação</strong></em>.<br>2 - Caso os dados inseridos sejam falsos, essa reclamação não terá efeito para apuração e Vossa Senhoria será objeto de investigação por falsa denúncia de crime de acordo com o <strong>Art. 340 do Código Penal.</strong></div>

  <div class="alert alert-primary" style="text-align: justify;">
  A Polícia Militar do Amapá agradece sua colaboração e reforça seu compromisso com a segurança de Vossa Senhoria e de toda sociedade amapaense.</div>
  
</div>
</form>

</div>
</article>

 </body>
  </html>