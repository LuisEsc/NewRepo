<?php
require_once './core/init.php';
require_once './phpmailer/class.phpmailer.php';
require_once './phpmailer/class.smtp.php';
require_once './Ibercaja.php';

error_reporting(0);

session_start();

$order = null;

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

function realizarPago() {
    $costetotal = Session::getTotalPrice() + $_SESSION['gastosEnvio'];
    $costetotal = number_format($costetotal, 2, ",", '');
    try {
        $pasarela = new Ceca();
        $pasarela->setAcquirerBIN('0000554027');
        $pasarela->setMerchantID('084089028');
        $pasarela->setClaveEncriptacion('JIZD9D8I');
        $pasarela->setEntorno('desarrollo');
        $pasarela->setImporte($costetotal);
        $pasarela->setTerminalID('00000003');
        $pasarela->setNumOperacion('A00' . date('His'));
        $pasarela->setUrlNok('http://www.floristeriaalbahaca.es/floristeria/pedidonorealizado.html');
        $pasarela->setUrlOk('http://www.floristeriaalbahaca.es/floristeria/pedidorealizado.html');
        $pasarela->setUrlpasareladesarrollo('http://tpv.ceca.es:8000/cgi-bin/comunicacion-on-line');
        //$pasarela->setSubmit();
        $form = $pasarela->create_form();        
        $pasarela->launchRedirection();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }
    echo $form;
}

$gastosEnvio = $_SESSION['gastosEnvio'];
$cart = Session::getArraySession();
$comentario = $_SESSION['comentario'];

if ($cart != null) {
    $date = date("D-d/M/Y -- g:i:s");
    $order = new Order(null, $_SESSION['user']->id, $date, null, Session::getTotalPrice(), 0, $gastosEnvio, $comentario);
    $flowers = array();
    $i = 0;
    foreach ($cart as $indice => $valor) {
        $flowers[] = array(null, $valor['id'], $valor['name'], $valor['price'], $valor['cant']);
        $i++;
    }
    $order->setFlowerArray($flowers);

    
    $_SESSION['order'] = OrderModel::saveOrder($order);
    realizarPago();
    
    //$order = OrderModel::getOrderByDate($order->timestamp);   
}
?>
<script type="text/javascript">
    //$(document).ready(function () {

    //window.location.href = "/floristeria/pedido/<?php echo $order->id_pedido; ?>.html";

    //})

</script>
