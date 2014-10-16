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

    public static function save(Flower $flower) {
        $sql = "INSERT INTO table_name (id, name, description, price, imagename, imagetype, category, imgblop)";
        $sql .= "VALUES (null , {$flower->name}}, {$flower->description}, {$flower->price}, {$flower->image_name}, {$flower->image_type}, {$flower->category}, {$flower->str_imgcodificada})";
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
                    $row['id'], $row['name'], $row['price'], $row['description'], $row['imagename'], $row['imagetype'], $row['category'], $row['imgblop']
            );
        }
        return $array;
    }

    private static function toObject($result) {
        $object = mysqli_fetch_object($result);
        if ($object != null) {
            return new Flower($object->id, $object->name, $object->price, $object->description, $object->image_name, $object->image_type, $object->category, $object->str_imgcodificada);
        }
        return null;
    }

}
