<?php

class OrderModel {

    public static function getOrders() {
        $res = self::toOrderArray(self::setQuery("SELECT * FROM pedidos ORDER BY pedidos.id_pedido ASC"));
        //Connection::getConnection()->close();
        return $res;
        
    }

    public static function getOrdersByUserId($user_id) {
        $res = self::toOrderArray(self::setQuery("SELECT * FROM pedidos WHERE id_cliente = '{$user_id}' ORDER BY pedidos.id_pedido ASC"));
        //Connection::getConnection()->close();
        return $res;
    }

    public static function getOrderById($id) {
        $res = null;
        if (is_numeric($id)) {
            $res = self::toObject(self::setQuery("SELECT * FROM pedidos WHERE id_pedido = '{$id}'"));
        }
        //Connection::getConnection()->close();
        return $res;
    }
    
    public static function saveOrder(Order $order){
        $sql = " INSERT INTO pedidos AS(id_pedido, id_cliente, timestamp, precio_total) ";
        $sql.= " VALUES(null, $order->id_cliente, ".date("D-d/M/Y -- g:i:s").", {$order->precio_total}) ";
        if(self::setQuery($sql)){
            $sql = "";
            $flower ;
            foreach($order->array_flores as $indice=>$valor){
                $flower = new Flower($order->array_flores->);
            }
        }
    }
    
    public static function getFlowersByOrderId($order_id) {
        $sql  = " SELECT `flower`.`id`, `flower`.`name`,`flower`.`price`, `flower`.`description`, `flower`.`imagename`, `flower`.`imagetype`, `flower`.`category`, `flower`.`imgblop` ";
        $sql .= " FROM `floristeria`.`flower`, `floristeria`.`flores_pedido` ";
        $sql .= " WHERE `flores_pedido`.`id_flor` = `flower`.`id`";
        $sql .= " AND `flores_pedido`.`id_pedido` = {$order_id}";
        
        return self::toFlowerArray(self::setQuery($sql));
    }
    public static function getFlowersByOrderIdAndUserId($order_id, $user_email) {
        /*
        $sql  = " SELECT `flower`.`id`, `flower`.`name`,`flower`.`price`, `flower`.`description`, `flower`.`imagename`, `flower`.`imagetype`, `flower`.`category`, `flower`.`imgblop` ";
        $sql .= " FROM `floristeria`.`flower`, `floristeria`.`flores_pedido`, `floristeria`.`pedidos` ";
        $sql .= " WHERE `flores_pedido`.`id_flor` = `flower`.`id`";
        $sql .= " AND `flores_pedido`.`id_pedido` = {$order_id}";
        $sql .= " AND `pedidos`.`id_cliente` = {$user_id}";
        $sql .= " AND `pedidos`.`id_pedido` = {$order_id}";
        echo $sql;
        
        $sql ="SELECT `flower`.`id`, `flower`.`name`,`flower`.`price`, `flower`.`description`, `flower`.`imagename`, `flower`.`imagetype`, `flower`.`category`, `flower`.`imgblop` FROM `floristeria`.`flower`, `floristeria`.`flores_pedido`, `floristeria`.`pedidos` WHERE `flores_pedido`.`id_flor` = `flower`.`id` AND `flores_pedido`.`id_pedido` = {$order_id} AND `pedidos`.`id_cliente` = {$user_id} AND `pedidos`.`id_pedido` = {$order_id}";
        */
        
        $sql = "SELECT `flower`.`id`, `flower`.`name`,`flower`.`price`, `flower`.`description`, `flower`.`imagename`, `flower`.`imagetype`, `flower`.`category`, `flower`.`imgblop` FROM `floristeria`.`flower`, `floristeria`.`flores_pedido`, `floristeria`.`pedidos`, `floristeria`.`usuarios` WHERE `flores_pedido`.`id_flor` = `flower`.`id` AND `flores_pedido`.`id_pedido` = {$order_id} AND `pedidos`.`id_cliente` = `usuarios`.`id` AND `usuarios`.`email` = '{$user_email}' AND `pedidos`.`id_pedido` = {$order_id};";
        
        
        
        //$sql .= " AND `pedidos`.`id_cliente` = {$user_id}";
        //$sql .= " AND ";
        
        return self::toFlowerArray(self::setQuery($sql));
    }

    public static function save(Order $order) {
        $sql = "";
        self::setQuery($sql);
    }

    private static function setQuery($str_query) {
        $con = Connection::getConnection();
       
        $res = $con->query($str_query);
        //$con->close();
        
        return $res;
    }
    
    private static function toOrderArray($resulta) {
        $array = array();
        while ($row = mysqli_fetch_assoc($resulta)) {
            //print_r($row);
            $array[] = new Order(
                    $row['id_pedido'], $row['id_cliente'], $row['timestamp'], (self::getFlowersByOrderId($row['id_pedido'])), $row['precio_total']
            );
            
        }
        return $array;
    }
    private static function toFlowerArray($result){
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            $array[] = new Flower(
                    $row['id'], $row['name'], $row['price'], $row['description'], $row['imagename'], $row['imagetype'], $row['category'], $row['imgblop']
            );
        }
        return $array;
    }
    
    public static function toObject($res){
        $object = null;
        while ($row = mysqli_fetch_assoc($res)) {
            //print_r($row);
            $object = new Order(
                    $row['id_pedido'], $row['id_cliente'], $row['timestamp'], (self::getFlowersByOrderId($row['id_pedido'])), $row['precio_total']
            );
        }
        return $object;
    }


}
