<?php
require_once('conexao.php');

$us_id = $_POST['us_id'];
if ($_POST['form_status'] != '') {
$qyhistoricocobrancas = "update usuario set us_status ='". $_POST['form_status']. "' where us_id = ".$_POST['us_id'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));}

if ($_POST['form_permissao'] != '') {
$qyhistoricocobrancas = "update usuario set us_permissao ='". $_POST['form_permissao']. "' where us_id = ".$_POST['us_id'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));}

//
$conexao->close();
header('location:visualiza_usuario.php?us_id=' . $us_id);?>