<?php

include_once '../DTO/app_DTO.php';



$mngLP = new app_DTO();
$data = $mngLP->numeroConsecutivo($_POST['ano']);

echo json_encode($data);
