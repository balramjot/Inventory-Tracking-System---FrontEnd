<?php
        $result =array();
        
        $result[] = array("error" => $error); 
        
        header('Content-type: application/json');               // defining json format in header
        echo json_encode($result);                              // data encoded in json format
?>