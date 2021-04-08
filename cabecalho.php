<?php
// Start the session
session_start();

if ($_SESSION['us_patente'] == '' or $_SESSION['us_nome_guerra'] == '' or $_SESSION['us_permissao'] == '' or $_SESSION['us_cpf'] ==  ''){
  session_unset();
  session_destroy();
  header('Location: correg_login.php?error=2');
  echo "em claro " .$_SESSION['us_patente'];
}

if ($_GET['error'] == '4'){
  session_unset();
  session_destroy();
  header('Location: correg_login.php?error=4');
  echo "em claro " .$_SESSION['us_patente'];
}

if ($_GET['exit']==1) {
  session_unset();
  session_destroy();
  header('Location: correg_login.php');
}

switch ($_SESSION['us_patente']) {
  case 'sd':
    $patente = 'SD ';
    break;
  case 'cb':
    $patente = 'CB ';
    break;
  case '3sgt':
    $patente = '3º SGT ';
    break;
  case '2sgt':
    $patente = '2º SGT ';
    break;
  case '1sgt':
    $patente = '1º SGT ';
    break;
  case 'st':
    $patente = 'ST ';
    break;
  case '1cad':
    $patente = 'CAD 1º ano ';
    break;
  case '2cad':
    $patente = 'CAD 2º ano ';
    break;
  case '3cad':
    $patente = 'CAD 3º ano ';
    break;
case 'asp':
    $patente = 'ASP OF ';
    break;
case '2ten':
    $patente = '2º TEN ';
    break;
case '1ten':
    $patente = '1º TEN ';
    break;
case 'cap':
    $patente = 'CAP ';
    break;
case 'maj':
    $patente = 'MAJ';
    break;
case 'tc':
    $patente = 'TC ';
    break;
case 'cel':
    $patente = 'CEL ';
    break;
  }

$nome_guerra = $_SESSION['us_nome_guerra'];
$us_permissao = $_SESSION['us_permissao'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html, charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en " />  
    <meta name="author" content="1º Tenente Carlos Morais" />
    <meta name="description" content="CORREGEDORIA-GERAL PMAP" />
    <meta name="keywords" content="corregedoria, PM, PMAP, denúncia" />
    <meta name="generator" content=sublime />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="copyright" content="Governo do Estado do Amapá" />    
    <title>CORREGEDORIA-GERAL DA PMAP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    *{margin:0; border:0; padding:0; box-sizing: border-box;}
     article {
      border: 1px solid silver;
      padding: 15px;
      margin: 10px;
      border-radius: 5px;
      box-shadow: 1px 1px 10px grey; 
    }
footer{width: 100%; background-color: silver; font-size: 1vw; text-align: center; padding: 5px;}
    table, tr, td, th {
      margin: 0px auto;
      padding: 10px;
      width: 100%;
    }

    table {
      display: flex;
      margin: 0px auto;
      align-self: center;
    }

    th {
      background-color: gray;
    }

  tr:hover {
      background-color: silver;
      cursor: pointer;
    }

    tr:nth-child(odd) {
      background: white;
    }

    tr:nth-child(even) {
      background: #e6f2ff;
    }

    td:nth-child(1) {
      width: 10%;
    }

a, a:hover, a:active {
  text-decoration: none;
  color: black;
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

   .bg-painel {background-color:#f2f2f2;}
   label, .label {font-weight: bolder;}

 	@media only screen and (max-width: 775px) { footer{font-size: 3vw;}  }

  @media print {
    #noprint {display: none;}
    
  }
 
  </style>
</head>
<body>
	
<div class="container-fluid bg-dark" style="border: 1px solid black;">
  <?php require_once('menu.php'); ?>


</div>