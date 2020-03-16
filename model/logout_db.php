<?php
class LogoutDB {
    // function to logout user
    
    public static function userLogout() {
        $db = Database::getDB();
        unset($_SESSION['account']['user_id']);
        unset($_SESSION['account']['name']);
        session_destroy();
    }
}
?>