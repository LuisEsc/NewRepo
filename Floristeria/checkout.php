<?php
session_start();
require_once './core/init.php';
require_once './phpmailer/class.phpmailer.php';
require_once './phpmailer/class.smtp.php';
error_reporting(0);
function enviarCorreo() {


    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->IsSendmail();

    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'esmonetpruebas@gmail.com';
    $mail->Password = 'esmonet1234';

    $mail->From = "esmonetpruebas@gmail.com";
    $mail->FromName = "Floristeria Albahaca";
    $mail->Subject = "Resumen de su pedido";
    $mail->AddAddress($_SESSION['user']->email);
    
    ob_start();
    include 'plantillafacturacorreo.php';
    $msg = ob_get_clean();
    $mail->MsgHTML($msg);
    if (!$mail->Send()) {
        //echo "No se pudo enviar el Mensaje.  ".$mail->ErrorInfo;
    } else {
        //echo "Mensaje enviado";
    }
}
$gastosEnvio = $_SESSION['gastosEnvio'];
$cart = Session::getArraySession();



if ($cart != null) {
    $date = date("D-d/M/Y -- g:i:s");
    $order = new Order(null, $_SESSION['user']->id, $date, null, Session::getTotalPrice(),0, $gastosEnvio);
    $flowers = array();
    $i = 0;
    foreach ($cart as $indice => $valor) {
        $flowers[] = array(null, $valor['id'], $valor['name'], $valor['price'], $valor['cant']);
        $i++;
    }
    $order->setFlowerArray($flowers);


    OrderModel::saveOrder($order);

    enviarCorreo();
    
    //$order = OrderModel::getOrderByDate($order->timestamp);   
}
?>
<script type="text/javascript">
    //$(document).ready(function () {

       // window.location.href = "/floristeria/pedido/<?php echo $order->id_pedido; ?>.html";

    //})

</script>
