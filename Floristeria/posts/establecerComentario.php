<?php
session_start();
$_SESSION['comentario'] = $_REQUEST['comentario'];

echo true;
    
