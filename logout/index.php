<?php
    require('../model/database.php');                                      // importing database connection file
    session_start();
    require('../model/logout_db.php');                                    // importing function file
    
   
if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action');                                // checking the value in action coming from get method
    if ($action == NULL)                                                        // nothing found in action
    {  
        LogoutDB::userLogout();                                                 // calling the function to make user logout
        header('Location: ../login');
    }
}
?>