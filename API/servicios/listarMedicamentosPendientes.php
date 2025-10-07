<?php

include_once '../DTO/medicamentos_DTO.php';
  
$mngLP = new medicamentos_DTO();
        
$data = $mngLP->listarMedicamentosPendientes();

echo json_encode($data);
