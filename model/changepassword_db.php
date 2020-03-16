<?php
class ChangePasswordDB {

    // check if user exist

    public static function checkUser($crediential) {
        $db = Database::getDB();
        $id = $crediential->getUserID();
        $passwords = $crediential->getPassword();
        $query = 'SELECT * FROM user
                  WHERE password = :passwords
                  AND id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':passwords', $passwords);
        $statement->bindValue(':id', $id);
        $statement->execute();    
        $row = $statement->rowCount();
        $statement->closeCursor();
        return $row;
    }

    // function to change the password

    public static function changePassword($crediential1) {
        $db = Database::getDB();
        $id = $crediential1->getUserID();
        $passwords = $crediential1->getPassword();
        $query = 'UPDATE user SET
                  password = :passwords
                  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':passwords', $passwords);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
?>