<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo json_encode([
        "STATUS" => "OK",
        "USUARIO" => $_SESSION['usuario']
    ]);
} else {
    echo json_encode(["STATUS" => "NO_SESSION"]);
}
?>
