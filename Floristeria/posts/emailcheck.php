<?php

$email = (!isset($_GET['email'])) ? $_GET['email'] : null;
return "tu email es " . $email;

