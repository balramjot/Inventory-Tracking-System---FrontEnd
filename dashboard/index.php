<?php
    require('../model/database.php');                                      // importing database connection file                                  
    require('../model/dashboarduser.php');
    require('../model/dashboarduser_db.php');
    
$action = filter_input(INPUT_POST, 'action');                                   // checking the value in action coming from post method

// for showing dashboard page after successful load

if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action');                                // checking the value in action coming from get method
    if ($action == NULL)                                                        // nothing found in action
    {  
        $crediential = new DashboardUser($_SESSION['account']['user_id'],'');
        $user_info = DashboardUserDB::getUserInfo($crediential);                          // getting user info after login
        header('Location:dashboard.php');
    }
}

if ($action == 'dashboard')
{
    $crediential = new DashboardUser($_SESSION['account']['user_id'],'');
    $user_info = DashboardUserDB::getUserInfo($crediential);
    header('Location:dashboard.php');
}

?>

