<?php

function mostrarDescripcion($description){
    $descAcortada = "";
    //if(strlen($description)>100){
        $descAcortada = substr($description, 0, 100);
        $descAcortada .= "...";
        return $descAcortada;
    //}
}