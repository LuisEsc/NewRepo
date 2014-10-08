<?php

<<<<<<< HEAD
require_once '../model/UsersModel.php';
$email = (!isset($_GET['email'])) ? $_GET['email'] : null;
echo ($email != null) ? UsersModel::mailExists($email) : 1;
=======
$email = (isset($_GET['email'])) ? $_GET['email'] : null;
echo "tu email es " .$email;

>>>>>>> origin/master
