<?php

include_once '../DTO/app_DTO.php';

$muni=$_POST['mun'];
$sector=$_POST['sector'];

$mngLP = new app_DTO();
$data = $mngLP->listarComuna($muni, $sector);

echo json_encode($data);
