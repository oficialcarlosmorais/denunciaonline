<?php
include_once('conexao.php');

$data = date("Y-m-d", strtotime($_GET['form_data']));
$dia_semana = date("l", strtotime($data));
echo "Data informada: " . $data . "<br>";
echo "Dia da semana: " . $dia_semana . "<br>";

//coloca dia da semana em português(INÍCIO)
switch ($dia_semana) {
	case 'Sunday':
		$dia_semana = "Domingo";
		break;
	case 'Monday':
		$dia_semana = "Segunda-feira";
		break;
	case 'Tuesday':
		$dia_semana = "Terça-feira";
		break;
	case 'Wednesday':
		$dia_semana = "Quarta-feira";
		break;
	case 'Thursday':
		$dia_semana = "Quinta-feira";
		break;
	case 'Friday':
		$dia_semana = "Sexta-feira";
		break;
	case 'Saturday':
		$dia_semana = "Sábado";

}
echo "Dia da semana em pt-br: " . $dia_semana . "<br>";
//coloca dia da semana em português(FIM)

//verifica dia útil sem feriados(INÍCIO)
if ($dia_semana == 'Sábado' OR $dia_semana == 'Domingo') {
 echo "Dia não útil <br>";
 $data = strtotime($data);
 echo $data . "<br>";
 echo "Novo agendamento: " .  date('d/m/Y', strtotime('+2 days', $data)) . "<br>";
} else {
 echo "Dia útil <br>";
}
//verifica dia útil sem feriados(FIM)



$sql = "SELECT * FROM agendamento ORDER BY ag_data DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$ag = array('id' => $row['ag_id'], 'denuncia' => $row['ag_den_id'], 'data' => $row['ag_data'],'hora' => $row['ag_hora'], 'status' => $row['ag_status']);
    echo "ID: " . $ag['id'] . "<br>";
    echo "Denúncia: " . $ag['denuncia'] . "<br>";
    echo "Data: " . $ag['data'] . "<br>";
    echo "Hora: " . $ag['hora'] . "<br>";
    echo  "Status: ". $ag['status'] . "<br>";
    }
} else {echo "nada<br>";}

//mysqli_query($conexao, "INSERT INTO pap (pap_numero, pap_encarregado, pap_data_abertura, pap_status) VALUES ('$prox_pap', 'Tenente Fulano', '2020/04/14', 'Em análise')") or die(mysqli_error($conexao));


mysqli_close($conexao);
?>