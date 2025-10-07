<?php

include_once '../DTO/dosisTratamientos_DTO.php';
$num=$_POST['num'];
$ano=$_POST['ano'];
$id=$_POST['id'];
$mes=$_POST['mes'];
$dia=$_POST['dia'];
$fase=$_POST['fase'];
$dosis=$_POST['dosis'];

$mngLP = new tratamientoDosis_DTO();
$data = $mngLP->eliminarDosisTto($num, $ano, $id, $mes, $dia, $fase, $dosis);

echo json_encode($data);
