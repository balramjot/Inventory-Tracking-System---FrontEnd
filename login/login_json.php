<?php
        $result =array();
        
        $result[] = array("user_id" => $logininfo['id'], "firstName" => $logininfo['first_name'], "lastName" => $logininfo['last_name'], "email" => $logininfo['email']); 
        
        header('Content-type: application/json');               // defining json format in header
        echo json_encode($result);                              // data encoded in json format
?>