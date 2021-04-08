<!DOCTYPE html>
  <head>
    <meta http-equiv="content-type" content="text/html, charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en " />  
    <meta name="author" content="1º Tenente Carlos Morais" />
    <meta name="description" content="Denúncias online para a CORREGEDORIA-GERAL
    " />
    <meta name="keywords" content="corregedoria, PM, PMAP, denúncia" />
    <meta name="generator" content=sublime />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="copyright" content="Governo do Estado do Amapá" />    
    <title>CORREGEDORIA-GERAL DA PMAP - Formulário de denúncia</title>
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

  .center {
  align-items: center;
}

.item {
  flex: 1;
  margin: 5px;
  padding: 0 10px;
  background: tomato;
  text-align: center;
  font-size: 1.5em;
}

}
    </style>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){

  $("#test_nome").val("");
  $("#test_nome").hide();
  $("#test_telefone").val("");
  $("#test_telefone").hide();
  $("#confirmar").hide();
  $("#editar").hide();
  $("#revisao").hide();

$('#test_s').click(function() {
    $("#test_nome").val("");
    $("#test_nome").show();
    $("#test_telefone").val("");
    $("#test_telefone").show();

   });

$('#test_n').click(function() {
    $("#test_nome").val("");
    $("#test_nome").hide();
    $("#test_telefone").val("");
    $("#test_telefone").hide();

   });

$('#editar').click(function(){
  
$('html, body').animate({
    scrollTop: $("#inicio").offset().top
}, 2000);
$('#revisao').show();
$("#editar").hide();
$("#enviar").hide();
$("#confirmar").show();
})

$('#enviar').click(function(){
  $("#enviar").hide();
  $("#confirmar").show();
  $("#editar").show();  
$('html, body').animate({
    scrollTop: $("#inicio").offset().top
}, 2000);
$('#revisao').show();
})
});

function uploadANEXO1() {
  var request = new XMLHttpRequest();
  request.upload.addEventListener("progress", uploadProgressDUT, false);
 
  //envia o form
  var formData = new FormData();
//  formData.append("comp_res", document.getElementById('comp_res').files[0]);
formData.append("dut", document.getElementById('dut').files[0]);
  request.open("POST", "upload.php");
  request.send(formData);
}

function uploadProgressDUT(event) {
  if (event.lengthComputable) {
    var percent = Math.round(event.loaded * 100 / event.total); //cálculo simples de porcentagem.  
    document.getElementById('progressbarDUT').value = percent; //atualiza o valor da progress bar.

  } else {
    //não é possível computar o progresso =/
  }
}
  </script>
</head>
<body>

<div class="container" id="inicio">
<article>
  <div class="alert alert-warning alert-dismissible" id="revisao">
   <strong>Releia sua denúncia!</strong> Caso esteja tudo certo, clique em confirmar. Caso contrário, clique em editar (no final da página)
</div>
<div id="header" class="container-fluid header bg-secondary">


<div class="row">  
  <div class="col-sm-4">
    <img src="pmap.png" class="img-fluid" id="brasaopm" style="padding-bottom: 10px">
  </div>
  <div class="col-sm-4 align-self-center">
    <p id="pheader">GOVERNO DO ESTADO DO AMAPÁ<br>
    POLÍCIA MILITAR<br>
    CORREGEDORIA-GERAL<br>
    </p>
  </div>
  <div class="col-sm-4"><img src="correg.png" id="brasaocorreg" class="img-fluid float-right" style="padding-bottom: 10px"></div>

</article>
</div>

<div class="container">
<article>
<form action="recebe_denuncia.php" enctype="multipart/form-data" method="post">
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO RECLAMANTE</p></div>
  <div class="form-group">
    <label for="form_nome">Nome completo:</label>
    <input type="text" class="form-control" id="form_nome" placeholder="Nome completo" name="form_nome" required>
  </div>

  <div class="form-group">
    <label for="form_nome">Sexo:</label>
    <select class="form-control" id="form_sexo" name="form_sexo" required>
      <option value="m" selected>Masculino</option>
      <option value="f">Feminino</option>
      <option value="o">Outro</option>
    </select>
  </div>

 <div class="row">
    <div class="col"><div class="form-group">
    <label for="form_cpf">CPF:</label>
    <input type="number" class="form-control" id="form_cpf" placeholder="números apenas" name="form_cpf" maxlength="11" required>
  </div></div>
    <div class="col"><div class="form-group">
    <label for="form_rg">RG:</label>
    <input type="number" class="form-control" id="form_rg" maxlength="12" name="form_rg" required>
  </div></div>
  </div>  

  <div class="form-group">
    <label for="form_endereco">Endereço:</label>
    <input type="text" class="form-control" id="form_endereco" placeholder="Rua/Av ...., nº.." name="form_endereco" required>
  </div>

  <div class="form-group">
    <label for="form_bairro">Bairro:</label>
    <input type="text" class="form-control" id="form_bairro" placeholder="Bairro" name="form_bairro" required>
  </div>

  <div class="form-group">
    <label for="form_cidade">Cidade:</label>
    <select name="form_cidade" id="form_cidade" required="true">
      <option value="Macapá">Macapá</option>
      <option value="Santana">Santana</option>
      <option value="Oiapopque">Oiapoque</option>
      <option value="Laranjal do Jari">Laranjal do Jarí</option>
      <option value="Mazagão">Mazagão</option>
      <option value="Porto Grande">Porto Grande</option>
      <option value="Tartarugalzinho">Tartarugalzinho</option>
      <option value="Vitória do Jari">Vitória do Jari</option>
