<?php

require_once './core/init.php';
require_once './phpmailer/class.phpmailer.php';
$cart = Session::getArraySession();
//print_r($cart);

if ($cart != null) {
    $date = date("D-d/M/Y -- g:i:s");
    $order = new Order(null, $_SESSION['user']->id, $date, null, Session::getTotalPrice());
    $flowers = array();
    $i = 0;
    foreach ($cart as $indice => $valor) {
        $flowers[] = array(null, $valor['id'], $valor['name'], $valor['price'], $valor['cant']);
        $i++;
    }
    $order->setFlowerArray($flowers);


    //OrderModel::saveOrder($order);


    $fromAddress = "esmonetpruebas@gmail.com";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = True;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = $fromAddress;
    $mail->Password = "esmonet1234";
    $mail->SetFrom($fromAddress, "AlejandroFloristeria");
    $mail->Subject = "Envio de prueba de phpmailer.";
    $mail->IsHTML(true);
    $mail->From = "esmonetpruebas@gmail.com";

    $mail->FromName = "Mi sitio";
    $mail->Sender = "esmonetpruebas@gmail.com";
    $mail->CharSet = "utf-8";
    //$msg = file_get_contents("plantillafacturacorreo.php");
    //$msg = nl2br($msg);
    ob_start();    
    include 'plantillafacturacorreo.php';
    $msg = ob_get_clean();
    $mail->MsgHTML($msg);
    echo $msg;

    $toAdress = $_SESSION['user']->email;
    $mail->AddAddress($toAdress, "Nombre completo");
    if (!$mail->Send()) {
        //echo "Mensaje no enviado...";
    } else {
       //echo "MensajeENviado!!";
    }
    //echo"11";
}
header("Location: carrito.php");
