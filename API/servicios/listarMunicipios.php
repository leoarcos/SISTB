<?php

include_once '../DTO/app_DTO.php';

$dpto=$_POST['dpto'];
$mngLP = new app_DTO();
$data = $mngLP->listarMnposD($dpto);

echo json_encode($data);
