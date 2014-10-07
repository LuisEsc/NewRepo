<?php

/**
 * Description of MyEvent
 *
 * @author Esmonet
 */
class MyEvent extends Handler {

    //put your code here
    private $handle;

    public function __construct($event_handle) {
        $this->handle = $event_handle;
    }

}
