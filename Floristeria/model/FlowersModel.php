<?php

class FlowersModel {

    public static function getFlowers() {
        return self::toArray(self::setQuery("SELECT * FROM `flower` ORDER BY `flower`.`id` ASC"));
    }

    public static function getFlowersByCategory($cat) {
        return self::toArray(self::setQuery("SELECT * FROM `flower` WHERE `category` = {$cat} ORDER BY `flower`.`id` ASC"));
    }

    public static function getFlowerById($id) {
        if (is_numeric($id)) {
            return self::toObject(self::setQuery("SELECT * FROM `flower` WHERE `id` = {$id}"));
        }
        return null;
    }

    private static function setQuery($str_query) {
        $con = Connection::getConnection();
        $res = $con->query($str_query);
        $con->close();
        return $res;
    }

    private static function toArray($result) {
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = new Flower(
                    $row['id'], $row['name'], $row['price'], $row['description'], $row['imagename'], $row['imagetype'], $row['category']
            );
        }
        return $array;
    }

    private static function toObject($result) {
        $object = mysqli_fetch_object($result);
        if ($object != null) {
            return new Flower($object->id, $object->name, $object->price, $object->description, $object->image_name, $object->image_type, $object->category);
        }
        return null;
    }

}
