<?php

include_once '../DTO/dosisTratamientos_DTO.php';
$num=$_POST['num']; 
$id=$_POST['id'];

$mngLP = new tratamientoDosis_DTO();
$data = $mngLP->listarTratamientoDosisSegundaFase($num, $id);

echo json_encode($data);
