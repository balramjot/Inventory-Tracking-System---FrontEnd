<?php
        $result =array();
        foreach($allparts as $allpart)
        {
                $result[] = array("partID" => $allpart->getID(), "partNo" => $allpart->getPartNo(), "categoryName" => $allpart->getCategoryID(), "partName" => $allpart->getPartName(), "quantity" => $allpart->getQuantity(), "image" => $allpart->getImageName(), "addedON" => $allpart->getDateTime(), "description" => $allpart->getDescription()); 
        }
        header('Content-type: application/json');               // defining json format in header
        echo json_encode($result);                              // data encoded in json format
?>