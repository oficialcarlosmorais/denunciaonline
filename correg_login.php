<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html, charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en " />  
    <meta name="author" content="1º Tenente Carlos Morais" />
    <meta name="description" content="Login da CORREGEDORIA-GERAL" />
    <meta name="keywords" content="corregedoria, PM, PMAP, denúncia" />
    <meta name="generator" content=sublime />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="copyright" content="Governo do Estado do Amapá" />    
    <title>CORREGEDORIA-GERAL DA PMAP - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  padding-top:15px; 
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

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
a:link {
  color: white;
}

/* visited link */
a:visited {
  color: white;
}

/* mouse over link */
a:hover {
  color: white;
}

/* selected link */
a:active {
  color: white;
}

a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: none;
}

    p {
      font-weight: bold;
      text-align: center;}
    footer{width: 100%; background-color: silver; font-size: 1vw; text-align: center; padding: 5px;}

@media only screen and (max-width: 775px) {
  footer{font-size: 3vw;}
  
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

  form {
    max-width:500px;
    margin:auto}

}
</style>
</head>
<body>
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

<div class="container bg-light text-dark">
  <?php 
      $err = $_GET['error'];
      switch ($err) {
        case 1:
        echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Usuário ou senha inválidos</strong></div>';
          break;
        case 2:
        echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Usuário não identificado!</strong> Faça login com suas credenciais para obter acesso.</div>';
          break;
        case 3:
        echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Usuário inabilitado!</strong> Procure o setor de TI.</div>';
          break;
        case 4:
        echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Acesso negado!</strong></div>';
          break;
      }
   ?>
  <article>
    <div class="row">
    <div class="col-sm-7 align-self-center">
      <center>
        <button class="btn btn-success" style="max-width: 500px;"><a href="form_denuncia.php">Faça sua reclamação aqui</a></button>
      </center>
    </div>
    <div class="col-sm-5">
      
      <form action="recebe_login.php" method="post" style="max-width:400px; border: 2px solid silver; margin:auto; padding: 10px; border-radius: 10px;">
  <p>Faça login para começar sua sessão</p>
  <div class="input-container ">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Login" name="form_login">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Senha" name="form_senha">
  </div>

  <button type="submit" class="btn">Entrar</button>
</form>

    </div>
  </div>
</article>
</div>


<div class="container">
  <article class="bg-light text-dark">

  <form action="visualiza_protocolo.php" method="post" style="max-width:400px; border: 2px solid silver; margin:auto; padding: 10px; border-radius: 10px;">
     <p>Acompanhar denúncias</p>
 
  <div class="input-container">

    <i class="fa fa-th-list icon"></i>
    <input type="text" class="input-field" placeholder="Digite o número do protocolo" name="form_protocolo">
  </div>

  <button type="submit" class="btn">Procurar</button>
</form>

</article>
</div>

<?php include_once('rodape.php'); ?>