<?php

require_once './core/init.php';
require_once './phpmailer/class.phpmailer.php';

$cart = Session::getArraySession();
//print_r($cart);

if($cart != null) {
    echo"1";
    $date = date("D-d/M/Y -- g:i:s");
    echo"2";
    $order = new Order(null, $_SESSION['user']->id, $date, null, Session::getTotalPrice());
    echo"3";
    $flowers = array();
    echo"4";
    $i = 0;
    echo"5";
    foreach ($cart as $indice => $valor) {
    echo"6";
        $flowers[] = array(null, $valor['id'], $valor['name'], $valor['price'], $valor['cant']);
        $i++;
    }
    echo"7";
    $order->setFlowerArray($flowers);
        echo"8";

    
    OrderModel::saveOrder($order);
        echo"9";

    //echo"<br/>";
    //print_r($flowers);
        echo"10";

    $fromAddress = "esmonetpruebas@gmail.com";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = True;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username =$fromAddress;
    $mail->Password = "esmonet1234";
    $mail->SetFrom($fromAddress, "AlejandroFloristeria");
    $mail->Subject = "Envio de prueba de phpmailer.";
    $mail->IsHTML(true);
    $msg =file_get_contents("./plantillafacturacorreo.php");
    $mail->MsgHTML($msg);
    print_r($msg);
    
    $toAdress = $_SESSION['user']->email;
    $mail->AddAddress($toAdress, "Nombre completo");
    if(!$mail->Send()){
        echo "Mensaje no enviado...";
    }
    else{
        echo "MensajeENviado!!";
    }
        echo"11";

    
    
    
    
}

//header("Location: carrito.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo phpinfo();
