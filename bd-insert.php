<?php
session_start();

include_once("private/connection/conexao.php");

$km_inicio = filter_input(INPUT_POST, 'km_inicio', FILTER_SANITIZE_STRING);
$km_final = filter_input(INPUT_POST, 'km_final', FILTER_SANITIZE_STRING);
$km_gasto = filter_input(INPUT_POST, 'km_gasto', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);








$result_usuario = "INSERT INTO quilometro (km_inicio,km_final,km_gasto,data) VALUES ('$km_inicio','$km_final','$km_gasto','$data')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:#e4ff00'>
    Calculo Executado
    </p>";
    header("Location: quilometragem.php");
}else{
    $_SESSION['msg'] = "<p style='color:red'>
    
	Calculo Não Executado
    
    </p>";
    header("Location: quilometragem.php");
}