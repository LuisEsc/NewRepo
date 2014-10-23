<?php
class Slide{
 
    public $id;
    public $imagename;
    public $imagetype;
    public $binaryimg;
    public $header;
    public $description;
    
    public function __construct($id, $imagename, $imagetype, $binaryimg, $header, $description) {
        $this->id = $id;
        $this->imagename = $imagename;
        $this->imagetype = $imagetype;
        $this->binaryimg = $binaryimg;
        $this->header = $header;
        $this->description = $description;
    }
}

