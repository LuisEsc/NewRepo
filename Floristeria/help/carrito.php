<?php 
session_start();
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
//La asignamos a la variable
//$carro si existe o ponemos a false $carro
//en caso contrario
include("includes/top.php");
?>
    <div class="crumb_navigation">
    Estas agui: <span class="current">Carrito de la compra</span></div>
    <div></div>
	<div class="left_content">
    <div class="title_box">Productos</div>
        <ul class="left_menu">
 <?php
//Sentencia sql (sin limit)
$sql = "SELECT * FROM categorias ORDER BY orden";
//Ejecutamos la consulta desde gescrig
$result = mysql_query($sql) or die (mysql_error());
//Leemos y escribimos los registros
while($row = mysql_fetch_array($result)){
echo'<li class="odd"><a href="'.$row['valor_categoria'].'.html">'.$row['categoria'].'</a></li>';
}
echo '</ul>';

//<!-- end of left content -->   

include("includes/left_content.php");
?>
   
   <!-- start center content -->
 <div class="center_content">
 <div class="center_title_bar">Carrito de la compra</div>
<?php 
if($carro){
//si el carro no estÃ¡ vacÃ­o,
//mostramos los productos 
?>
<table bgcolor="#EEE" width="630" class="pre_pasos_compra">
	<tr>
    	<td>
		<table cellpadding="0" cellspacing="0" class="pasos_compra">
			<tr>
			    <td width="100" style="border:none;width:100px; color:#FFF; background-color:#F90;">Cesta</td>
				<td width="100" style="width:100px;">Direcci&oacute;n de factura</td>
				<td width="100" style="width:100px;">Direcci&oacute;n de entrega</td>
				<td width="100" style="width:100px;">Forma de pago</td>
				<td width="100" style="width:100px;">Resumen</td>
				<td width="100" style="width:100px;">Finalizar</td>
			</tr>
		</table>
        </td>
    </tr>
 </table>
<br />
<table cellpadding="0" cellspacing="0" class="carrito_compra"> 
<tr> 
        <td width="56" class="headline" style="border-right:none">Acciones</td>
        <td width="84" class="headline" style="border-right:none">Imagen</td>
		<td width="334" class="headline" style="border-right:none">Sus artículos seleccionados</td>
        <td width="209" class="headline" style="border-right:none">Cant</td> 
		<td width="61" class="headline" style="border-right:none">Precio</td> 
		<td width="66" class="headline" style="border-right:none">Importe</td> 
	</tr> 
<?php
//$color=array("#ffffff","#F0F0F0");
$contador=0;
$suma=0;
foreach($carro as $k => $v){ 
$subto=$v['cantidad']*$v['precio'];
$subto=number_format($subto,2,'.','');
$suma=$suma+$subto;
$contador++; 
$producto=$v['producto'];
$producto=htmlentities($producto,ENT_QUOTES);
?>
<form name="a<?php echo $v['identificador'] ?>" method="post" action="agregarcarro.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>"/>
<tr class="tabla_abajo"> 
<td align="center"><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>" title"Eliminar"><img src="images/bin.png"/></a></td>
<td align="center" style="border-right:0;"><a href=""><img src="images_productos/<?php echo $v['imagen'] ?>" alt="MP515" width="64" height="64"/></a> </td> 
<td class="" style="border-left:0;"><a class="title_product_cart" href="<?php echo $v['link'] ?>.html"><b><?php echo $producto; ?></b></a> 
<br />
<span style="font-size:11px;font-weight:normal;">
Código:&nbsp;<strong><?php echo $v['EAN'] ?></strong>&nbsp;&nbsp;Marca:&nbsp;<strong><?php echo $v['marca'] ?></strong>
</span></td>
<?php 
if ($v['cantidad']==1){$cantidadDE=$cantidadDE= $v['cantidad'];}else{$cantidadDE= $v['cantidad'] - 1; }?>
<td align="center" class="">
<a href="agregarcarro.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>&cantidad=<?  echo $cantidadDE ?>">- </a>
<input class="unidades" type="text" value="<?php echo $v['cantidad'] ?>" disabled="disabled"/>
<?php $cantidadIN = $v['cantidad'] + 1; ?>
<a href="agregarcarro.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>&cantidad=<?  echo $cantidadIN ?>"> +</a>
<input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>">
</td> 
<td align="center"><?php echo $v['precio'] ?><span>&euro;</span>
</td> 
<td class="limitador" align="center"><?php echo $subto; ?><span>&euro;</span>
</td> 
</tr>
<?php
//por cada item creamos un
//formulario que submite a
//agregar producto y un link
//que permite eliminarlos 
}
include("functions/calculo_carro.php");
?>
	<tr>
    	<td>
    	</td>
         <td>
    	</td>
    </tr> 
	<tr> 
		<td class="sum_total" colspan="5" style="border-right:0;"><b>&nbsp;&nbsp;
						Gastos de envío <span style="font-weight:normal;font-size:12px;"></span></b>(envío urgente 24h)</span> 
	  </td> 
		<td class="sum_total" style="border-left:0;" align="right">
		<b>&euro;</b><span style="font-size:16px;"><b>3.00</b>&nbsp;</span>
		</td> 
	</tr> 
	<tr>
    	<td>
    	</td>
         <td>
    	</td>
    </tr> 
	<tr> 
		<td class="sum_total" colspan="5" style="border-right:0;"><b>&nbsp;&nbsp;
						Importe total <span style="font-weight:normal;font-size:12px;">(*IVA incl.)</span></b></span> 
	  </td> 
      <?php $suma=$suma+3.00; $suma=number_format($suma,2,'.','');  ?>
		<td class="sum_total" style="border-left:0;" align="right">
		<b>&euro;</b><span style="font-size:16px;"><b><?php echo $suma; ?></b>&nbsp;</span>
		</td> 
	</tr> 
</table> 
</form>
<?php
//el total de items va a ser igual
//a la cantidad de elementos que
//tenga la matriz $carro, valor
//que obtenemos con la funciÃ³n
//count o con sizeof
?>
<table class="details">
	<tr>
	  <td  style="width:100%">
<span class="UIComposer_SubmitButton UIButton UIButton_Blue UIFormButton">
<input value="<< Continuar comprando" class="UIButton_Text" type="submit" onclick="javascript:document.location='index.php'">

	  </td>
		<td  style="width:100%">
<span class="UIComposer_SubmitButton UIButton UIButton_Blue UIFormButton">
<input value="Pasar por caja >>" class="UIButton_Text" type="submit" onclick="javascript:document.location='compra_paso1.php'">

	  </td>
	</tr>

</table>
<p class="texto_informacion">* Todos nuestros precios tienen el IVA incluido </p>
<br />
<br />
<br />
<p class="text_car"><font color="#FFFFFF">CÓDIGOS DE DESCUENTO</font></p>
<table class="details">

	<tr>

		<td  style="width:100%">

			<strong>Introduce tu código promocional:  </strong><br/>
            <input type="text"/>

	  </td>
		<td  style="width:100%">
<span class="UIComposer_SubmitButton UIButton UIButton_Blue UIFormButton">
<input value="Validar Código" class="UIButton_Text" type="submit">

	  </td>
	</tr>

</table>
<?php }else{ ?>
<style>
.alerta_carrito{
	padding-top:-20px;
	margin-top:18px;
	width:627px;
	border:1px solid #F90;
	margin-left:10px;
	color:#000;
	background-color:#fff9f3;
	font-size:18px;
}
</style>
<div class="alerta_carrito">
 <img src="images/alert.png" width="48" height="48" />&nbsp;<span>No hay productos seleccionados</span>
</div>
<?php }?>
   </div>
   <!-- end of center content -->
<?php
include("includes/buttom.php");
?>