<html><head></head><body><?php
session_start();
        require_once './Model/AdministratorModel.php';

        $email = $_REQUEST['login_user'];
        $password = $_REQUEST['login_pass'];

        echo $email . "--" . $password;

        if (($email) && ($password)) {

            
            if (($object = AdministratorModel::getAdmin($email, $password)) != null) {
                print_r($object);
                $_SESSION['admin'] = $object['email'];
                print_r($_SESSION['admin']);
                
                ?> <script type="text/javascript" >window.location.href='index.php';</script> <?php
            }
        }
        ?></body></html>