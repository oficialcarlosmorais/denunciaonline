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
    <title>CORREGEDORIA-GERAL DA PMAP - Formulário de cadastro de usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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

}
    </style>
  
</head>
<body>

<div class="container" id="inicio">
<article>
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
<form action="recebe_new_user.php" enctype="multipart/form-data" method="post">
<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO USUÁRIO</p></div>
  <div class="form-group">
    <label for="form_nome">Nome completo:</label>
    <input type="text" class="form-control" id="form_nome" placeholder="Nome completo" name="form_nome" required>
  </div>

  <div class="form-group">
    <label for="form_nome_guerra">Nome de Guerra:</label>
    <input type="text" class="form-control" id="form_nome_guerra" placeholder="Nome de guerra" name="form_nome_guerra" required>
  </div>

  <div class="form-group">
    <label for="form_patente">Patente:</label>
    <select name="form_patente" class="form-control" id="form_patente">
      <option value="sd">Soldado</option>
      <option value="cb">Cabo</option>
      <option value="3sgt">3º Sargento</option>
      <option value="2sgt">2º Sargento</option>
      <option value="1sgt">1º Sargento</option>
      <option value="st">Sub Tenente</option>
      <option value="cad1">Cadete 1º ano</option>
      <option value="cad2">Cadete 2º ano</option>
      <option value="cad3">Cadete 3º ano</option>
      <option value="asp">Aspirante</option>
      <option value="2ten">2º Tenente</option>
      <option value="1ten">1º Tenente</option>
      <option value="cap">Capitão</option>
      <option value="maj">Major</option>
      <option value="tc">Tenente Coronel</option>
      <option value="cel">Coronel</option>
    </select>
    
  </div>
  <div class="form-group">
    <label for="form_sexo">Sexo:</label>
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
    <div class="col"><div class="form-group">
    <label for="form_rgm">RGM:</label>
    <input type="text" class="form-control" id="form_rgm" name="form_rgm" maxlength="11" required>
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
    <label for="form_email">E-mail:</label>
    <input type="email" class="form-control" id="form_email" placeholder="seuemail@provedor.com" name="form_email" required>
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

  <div class="form-group">
    <label for="form_senha">Senha:</label>
    <input type="password" class="form-control" id="form_senha" name="form_senha" required>
  </div>

<div class="btn-group">
 <input type="submit" class="btn btn-primary" id="confirmar" value="Confirmar">
  <input type="reset" class="btn btn-danger" id="cancelar" value="Cancelar">
</div>
</article>
</div>

</form>
  
</div>
</article>

</div>
</body>
</html>