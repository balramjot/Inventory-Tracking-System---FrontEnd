<?php
class ForgetPasswordDB {

    // checking if user exist or not

    public static function checkUser($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $query = 'SELECT * FROM user
                  WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();    
        $row = $statement->rowCount();
        $statement->closeCursor();
        return $row;
    }

    // forgot password function

    public static function forgetPassword($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $query = 'SELECT * FROM user
                  WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();
        $logval = new ForgetPassword('','',$row['password']);
        $pswd = $logval->getPassword();
        return $pswd;
    }

    // checking if user is published by the administrator or not

    public static function userStatus($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $query = 'SELECT * FROM user
                  WHERE email = :email
                  AND status = "1"';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();    
        $row = $statement->rowCount();
        $statement->closeCursor();
        return $row;
    }

}
?>