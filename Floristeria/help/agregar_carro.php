<?php 
session_start();
extract($_REQUEST);
include('includes/sql.php');
include('functions/pvp_iva_canon.php');
if(!isset($cantidad)){$cantidad=1;}
$qry=mysql_query("select * from productos where id_producto='".$id."'");
$row=mysql_fetch_array($qry);
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];
$pvp=$row['PVP'];
$pvp_iva = pvp_iva_canon($pvp,$id);
$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>$row['producto'],'precio'=>$pvp_iva,'imagen'=>$row['imagen'],'EAN'=>$row['EAN'],'marca'=>$row['marca'],'link'=>$row['link'],'id'=>$id);
$_SESSION['carro']=$carro;
header("Location: carrito.php");
?> 