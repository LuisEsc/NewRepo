<?php

require_once '../inc/Session.php';
require_once '../../model/FlowersModel.php';
    require_once '../../core/Connection.php';
    require_once '../../libs/Flower.php';
$id = null;
if(isset($_SESSION['admin'])){
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        FlowersModel::delete($id);
        //echo "eliminado";
    }
    else{
        //echo "1";
    }
}
else{
    //echo "0";
}
echo "<script type='text/javascript'>window.location.href='../flowers.php';</script>";