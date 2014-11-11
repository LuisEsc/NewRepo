<?php
session_start();
$_SESSION['comentario'] = $_REQUEST['cometario'];
return true;
    
