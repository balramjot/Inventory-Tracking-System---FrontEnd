<?php
if(empty($_SESSION['account']['user_id']) && !isset($_SESSION['account']['user_id']))               // checking if user already logged in or not
{
    header('Location: ../login');
    exit;
}
?>