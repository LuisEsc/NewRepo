<?php

class SliderModer {

    public static function getSliders() {
        $sql = "SELECT * FROM sliders";
        return self::toArray(self::setQuery($sql));
    }

    public static function saveSlider(Slide $slide) {
        $sql = " INSERT INTO sliders AS(id, imagename,imagetype,binaryimg,header,description) ";
        $sql.= " VALUES(null, '{$slide->imagename}', '{$slide->imagetype}', '{$slide->binaryimg}', '{$slide->header}', '{$slide->description}') ";
        return self::setQuery($sql);
    }

    public static function updateSlider(Slide $slide) {
        $sql = " UPDATE sliders ";
        $sql.= " SET imagename = '{$slide->imagename}',"
                  . "imagetype = '{$slide->imagetype}',"
                  . "binaryimg = '{$slide->binaryimg}',"
                  . "header = '{$slide->header}',"
                  . "description = '{$slide->description}' ";
        $sql.= " WHERE id = {$slide->id}";
        return self::setQuery($sql);
    }

    public static function setQuery($sql) {
        $con = Connection::getConnection();
        $res = $con->query($sql);
        //$con->close();
        return $res;
    }

    public static function toArray($result) {
        $array = array();
        while (($row = mysqli_fetch_array($result)) != null) {
            $array[] = new Slide($row[0], $row[1], $row[2], $row[3], $row[4], $row[5] );
        }
        return $array;
    }

}
