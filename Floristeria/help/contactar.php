<?php
$producto = $_GET['producto'];
$seccion = $_GET['seccion'];
?>
<?php
include("top.php");
?>

<?php
include("menulateral.php");
?>
<style>
.box {
	background:url(images/box-bg.gif) 0 0 repeat-x #f9bb1c;
	width:100%;
	color:#503620;
	font-size:14px;
	line-height:18px;
}
	.box .left-top-corner {
		background:url(images/left-top-corner.gif) no-repeat left top;
	}
	.box .right-top-corner {
		background:url(images/right-top-corner.gif) no-repeat right top;
	}
	.box .left-bot-corner {
		background:url(images/left-bot-corner.gif) no-repeat left bottom;
		}
	.box .right-bot-corner {
		background:url(images/right-bot-corner.gif) no-repeat right bottom;
		}
	.box .inner { 
		padding:27px 34px 29px 43px;
	}
		.box h3 {
			font-family:"Times New Roman", Times, serif;
			font-size:34px;
			line-height:1.2em;
			color:#fff;
			font-style:italic;
			text-shadow:1px 1px 4px #c96409;
			margin-bottom:14px;
			font-weight:bold;
		}
		.box h5 {
			color:#fff;
			font-size:16px;
			font-weight:normal;
			margin-bottom:7px;
		}
		.box p {
			margin-bottom:18px;
		}

.box1 {
	background:#ededed;
	width:100%;
}
	.box1 .left-top-corner {
		background:url(images/left-top-corner2.gif) no-repeat left top;
	}
	.box1 .right-top-corner {
		background:url(images/right-top-corner2.gif) no-repeat right top;
	}
	.box1 .left-bot-corner {
		background:url(images/left-bot-corner2.gif) no-repeat left bottom;
		}
	.box1 .right-bot-corner {
		background:url(images/right-bot-corner2.gif) no-repeat right bottom;
		}
	.box1 .inner { 
		padding:27px 34px 29px 43px;
	}
		.box1 h3 {
			font-family:"Times New Roman", Times, serif;
			font-size:24px;
			line-height:1.2em;
			color:#000;
			font-style:italic;
			margin-bottom:14px;
			font-weight:normal;
			position:relative;
			padding:10px 0 0 43px;
		}
			.box1 h3 img {
				position:absolute;
				left:-11px;
				top:0;
			}

  </style>
<img src="images/email-icon.jpg" alt="" width="630" height="136" />
<p></p>
<h3 style="font-size:24px">Contacte con nosotros</h3>

            <div class="box1">
            	<div class="left-top-corner">
                <div class="right-top-corner">
                  <div class="right-bot-corner">
                    <div class="left-bot-corner">
<fieldset>
<legend></legend>
<p>&nbsp&nbsp </p>
    		    
                 <form action="enviar.php" method="post">
                  
                <p><label for="name">&nbsp&nbsp <b>Nombre:</b> </label>
				<input type="text" name="name" id="name" value=""/><br /></p>

					<p><label for="email">&nbsp&nbsp <b>Email:</b></label>
					<input type="text" name="email" id="email" value="" /><br /></p>
                    
                    
                    <p><label for="email">&nbsp&nbsp <b>Asunto:</b></label>
					<input size="63" type="text" name="asunto" id="email" value="<?php echo $seccion ?> <?php echo $producto ?>" /><br /></p>


					<p><label for="message">&nbsp&nbsp <b>Mensaje:</b></label>
					<textarea cols="63" rows="11" name="message" id="message"></textarea><br /></p>
                    
                    
                    <input name="action" type="hidden" value="send">
					<div align="left"><p><input type="submit" name="send" class="formbutton" value="Enviar Formulario" /></p></div>
                    <p></p>
</form></legend>
</div></div></div></div></div>
<fieldset>
<legend></legend>
</fieldset>
<p>&nbsp&nbsp </p>
            <div class="box1">
            	<div class="left-top-corner">
                <div class="right-top-corner">
                  <div class="right-bot-corner">
                    <div class="left-bot-corner">
<div align="center">Puede venir a visitarnos en el Paseo de las Autonomías nº 6 en Huesca <br /> o si lo desea puede ponerse en contacto con nosotros en los siguientes teléfonos:<br /> Atención al cliente: 974 705 042 - 655 065 683<br /> Departamento comercial: 605 106 972 - 655 065 635</div></div></div></div></div></div>

<?php
include("back.php");
?>


