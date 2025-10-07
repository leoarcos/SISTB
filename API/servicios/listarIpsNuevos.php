<?php

include_once '../DTO/adicionales_DTO.php';

$mngLP = new adicionales_DTO();
$data = $mngLP->listarIpsNuevos();

echo json_encode($data);
