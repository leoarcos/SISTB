<?php

include_once '../DTO/users_DTO.php';

$mngLP = new users_DTO();
$data = $mngLP->listarUsuarios();

echo json_encode($data);
