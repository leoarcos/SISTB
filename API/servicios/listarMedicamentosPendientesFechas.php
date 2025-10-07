<?php

include_once '../DTO/medicamentos_DTO.php';
  
$mngLP = new medicamentos_DTO();
        
$data = $mngLP->listarMedicamentosPendientesFechas($_POST['fechaInicio'], $_POST['fechaFin']);

echo json_encode($data);
