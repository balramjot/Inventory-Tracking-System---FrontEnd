<?php
    require('../model/database.php');                                                              // importing database connection file
    require('../administrator/model/category.php');                                              // importing constructor class file
    require('../administrator/model/category_db.php');                                           // importing function file
    require('../administrator/model/part.php');                                                 // importing constructor class file
    require('../administrator/model/part_db.php');                                               // importing function file
    require('../model/inventory.php');                                                          // importing constructor class file
    require('../model/inventory_db.php');                                                       // importing function file
    
$action = filter_input(INPUT_POST, 'action');                                   // checking the value in action coming from post method

// to display all parts if action is empty 

if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action'); 
                                                                                // checking the value in action coming from get method
    if ($action == NULL)                                                        // nothing found in action
    {  
        $allparts = PartDB::getPartList();
        include('inventory.php');
    }
}

// to display all parts

if($action == 'inventoryTrack')
{
    $allparts = PartDB::getPartList();
    include('inventory.php');
}

// for inventory transaction request

else if ($action == 'changeInventory')
{
    $quantity = filter_input(INPUT_POST, 'widthdraw_quantity',FILTER_VALIDATE_INT);  
    $part_id = filter_input(INPUT_POST, 'part_id',FILTER_VALIDATE_INT);    

    if ($part_id == NULL || $part_id == FALSE || $quantity == NULL || $quantity == FALSE)
    {
        $_SESSION['error'] = "Something went wrong. Please check your input(s).";
        $allparts = PartDB::getPartList();
        include('inventory.php');
    }
    else
    {
        $ext_quantity = PartDB::getPart($part_id);
        $total_quantity = $ext_quantity->getQuantity();
        $new_quantity = $total_quantity - $quantity;
        $crediential = new Inventory('',$_SESSION['account']['user_id'],$part_id,$new_quantity,'',$quantity);
        InventoryDB::updateInventory($crediential);
        $_SESSION['success'] = "Inventory transaction has been completed successfully.";
        $allparts = PartDB::getPartList();
        include('inventory.php');
    }
}

// for my inventory

elseif($action == 'myInventoryTrack')
{
    $crediential = new Inventory('',$_SESSION['account']['user_id'],'','','','');
    $myinventorys = InventoryDB::getMyInventoryList($crediential);
    include('my-inventory.php'); 
}

// for viewing part

elseif($action == 'viewPart')
{
    $partid = filter_input(INPUT_GET, 'partid',FILTER_VALIDATE_INT);
    $partinfo = PartDB::getPart($partid);
    include('part-info.php'); 
}

// for part search

elseif($action == 'searchPart')
{
    $search = filter_input(INPUT_GET, 'search');
    $allparts = PartDB::getSearchedPart($search);
    include('inventory.php');
}

?>

