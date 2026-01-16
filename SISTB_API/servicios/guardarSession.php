<?php
session_start(); // Importante: iniciar sesión

// Leer datos JSON que llegan del fetch
$input = json_decode(file_get_contents("php://input"), true);

if (isset($input['data'])) {
    $_SESSION['usuario'] = $input['data']; // Guardar los datos en sesión
   //echo "<script>localStorage.setItem('user',JSON.stringify(".json_encode($_SESSION['usuario'])."));</script>";
    echo json_encode(["STATUS" => "OK", "SESSION" => $_SESSION['usuario']]);
} else {
    echo json_encode(["STATUS" => "ERROR", "MESSAGE" => "No se recibieron datos"]);
}
?>
