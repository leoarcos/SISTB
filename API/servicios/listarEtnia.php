<?php

include_once '../DTO/app_DTO.php';


$mngLP = new app_DTO();
$data = $mngLP->listarEtnia();

echo json_encode($data);
