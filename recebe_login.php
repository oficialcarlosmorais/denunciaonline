<?php

  $lo_login = $_POST['form_login'];
  $lo_senha = $_POST['form_senha'];
  require_once('conexao.php');
  $sql = "SELECT * FROM usuario WHERE us_cpf=$lo_login";
  $result = mysqli_query($conexao, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     $hash = $row['us_senha'];
  
  if(password_verify($lo_senha, $hash)){
    session_start();

    $_SESSION['us_patente'] = $row['us_patente'];
    $_SESSION['us_nome_guerra'] = $row['us_nome_guerra'];
    $_SESSION['us_permissao'] = $row['us_permissao'];
    $_SESSION['us_cpf'] = $row['us_cpf'];
    $_SESSION['tempo'] = 30000;
    if ($row['us_status'] == 'AGUARDANDO' or $row['us_status'] == 'inativo') {
      header("Location: correg_login.php?error=3");} else {header("Location: correg_painel.php");}

  } else {header("Location: correg_login.php?error=1"); }

}
} ELSE {header("Location: correg_login.php?error=1");}

?>
