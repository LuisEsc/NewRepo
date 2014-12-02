<?php
require_once '../../core/Connection.php';

$texto1 = $_REQUEST['editor1'];
$texto2 = $_REQUEST['editor2'];

$sql = " UPDATE quienessomos SET textoCorto = '{$texto1}', textoLargo = '{$texto2}' WHERE id = 1 ";
$con = Connection::getConnection();
$con->query($sql);
$con->commit();
$con->close();
echo "<script type='text/javascript'>window.location.href='../quienessomos.php';</script>";