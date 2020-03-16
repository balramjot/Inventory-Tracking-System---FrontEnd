<?php
        $result =array();
        foreach($myinventorys as $myinventory)
        {
                $result[] = array("partNumber" => $myinventory->getTransactionID(), "partName" => $myinventory->getUserID(), "quantityOut" => $myinventory->getQuantity(), "withdrawDate" => $myinventory->getDateTime()); 
        }
        header('Content-type: application/json');               // defining json format in header
        echo json_encode($result);                              // data encoded in json format
?>