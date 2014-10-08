<?php

require_once '../model/UsersModel.php';
$email = (!isset($_GET['email'])) ? $_GET['email'] : null;
echo ($email != null) ? UsersModel::mailExists($email) : 1;
