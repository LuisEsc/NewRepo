<?php

$email = (isset($_POST['email'])) ? $_POST['email'] : null;
return "tu email es " . $email;

