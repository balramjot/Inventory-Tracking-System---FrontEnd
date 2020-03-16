<?php
    require('../model/database.php');                                               // importing database connection file
    require('../model/forgetpassword.php');                                       // importing constructor class file
    require('../model/forgetpassword_db.php');                                    // importing function file
    $action = filter_input(INPUT_POST, 'action');                                   // checking the value in action coming from post method

// for showing index page on project load

if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action'); 
    if ($action == NULL)                                                        // nothing found in action
    {  
        header('Location: forget-password.php');
    }
}

// for forget password request submitted

if($action == 'forgetPassword')
{
    $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);                                        
    if ($email == NULL || $email == FALSE)
    {
        $_SESSION['error_user'] = "Something went wrong. Please check your input(s).";
        header('Location: forget-password.php');                                                            // error message page
    }
    else
    {
          $crediential = new ForgetPassword('',$email,'');
          $chk_result = ForgetPasswordDB::checkUser($crediential);                              // validation if user exist
          if($chk_result >= 1)
          {
            $chk_status = ForgetPasswordDB::userStatus($crediential);                           // validation if user is published
            if($chk_status >= 1)
            {
                $fgt_pwd = ForgetPasswordDB::forgetPassword($crediential);                                            // calling function
                $_SESSION['success_user'] = "Your account password is : <b>".$fgt_pwd."</b>";
                header('Location: index.php');
            }
            else
            {
                $_SESSION['error_user'] = "Your account has been deactivated by the administrator.";             // error message to be displayed
                header('Location: index.php');
            }
          }
          else
          {
            $_SESSION['error_user'] = "Please check your email.";                                               // error message to be displayed
            header('Location: index.php');
          }
    }
}
?>

