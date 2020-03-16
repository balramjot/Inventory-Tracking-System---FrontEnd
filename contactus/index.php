<?php
    require('../model/database.php'); 
    require('../model/contactus.php');                                       // importing constructor class file
    require('../model/contactus_db.php');                                    // importing function file
    
$action = filter_input(INPUT_POST, 'action');                                   // checking the value in action coming from post method

// for showing contact us page is action is null

if ($action == NULL)                                                            
{
    $action = filter_input(INPUT_GET, 'action');                                            // checking the value in action coming from get method
    if ($action == NULL)                                                                    // nothing found in action
    {  
        header('Location: contactus.php');
    }
}

// redirecting to contact us page after getting desired value in action
if($action == 'contactUS')
{
    header('Location: contactus.php');
}

// for sending contact us message

else if ($action == 'saveContact')
{
    // form values

    $name = filter_input(INPUT_POST, 'name');  
    $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);  
    $subject = filter_input(INPUT_POST, 'subject');  
    $message = filter_input(INPUT_POST, 'message');    

    if ($email == NULL || $email == FALSE || $name == NULL || $subject == NULL || $message == NULL)
    {
        $_SESSION['error_user'] = "Something went wrong. Please check your input(s).";
        header('Location: contactus.php');
    }
    else
    {
        $crediential = new Contact('',$_SESSION['account']['user_id'],$name,$email,$subject,$message,'','');
        ContactDB::sendMessage($crediential);                                                               // calling the function
        $_SESSION['success_user'] = "Your message has been sent successfully.";
        header('Location: contactus.php');
    }
}

?>

