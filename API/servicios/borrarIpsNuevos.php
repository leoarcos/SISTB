<?php

include_once '../DTO/adicionales_DTO.php';

$mngLP = new adicionales_DTO();
$data = $mngLP->borrarIpsNuevos($_POST['nombre']);

echo json_encode($data);
