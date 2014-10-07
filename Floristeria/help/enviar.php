<?php

$name = (isset($_POST['name'])) ? $_POST['name'] : null;
$mail = (isset($_POST['email'])) ? $_POST['email'] : null;
$asunto = (isset($_POST['asunto'])) ? $_POST['asunto'] : "";
$action = (isset($_POST['action'])) ? $_POST['action'] : null;

if (($name !== null) && ($mail !== null) && $action == "send") {
    $cuerpo = '
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Formulario de contacto</title>
        </head>

        <body>
            <style type="text/css">
                body{
                    padding:0;
                    margin:0;
                    font-family:Tahoma, Geneva, sans-serif;
                }
                .esmStruct{
                    border:1px solid #cccccc;
                    margin:auto;
                    width:auto;
                    height:auto;
                    padding:1em;
                    background-color:#f5f5f5;
                }
                .esmTitle{
                    padding:1em;
                    font-size:16px;
                    font-weight:bold;
                    text-align:center;
                    border-bottom:1px solid #F90;
                }
                .esmItem{
                    width:auto;
                    padding:1em;
                    font-size:14px;
                }
                .esmKey{
                    float:left;
                    width:60px;
                }
                .esmValue{
                    float:left;
                    width:auto;
                    margin-left:1em;
                }
                .esmMensaje{
                    margin-top:2em;
                    border:1px solid #cccccc;
                    background-color:#ffffff;
                    padding:2em;
                    width:auto;
                }
            </style>
            <div class="esmStruct">
                <div class="esmTitle"><span>' . $name . '</span></div>

                <div class="esmItem">
                    <div class="esmKey">Nombre:</div>
                    <div class="esmValue">' . $name . '</div>
                </div>

                <div class="esmItem">
                    <div class="esmKey">Fecha:</div>
                    <div class="esmValue">02/09/2014 (11:50)</div>
                </div>

                <div class="esmItem">
                    <div class="esmKey">Email:</div>
                    <div class="esmValue">' . $mail . '</div>
                </div>

                <div class="esmItem">
                    <div class="esmKey">Asunto:</div>
                    <div class="esmValue">' . $asunto . '</div>
                </div>

                <div class="esmMensaje">
                </div>
            </div>
        </body>
    </html>';


    $ca = "From: " . strip_tags($mail) . "\r\n";
    $ca .= "Reply-To: " . strip_tags($mail) . "\r\n";
    $ca .= "CC: esmonet@esmonet.com\r\n";
    $ca .= "MIME-Version: 1.0\r\n";
    $ca .= "Content-Type: text/html; charset=UTF-8\r\n";


    mail("esmonet@esmonet.com", "Formulario web esmonet.com", $cuerpo, $ca);

    header("Location:http://www.esmonet.com/enviado.php");
} else {
    header("Location:http://www.esmonet.com/contactar.php");
}