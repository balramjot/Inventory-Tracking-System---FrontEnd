<?php
class ContactDB {

    // for sending contact us message

    public static function sendMessage($crediential) { 
        $db = Database::getDB();
        $user_id = $crediential->getUserID();
        $name = $crediential->getName();
        $email = $crediential->getEmail();
        $subject = $crediential->getSubject();
        $message = $crediential->getMessage();

        $query = 'INSERT INTO contactus SET
                  user_id = :user_id,
                  name = :name,
                  email = :email,
                  subject = :subject,
                  message = :message';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':message', $message);
        $statement->execute();
        $statement->closeCursor();
    }

    // for getting contact us messages list for admin

    public static function getContactUSList() {
        $db = Database::getDB();
        $query = 'SELECT * FROM contactus
                  ORDER BY id ASC';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $contacts = array();
        foreach ($statement as $row) {
            $contact = new Contact($row['id'],'',$row['name'],$row['email'],$row['subject'],$row['message'],$row['date_time'],'');
            $contacts[] = $contact;
        }
        return $contacts;
    }

    // for deleting contact us message for admin

    public static function delete($id,$table) {
        $db = Database::getDB();
        $query = 'DELETE FROM '.$table.' WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
?>