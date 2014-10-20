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
        $sql = "INSERT INTO flower (id, name, description, price, imagename, imagetype, category, imgblop)";
        //$sql .= "VALUES (null , {$flower->name}}, {$flower->description}, {".(float) $flower->price.",} {$flower->image_name}, {$flower->image_type}, {". (int) $flower->category ."}, {". $flower->str_imgcodificada."})");
        $sql .= "VALUES (null , '{$flower->name}', '{$flower->description}', {$flower->price}, '{$flower->image_name}', '{$flower->image_type}', {$flower->category}, '{$flower->str_imgcodificada}')";
        
        echo "id: ".$flower->id;
        self::setQuery($sql);
    }
    
    public static function update(Flower $flower){
        $sql = "UPDATE flower SET name = '{$flower->name}', description = '{$flower->description}', price= {$flower->price}, imagename = '{$flower->image_name}', imagetype = '{$flower->image_type}', category = {$flower->category}, imgblop = '{$flower->str_imgcodificada}' where id = {$flower->id}";
        self::setQuery($sql);
    }
    
    public static function updateNoImg(Flower $flower){
        $sql = "UPDATE flower SET name = '{$flower->name}', description = '{$flower->description}', price= {$flower->price}, category = {$flower->category} where id = {$flower->id}";
        self::setQuery($sql);
    }
    
    public static function delete($id){
        $sql = "DELETE FROM flower WHERE id='{$id}'";
        return self::setQuery($sql);
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
            return new Flower($object->id, $object->name, $object->price, $object->description, $object->imagename, $object->imagetype, $object->category, $object->imgblop);
        }
        return null;
    }

}
