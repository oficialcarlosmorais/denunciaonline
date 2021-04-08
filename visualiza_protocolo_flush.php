<?php echo "<p><em>Protocolo nº ". $mv_dn_id[0]. ", de ". date("d/m/Y", strtotime($mv_data_inicio[0])) . ".</em><br> Movimentações: </p>";

$arrlength = count($mv_data_inicio);

for($x = 0; $x < $arrlength; $x++) {
  echo '<div class="input-container "><div class="alert alert-success"><em>#' . $x . ' em '. $mv_data_inicio[$x] . ': </em>'. $mv_msg[$x].'</div></div>';


    /*$mv_dn_id = array();
      $mv_msg = array();
      $mv_data_inicio = array();
      $mv_cpf = array();*/
}
 ?>
  
<!--  <div class="input-container ">
    <div class="alert alert-success"><em>#1 em dd/mm/aaaa: </em>Denúncia recebida dia dd/mm/aaaa.</div>
  </div>
  <div class="input-container ">
    <div class="alert alert-success"><em>#2 em dd/mm/aaaa: </em>Audiência marcada dd/mm/aaaa na sede da Corregedoria-Geral da PMAP <em>(R. Hildemar Maia - Buritizal, Macapá - AP)</em></div>
  </div>
  <div class="input-container ">
    <div class="alert alert-success"><em>#3 em dd/mm/aaaa: </em>Atribuição de encarregado do PAP: Cap Abedinei.</div>
  </div>
  <div class="input-container ">
    <div class="alert alert-success"><em>#4 em dd/mm/aaaa: </em>Audiência realizada</div>
  </div>-->  
</form>
</div>