<?php

include_once '../DTO/dosisTratamientos_DTO.php';
$num=$_POST['num']; 
$id=$_POST['id']; 
$fase=$_POST['fase'];

$mngLP = new tratamientoDosis_DTO();
$data = $mngLP->listarCantidadDosis($num, $id, $fase);

echo json_encode($data);
