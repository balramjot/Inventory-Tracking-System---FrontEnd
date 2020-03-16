<?php
  require('model/database.php');                                      // importing database connection file
  require('model/login.php');                                           // importing constructor class file
  require('model/login_db.php');                                        // importing function file
  require('administrator/model/category.php');                          // importing constructor class file
  require('administrator/model/category_db.php');                          // importing function file
  require('administrator/model/part.php');                               // importing constructor class file
  require('administrator/model/part_db.php');                           // importing function file
  require('model/inventory.php');                                      // importing constructor class file
  require('model/inventory_db.php');                                    // importing function file

$action = filter_input(INPUT_GET, 'action');                                   // checking the value in action coming from get method
$format = filter_input(INPUT_GET, 'format');                                    // checking the format of the output data

if ($action == NULL || $format == NULL)                                                            
{
    echo 'Something went wrong';                                                // error if values are empty
    exit;
}


// for login user in xml format

if ($action == 'login' && $format == 'xml')
{
    $email = filter_input(INPUT_GET, 'email',FILTER_VALIDATE_EMAIL);                                  // assigning email get value to variable
    $password = filter_input(INPUT_GET, 'password');                                                 // assigning password get value to variable
    
    if ($email == NULL || $email == FALSE || $password == NULL)                                     // validations
    {
        $error = "Something went wrong. Please check your input(s).";                               // error message to be displayed
        include('error_xml.php');                                                                   // including error xml file
    }
    else
    {
          $crediential = new Login('',$email, $password);
          $chk_result = LoginDB::checkUser($crediential);                                           // checking if user exist or not  
          if($chk_result >= 1)
          {
            $chk_status = LoginDB::userStatus($crediential);                                        // checking if user is published by admin
            if($chk_status >= 1)
            {
                $logininfo = LoginDB::userLoginRest($crediential);                                  // calling function to login the user
                include('login/login_xml.php');                                                     // including login xml file
            }
            else
            {
                $error = "Your account hasa been deactivated by the administrator.";                     // error message to be displayed
                include('error_xml.php');                                                               // including error xml file
            }
          }
          else
          {
            $error = "Please check your email or password.";                                            // error message to be displayed
            include('error_xml.php');                                                                   // including error xml file
          }
    }
}

// for login user in json format

else if ($action == 'login' && $format == 'json')
{
    $email = filter_input(INPUT_GET, 'email',FILTER_VALIDATE_EMAIL);                                    // assigning email get value to variable
    $password = filter_input(INPUT_GET, 'password');                                                    // assigning password get value to variable
    
    if ($email == NULL || $email == FALSE || $password == NULL)                                                // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                                          // error message to be displayed
        include('error_json.php');                                                                              // including error json file
    }
    else
    {
          $crediential = new Login('',$email, $password);
          $chk_result = LoginDB::checkUser($crediential);                                                   // checking if user exist or not 
          if($chk_result >= 1)
          {
            $chk_status = LoginDB::userStatus($crediential);                                                // checking if user is published by admin
            if($chk_status >= 1)
            {
                $logininfo = LoginDB::userLoginRest($crediential);                                   // calling function to login the user
                include('login/login_json.php');                                                        // including login json file
            }
            else
            {
                $error = "Your account hasa been deactivated by the administrator.";                                    // error message to be displayed
                include('error_json.php');                                                                             // including error json file
            }
          }
          else
          {
            $error = "Please check your email or password.";                                                            // error message to be displayed
            include('error_json.php');                                                                                  // including error json file
          }
    }
}

// for my transaction in xml format

else if ($action == 'myInventory' && $format == 'xml')
{
    $user_id = filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);                                          // assigning user_id get value to variable

    if ($user_id == NULL || $user_id == FALSE)                                                                  // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                                                  // error message to be displayed
        include('error_xml.php');                                                                                       // including error xml file
    }
    else
    {
        $crediential = new Inventory('',$user_id,'','','','');
        $myinventorys = InventoryDB::getMyInventoryList($crediential);                                                  // calling function to get inventory list
        if(!empty($myinventorys))
        {
            include('inventory/myinventory_xml.php');                                                                   // including my transaction xml file
        }
        else
        {
            $error =  "Something went wrong. Please check your input(s).";                                                  // error message to be displayed
            include('error_xml.php');                                                                                      // including error xml file
        } 
    }
}

// for my transaction in json format

else if ($action == 'myInventory' && $format == 'json')
{
    $user_id = filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);                                               // assigning user_id get value to variable

    if ($user_id == NULL || $user_id == FALSE)                                                                      // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                                              // error message to be displayed
        include('error_json.php');                                                                                  // including error json file
    }
    else
    {
        $crediential = new Inventory('',$user_id,'','','','');
        $myinventorys = InventoryDB::getMyInventoryList($crediential);                                              // calling function to get inventory list
        if(!empty($myinventorys))
        {
            include('inventory/myinventory_json.php');                                                              // including my transaction json file
        }
        else
        {
            $error =  "Something went wrong. Please check your input(s).";                                              // error message to be displayed
            include('error_json.php');                                                                                   // including error json file
        } 
    }
}

// for all parts in xml format

else if ($action == 'allInventory' && $format == 'xml')
{
    $user_id = filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);

    if ($user_id == NULL || $user_id == FALSE)                                                // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
        include('error_xml.php'); 
    }
    else
    {
        $allparts = PartDB::getPartList();
        if(!empty($allparts))
        {
            include('inventory/inventory_xml.php');
        }
        else
        {
            $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
            include('error_xml.php'); 
        } 
    }
}

// for all parts in json format

else if ($action == 'allInventory' && $format == 'json')
{
    $user_id = filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);

    if ($user_id == NULL || $user_id == FALSE)                                                // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
        include('error_json.php'); 
    }
    else
    {
        $allparts = PartDB::getPartList();
        if(!empty($allparts))
        {
            include('inventory/inventory_json.php');
        }
        else
        {
            $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
            include('error_json.php'); 
        } 
    }
}

// for search parts in xml format

else if ($action == 'searchInventory' && $format == 'xml')
{
    $user_id = filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);
    $search = filter_input(INPUT_GET, 'search');

    if ($user_id == NULL || $user_id == FALSE)                                                // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
        include('error_xml.php'); 
    }
    else
    {
        $allparts = PartDB::getSearchedPart($search);
        if(!empty($allparts))
        {
            include('inventory/inventory_xml.php');
        }
        else
        {
            $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
            include('error_xml.php'); 
        } 
    }
}

// for search parts in json format

else if ($action == 'searchInventory' && $format == 'json')
{
    $user_id = filter_input(INPUT_GET, 'user_id',FILTER_VALIDATE_INT);
    $search = filter_input(INPUT_GET, 'search');

    if ($user_id == NULL || $user_id == FALSE)                                                // validating that values must not be empty
    {
        $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
        include('error_json.php'); 
    }
    else
    {
        $allparts = PartDB::getSearchedPart($search);
        if(!empty($allparts))
        {
            include('inventory/inventory_json.php');
        }
        else
        {
            $error =  "Something went wrong. Please check your input(s).";                           // error message to be displayed
            include('error_json.php'); 
        } 
    }
}
?>