<?php
include_once('conexao.php');

$sql = "SELECT * FROM pap ORDER BY pap_numero DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$pap = array('id' => $row['pap_id'], 'numero' => $row['pap_numero'], 'encarregado' => $row['pap_encarregado'],'data' => $row['pap_data_abertura'], 'status' => $row['pap_status']);
    echo "ID: " . $pap['id'] . "<br>";
    echo "Número: " . $pap['numero'] . "<br>";
    echo "Encarregado: " . $pap['encarregado'] . "<br>";
    echo "data: " . $pap['data'] . "<br>";
    echo  "Status: ". $pap['status'] . "<br>";
    $prox_pap = ($pap['numero'] + 1);
    echo "Próximo pap: " .  $prox_pap;
   	}
} else {echo "nada<br>";}

mysqli_query($conexao, "INSERT INTO pap (pap_numero, pap_encarregado, pap_data_abertura, pap_status) VALUES ('$prox_pap', 'Tenente Fulano', '2020/04/14', 'Em análise')") or die(mysqli_error($conexao));


mysqli_close($conexao);
?>