<?php
    require('../model/database.php');                                  // importing database connection file
    require('../model/changepassword.php');                                      // importing constructor class file
    require('../model/changepassword_db.php');                                // importing function file
    $action = filter_input(INPUT_POST, 'action');                                   // checking the value in action coming from post method

// for showing change password page if action is null

if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action'); 
    if ($action == NULL)                                                        // nothing found in action
    {  
        header('Location: change-password.php');
    }
}

// for changing of password

if($action == 'changePassword')
{
    // form values
    $current_password = filter_input(INPUT_POST, 'current_password');
    $new_password = filter_input(INPUT_POST, 'new_password');
    $retype_password = filter_input(INPUT_POST, 'retype_password');                                     
    if ($current_password == NULL || $new_password == NULL || $retype_password == FALSE)                // validation for empty values
    {
        $_SESSION['error_user'] = "Something went wrong. Please check your input(s).";
        header('Location: change-password.php');                                                            
    }
    elseif($new_password != $retype_password)                                                           // validation if new and retype password matched
    {
        $_SESSION['error_user'] = "New password and retype password not matched";
        header('Location: change-password.php');
    }
    else
    {
          $crediential = new ChangePassword($_SESSION['account']['user_id'],$current_password);
          $chk_result = ChangePasswordDB::checkUser($crediential);                                                  // checking if current password matches
          if($chk_result >= 1)
          {
                $crediential1 = new ChangePassword($_SESSION['account']['user_id'],$new_password);
                ChangePasswordDB::changePassword($crediential1);                                                // calling the function of change password
                $_SESSION['success_user'] = "Your account password has been changed successfully.";
                header('Location: change-password.php');
          }
          else
          {
            $_SESSION['error_user'] = "Password not matched. Please check your password.";             // error message to be displayed
            header('Location: change-password.php');
          }
    }
}
?>

