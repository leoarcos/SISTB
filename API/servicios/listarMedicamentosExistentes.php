<?php

include_once '../DTO/medicamentos_DTO.php';

$mngLP = new medicamentos_DTO();
$data = $mngLP->listarMedicamentosExistentes();

echo json_encode($data);
