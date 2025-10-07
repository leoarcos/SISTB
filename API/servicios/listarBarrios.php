<?php

include_once '../DTO/app_DTO.php';

$muni=$_POST['mun'];

$mngLP = new app_DTO();
$data = $mngLP->listarBarrios($muni);

echo json_encode($data);
