<?php
require_once 'config.php';

?>
<!DOCTYPE html>
  <head>
    <meta http-equiv="content-type" content="text/html, charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en " />  
    <meta name="author" content="Carlos Morais" />
    <meta name="description" content="Loja de rastreamento veicular do Amapá" />
    <meta name="keywords" content="rastreamento, carro, moto, gps" />
    <meta name="generator" content=atom />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="copyright" content="2020 Horus Rastreamentos" />    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HORUS RASTREAMENTOS - Visualizar usuários</title>
    <link rel="stylesheet" type="text/css" href="css/2020style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--BARRA DE NAVEGAÇÃO INICIA AQUI-->
<!--BARRA DE NAVEGAÇÃO TERMINA AQUI-->

<!--CORPO DA PÁGINA INICIA AQUI-->
<article class="sombra">
  <div class="header"><i class="fa fa-user"></i> Usuários</h3></div>
  <section class="conteudo" id="uV_conteudo">

  <section>
    <table name="tbl_usuarios" id="tbl_usuarios">
      <thead>
      <tr>
      <th class="usuario">Usuário</th>
      <th class="nome">Nome</th>
      <th class="frota">Frota</th>
      <th class="mensalidade">Mensalidade</th>
      <th class="situacao">Situação</th>
      <th class="vencimento">Vencimento</th>
    </tr>
  </thead>
  <tbody>

<?php
$usuarios_dispensados = 0;
$usuarios_adimplentes = 0;
$usuarios_inadimplentes = 0;
$cor_linha = "linha_impar";

$getUsuarios = mysqli_query($conexao, "SELECT id_usuario, nome, apelido, email, ativo, data_vencimento, mensalidade,  (SELECT COUNT(b.cliente) FROM bem b WHERE b.cliente = usuarios.id_usuario) as frota FROM usuarios WHERE id_usuario != 1 ORDER BY nome ASC");
                        
  if(mysqli_num_rows($getUsuarios) > 0){

while($dados = mysqli_fetch_assoc($getUsuarios)){
if ($dados["ativo"] == "S") {
  $fundo = "";
  If ($dados['id_usuario'] == 442 or $dados['id_usuario'] == 438 or $dados['id_usuario'] == 509 or $dados['id_usuario'] == 508 or $dados['id_usuario'] == 468 or $dados['id_usuario'] == 448 or $dados['id_usuario'] == 590) { $usuarios_dispensados = $usuarios_dispensados+1;} else {
    
    $usuarios_adimplentes = $usuarios_adimplentes + 1;
    $previsao = $previsao + ($dados['mensalidade'] * $dados['frota']);}
} else {
  $fundo = "red";
  $usuarios_inadimplentes = $usuarios_inadimplentes + 1;
  $total_usuarios = $total_usuarios + 1;}

$dados['ativo'] = ($dados['ativo'] == "S") ? "Ativo" : "Inativo"; 
echo "<tr class=" .$cor_linha. " onclick=\"window.location='usuarioDetalhe.php?userid=" . $dados['id_usuario'] . "';\"  style=\"cursor:pointer;\">
 <td class=usuario>" . $dados['apelido'] . "</td>
  <td class=nome style=\"background:" . $fundo . ";\">" . $dados['nome'] . "</td>
 <td class=frota>" . $dados['frota'] . "</td><td class=mensalidade>R$ " . $dados['mensalidade']*$dados['frota'] . "</td> <td class=situacao style=\"background:" . $fundo . ";\">" . $dados['ativo'] . "</td> <td class=vencimento>" . $dados['data_vencimento'] . "</td> </tr>"; 

 if ($cor_linha == "linha_impar") {$cor_linha = "linha_par";} else {$cor_linha = "linha_impar";}                        
                          }
                        }
                        else{
                          echo "<tr><td colspan='5'><i><center>Não existem Usuários cadastrados.</center></i></td></tr>";
                        }

$total_usuarios = $usuarios_adimplentes+$usuarios_inadimplentes+$usuarios_dispensados;                    
$percentual_adimplentes = ($usuarios_adimplentes * 100)/($total_usuarios-$usuarios_dispensados);
$percentual_adimplentes = $number = number_format($percentual_adimplentes, 2, ',', '');
$percentual_inadimplentes = ($usuarios_inadimplentes * 100)/($total_usuarios-$usuarios_dispensados);
$percentual_inadimplentes = $number = number_format($percentual_inadimplentes, 2, ',', '');
$percentual_dispensados = ($usuarios_dispensados * 100)/($total_usuarios-$usuarios_dispensados);
$percentual_dispensados = $number = number_format($percentual_dispensados, 2, ',', '');

                      ?>
                    </tbody>
<!--<thead>
<tr>
<th style="background: silver; color: black"><strong>Adimplentes: </strong><?php echo $usuarios_adimplentes . " (" . $percentual_adimplentes . "%)"; ?></th>
  <th style="background: silver; color: black"><strong>Inadimplentes: </strong><?php echo $usuarios_inadimplentes . " (" . $percentual_inadimplentes . "%)"; ?></th>
  <th style="background: silver; color: black"><strong>Dispensados: </strong><?php echo $usuarios_dispensados . " (" . $percentual_dispensados . "%)"; ?></th>
  <th style="background: silver; color: black" colspan="2"><strong>Total: </strong><?php echo $usuarios_adimplentes+$usuarios_inadimplentes+$usuarios_dispensados; ?></th>
  <th style="background: silver; color: black" colspan="2"><strong>Previsão: </strong><?php echo "R$ " . $previsao; ?></th>
-->  
    </table>  
  </section>

<section id="uV_resumo" class="sombra">

    <div id="uV_adimplentes"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <strong>Adimplentes</strong> <?php echo $usuarios_adimplentes . " (" . $percentual_adimplentes . "%)"; ?></div>
    <div id="uV_inadimplentes"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <strong>Inadimplentes</strong> <?php echo $usuarios_inadimplentes . " (" . $percentual_inadimplentes . "%)"; ?></div>
    <div id="uV_dispensados"><i class="fa fa-handshake-o" aria-hidden="true"></i> <strong>Dispensados</strong> <?php echo $usuarios_dispensados . " (" . $percentual_dispensados . "%)"; ?></div>
    <div id="uV_total"><i class="fa fa-male" aria-hidden="true"></i> <strong>Total</strong> <?php echo $usuarios_adimplentes+$usuarios_inadimplentes+$usuarios_dispensados; ?></div>
    <div id="uV_previsao"><i class="fa fa-money" aria-hidden="true"></i> <strong>Previsão</strong> <?php echo "R$ " . $previsao; ?></div>

  </section>

</section>
</article>

<?php include '2020rodape.php'; ?>
</main> 
</body>
</html>
