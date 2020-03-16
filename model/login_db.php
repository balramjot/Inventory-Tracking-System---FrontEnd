<?php
class LoginDB {

    // check if user already exist

    public static function checkUser($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $passwords = $crediential->getPassword();
        $query = 'SELECT * FROM user
                  WHERE email = :email
                  AND password = :passwords';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwords', $passwords);
        $statement->execute();    
        $row = $statement->rowCount();
        $statement->closeCursor();
        return $row;
    }

    // logging in the user

    public static function userLogin($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $passwords = $crediential->getPassword();
        $query = 'SELECT * FROM user
                  WHERE email = :email
                  AND password = :passwords';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwords', $passwords);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();
        $logval = new Login($row['id'],$row['first_name'], '');
        $_SESSION['account']['user_id'] = $logval->getUserID();                                     // assigning id to the session
        $_SESSION['account']['name'] = $logval->getEmail();                                         // assigning name to the session
    }

    // check if user is published by administrator or not

    public static function userStatus($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $passwords = $crediential->getPassword();
        $query = 'SELECT * FROM user
                  WHERE email = :email
                  AND password = :passwords AND status = "1"';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwords', $passwords);
        $statement->execute();    
        $row = $statement->rowCount();
        $statement->closeCursor();
        return $row;
    }

    // user login for rest api
    
    public static function userLoginRest($crediential) {
        $db = Database::getDB();
        $email = $crediential->getEmail();
        $passwords = $crediential->getPassword();
        $query = 'SELECT * FROM user
                  WHERE email = :email
                  AND password = :passwords';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwords', $passwords);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();
        return $row;
    }
    
}
?>