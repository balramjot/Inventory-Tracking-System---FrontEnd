<?php
class DashboardUserDB {

    // getting logged in user information

    public static function getUserInfo($crediential) {
        $db = Database::getDB();
        $id = $crediential->getUserID();
        $query = 'SELECT * FROM user
                  WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();
        $logval = new DashboardUser('',$row['first_name']);
        return $logval;
    }
    
}
?>