<option value="Pedra Branca do Amapari">Pedra Branca do Amapari</option>
      <option value="Calçoene">Calçoene</option>
      <option value="Amapá">Amapá</option>
      <option value="Ferreira Gomes">Ferreira Gomes</option>
      <option value="Cutias do Araguary">Cutias do Araguary</option>
      <option value="Serra do Navio">Serra do Navio</option>
      <option value="Itaubal">Itaubal</option>
      <option value="Pracuúba">Pracuúba</option>

    </select>
    
  </div>

  <div class="form-group">
    <label for="form_referencia">Ponto de referência:</label>
    <input type="text" class="form-control" id="form_referencia" placeholder="Próximo a quê?" name="form_referencia">
  </div>

  <div class="form-group">
    <label for="form_email">E-mail:</label>
    <input type="email" class="form-control" id="form_email" placeholder="seuemail@provedor.com" name="form_email">
  </div>

<div class="row">
<div class="col"><div class="form-group">
    <label for="form_telefone">Telefone:</label>
    <input type="number" class="form-control" id="form_telefone" placeholder="(00)00000-0000" maxlenght="14" name="form_telefone" required>
  </div></div>

<div class="col"><div class="form-group">
    <label for="form_whatsapp">Whatsapp:</label>
    <input type="number" class="form-control" id="form_endereco" placeholder="(00)00000-0000" maxlength="14" name="form_whatsapp" required>
  </div></div>
</div>
</article>
</div>

<div class="container">

<article>
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DA OCORRÊNCIA</p></div>
  <div class="form-group">
    <label for="form_denunciado">Denunciado(s):</label>
    <input type="text" class="form-control" id="form_denunciado" name="form_denunciado">
  </div>

  <div class="form-group">
    <label for="form_bpm">Batalhão PM:</label>
    <select name="form_bpm" id="form_bpm" required="true">
      <option value="1º BPM">1º BPM</option>
      <option value="2º BPM">2º BPM</option>
      <option value="3º BPM">3º BPM (Ambiental)</option>
      <option value="4º BPM">4º BPM</option>
      <option value="5º BPM">5º BPM (BOPE)</option>
      <option value="6º BPM">6º BPM</option>
      <option value="7º BPM">7º BPM</option>
      <option value="8º BPM">8º BPM</option>
      <option value="9º BPM">9º BPM (BPTran)</option>
      <option value="10º BPM">10º BPM (FT)</option>
      <option value="11º BPM">11º BPM</option>
      <option value="12º BPM">12º BPM</option>
      <option value="13º BPM">13º BPM (BPRE)</option>
      <option value="14º BPM">14º BPM (BPRU)</option>
      <option value="nsei">Não tenho certeza</option>
    </select>
    </div>

  <div class="form-group">
    <label for="form_local">Local do fato:</label>
    <input type="text" class="form-control" id="form_local" placeholder="Rua/Av ...., nº.." name="form_local" required>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="form_data">Data:</label>
          <input type="date" class="form-control" id="form_data" placeholder="dd/mm/aaaa" name="form_data" required>
      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label for="form_hora">Hora:</label>
          <input type="time" class="form-control" id="form_hora" placeholder="hh:mm" name="form_hora" required>
      </div>
    </div>
  </div>

  <div class="container-fluid header bg-secondary"><p class="text-light">TESTEMUNHAS</p></div>

  <div class="form-group">
    <label class="radio-inline" style="padding: 10px; margin: 5px;">
      <input type="radio" name="optradio" id="test_s">Sim</label>
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" id="test_n" checked>Não</label>
    </label>

  </div>

  <div class="form-group" id="test_nome">
    <label for="form_testm_nome">Nome da testemunha:</label>
    <input type="text" class="form-control" id="form_testm_nome" placeholder="Nome completo" name="form_testm_nome">
  </div>

  <div class="form-group" id="test_telefone">
    <label for="form_testm_telefone">Telefone:</label>
    <input type="number" class="form-control" id="form_testm_telefone" placeholder="(00)00000-0000" name="form_testm_telefone">
  </div>

  <div class="container-fluid header bg-secondary"><p class="text-light">RELATO DO FATO</p></div>

  <div class="form-group">
    <textarea name="form_relato" class="form-control" wrap="hard" rows="50" cows="80" id="relato" placeholder="Descreva de forma suscinta e lógica o que houve, do começo ao fim com o máximo de detalhes que lembrar"></textarea>
  </div>

<div class="form-group">
 
    <label for="anexo1">Anexo: <em>Somente .jpg e jpeg</em></label><br>
    <input id="dut" type="file" name="anexo1" accept=".jpg, jpeg"/><!--<input onclick="javascript:uploadANEXO1();" type="button" value="Enviar" /><progress id="progressbarDUT" value="0" max="100"></progress>--><br>
  </div>

<div class="btn-group">
 <input type="submit" class="btn btn-primary" id="confirmar" value="Confirmar">
  <input type="reset" class="btn btn-danger" id="cancelar" value="Cancelar">
</div>

</form>
  
  <button class="btn btn-primary" id="enviar">Enviar</button>
  <button class="btn btn-warning" id="editar">Editar</button> 

<div class="row"><div class="col"></div><div class="col"></div></div>
<div class="alert alert-warning" style="text-align: justify;">
  <strong>Atenção:</strong> Caso os dados inseridos sejam falsos, essa reclamação não terá efeito para apuração e Vossa Senhoria será objeto de <strong>investigação</strong> por falsa denúncia de crime de acordo com o <strong>Art. 340 do Código Penal.</strong></div>

</div>

</article>

</div>
</body>
</html>