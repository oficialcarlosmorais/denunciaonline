<?php
require_once('conexao.php');
$origem = $_POST['form_origem'];
//echo "origem: " . $origem . "<br>";
$encarregado = $_POST['form_encarregado'];
//echo "encarregado: " . $encarregado. "<br>";
$dn_id = $_POST['dn_id'];
//echo "DN_ID: " . $dn_id . "<br>";
$msg = $_POST['form_andamento'];
$mv_data = date("Y/m/d", strtotime(now));
$us_cpf = $_POST['us_cpf'];
$mv_msg = $_POST['form_andamento'];

if ($_POST['form_origem'] != '') {
$qyhistoricocobrancas = "update denuncia set dn_origem ='". $_POST['form_origem']. "' where dn_id = ".$_POST['dn_id'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));}

if ($_POST['form_encarregado'] != '') {
$qyhistoricocobrancas = "update denuncia set dn_encarregado ='". $_POST['form_encarregado']. "' where dn_id = ".$_POST['dn_id'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

mysqli_query($conexao, "INSERT INTO movimentacao (mv_data, mv_us_cpf, mv_dn_id, mv_msg) VALUES ('$mv_data', '$us_cpf', '$dn_id', 'Foi designado o $encarregado como encarregado do PAP.')") or die(mysqli_error($conexao));} else {echo "em branco";
}

$qyhistoricocobrancas = "update denuncia set dn_status ='EM APURAÇÃO' where dn_id = ".$_POST['dn_id'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

if ($_POST['form_andamento'] != '') {mysqli_query($conexao, "INSERT INTO movimentacao (mv_data, mv_us_cpf, mv_dn_id, mv_msg) VALUES ('$mv_data', '$us_cpf', '$dn_id', '$mv_msg')") or die(mysqli_error($conexao));} else {echo "em branco";}
//
$conexao->close();
header('location:visualiza_usuario.php?dn_id=' . $dn_id);?>