<?php

include_once '../DTO/dosisTratamientos_DTO.php';
$num=$_POST['num'];
$ano=$_POST['ano'];
$id=$_POST['id'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$fase=$_POST['fase'];

$mngLP = new tratamientoDosis_DTO();
$data = $mngLP->verificar($num, $ano, $id, $mes, $dia, $fase);

echo json_encode($data);
