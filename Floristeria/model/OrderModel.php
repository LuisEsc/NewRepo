<?php

class OrderModel {

    public static function getOrders() {
        return self::toOrderArray(self::setQuery("SELECT * FROM pedidos ORDER BY pedidos.id_pedido ASC"));
    }

    public static function getOrdersByUserId($user_id) {
        return self::toArray(self::setQuery("SELECT * FROM pedidos WHERE id_cliente = '{$user_id}' ORDER BY pedidos.id_pedido ASC"));
    }

    public static function getOrderById($id) {
        if (is_numeric($id)) {
            return self::toObject(self::setQuery("SELECT * FROM pedidos WHERE id_pedido = '{$id}'"));
        }
        return null;
    }
    
    public static function getFlowersByOrderId($order_id) {
        $sql  = " SELECT `flower`.`id`, `flower`.`name`,`flower`.`price`, `flower`.`description`, `flower`.`imagename`, `flower`.`imagetype`, `flower`.`category`, `flower`.`imgblop` ";
        $sql .= " FROM `floristeria`.`flower`, `floristeria`.`flores_pedido` ";
        $sql .= " WHERE `flores_pedido`.`id_flor` = `flower`.`id`";
        $sql .= " AND `flores_pedido`.`id_pedido` = {$order_id}";
        
        return self::toFlowerArray(self::setQuery($sql));
    }

    public static function save(Order $order) {
        $sql = "";
        self::setQuery($sql);
    }

    private static function setQuery($str_query) {
        $con = Connection::getConnection();
       
        $res = $con->query($str_query);
        $con->close();
        
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
        $arrayy = array();
        while ($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            $arrayy[] = new Flower(
                    $row['id'], $row['name'], $row['price'], $row['description'], $row['imagename'], $row['imagetype'], $row['category'], $row['imgblop']
            );
        }
        return $arrayy;
    }


}
