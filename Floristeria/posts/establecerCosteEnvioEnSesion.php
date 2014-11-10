<?php
$gastos = $_POST['gasto'];
session_start();

$_SESSION['gastosEnvio'] = $gastos;

echo $gastos;