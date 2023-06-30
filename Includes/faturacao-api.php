<?php
require_once "../Includes/connect.php";

// Obter os dados da faturação do banco de dados
$sql = "SELECT dia_atual, preco FROM faturacao";
$resultado = $bd->query($sql);

// Verificar se há resultados e convertê-los para JSON
if ($resultado->num_rows > 0) {
    $dados = array();
    while ($row = $resultado->fetch_assoc()) {
        $dados[] = $row;
    }
    $json = json_encode($dados);
    echo $json;
} else {
    echo json_encode([]); // Retorna um JSON vazio se não houver dados
}
?>