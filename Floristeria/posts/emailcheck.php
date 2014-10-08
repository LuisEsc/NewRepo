<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
$email = (isset($_GET['email'])) ? $_GET['email'] : null;
print_r( UsersModel::mailExists($email));


