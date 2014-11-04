<?php

class OrderModel2 {    
    
    public static function getOrders() {
        $sql = "SELECT * FROM pedidos ORDER BY pedidos.id_pedido ASC";
        $orderArray = array();
        $res = null;
        
        $con = Connection::getConnection();        
        $res = $con->query($sql); 
        
        while($row =  mysqli_fetch_assoc($res)){
            $orderArray[] = new Order($row['id_pedido'],$row['id_cliente'],$row['timestam'],null,$row['precio_total'],$row['preparado']);
        }        
        return $orderArray;        
    }
    
    public static function getTotalQuantity($id_pedido){
        $sql = "SELECT SUM(cantidad) FROM flores_pedido WHERE id_pedido = {$id_pedido}";
        $res = null;
        
        $con = Connection::getConnection();        
        $res = $con->query($sql); 
        
        $cantidad = mysqli_fetch_array($res);        
        return (int) $cantidad[0];
    }
    
    public static function getUserIdByOrderId($id){
        $sql = "SELECT id_cliente FROM pedidos WHERE id_pedido = {$id} LIMIT 1";
        $res = null;
        
        $con = Connection::getConnection();
        $res = $con->query($sql);
        
        $id_cliente = mysqli_fetch_array($res);
        
        return $id_cliente[0];        
        
    }
    
    public static function getFlowersByOrderId($id){
        $sql = " SELECT flower.*, flores_pedido.cantidad ";
        $sql.= " FROM flower, flores_pedido ";
        $sql.= " WHERE flores_pedido.id_flor = flower.id ";
        $sql.= " AND flores_pedido.id_pedido = {$id}";
        //$arrayFlores = array();
        
        $con = Connection::getConnection();
        $res = $con->query($sql);
        //print_r($res);
        while($row = mysqli_fetch_assoc($res)){
            $arrayFlores[] = $row;
        }
        //print_r($arrayFlores);
        return $arrayFlores;            
    }
    
    public static function getOrdersByUserId($id){
        $sql = "SELECT * from pedidos WHERE id_cliente = {$id}";
        $orders = array();
        
        $con = Connection::getConnection();
        $res = $con->query($sql);
        
        while($row = mysqli_fetch_assoc($res)){
            $orders[] = $row;
        }
        
        return $orders;
        
        
    }
    
    public static function getFlowersByOrderIdAndUserEmail($order, $user){
        $sql = " SELECT flower.*, flores_pedido.cantidad";
        $sql.= " FROM flower,flores_pedido,pedidos ";
        $sql.= " WHERE flower.id = flores_pedido.id_flor ";
        $sql.= " AND flores_pedido.id_pedido = pedidos.id_pedido ";
        $sql.= " AND pedidos.id_pedido = {$order} ";
        $sql.= " AND pedidos.id_cliente = {$user} ";
        /*
        $sql = " SELECT flower.*, flores_pedido.cantidad, pedidos.precio_total ";
        $sql.= " FROM flower, flores_pedido, pedidos ";
        $sql.= " WHERE flores_pedido.id_flor = flower.id ";
        $sql.= " AND flores_pedido.id_pedido = {$id} ";*/
        
        $orders = array();
        
        $con = Connection::getConnection();
        $res = $con->query($sql);
        
        while($row = mysqli_fetch_assoc($res)){
            $orders[] = $row;
        }
        
        return $orders;
    }
    
    

}
