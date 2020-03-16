<?php
    require('model/database.php');                                         // importing database connection file
        require('model/login.php');                                       // importing constructor class file
        require('model/login_db.php');                                    // importing function file
    
$action = filter_input(INPUT_POST, 'action');                                   // checking the value in action coming from post method

// for showing index page on project load

if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action');                                // checking the value in action coming from get method
    if ($action == NULL)                                                        // nothing found in action
    {  
        header('Location: login');
    }
}


if ($action == 'login')
{
    $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);                                         // assigning email post value to variable
    $password = filter_input(INPUT_POST, 'password');                                                       // assigning password post value to variable
    
    if ($email == NULL || $email == FALSE || $password == NULL)                                                // validating that values must not be empty
    {
        $_SESSION['error_user'] = "Something went wrong. Please check your input(s).";                           // error message to be displayed
        header('Location: login');
    }
    else
    {
          $crediential = new Login('',$email, $password);
          $chk_result = LoginDB::checkUser($crediential);                                               // checking if user exist or not
          if($chk_result >= 1)
          {
            $chk_status = LoginDB::userStatus($crediential);                                            // checking user must be published by admin
            if($chk_status >= 1)
            {
                LoginDB::userLogin($crediential);                                                               // calling function for user login
                header('Location: dashboard/index.php?action=dashboard');                               // redirecting to dashboard page after successful login
            }
            else
            {
                $_SESSION['error_user'] = "Your account hasa been deactivated by the administrator.";             // error message to be displayed
                header('Location: login');
            }
          }
          else
          {
            $_SESSION['error_user'] = "Please check your email or password.";                                   // error message to be displayed
            header('Location: login');
          }
    }
}
?>

