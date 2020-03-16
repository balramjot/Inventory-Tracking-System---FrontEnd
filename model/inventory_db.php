<?php
class InventoryDB {

    // for adding the transaction and updating part in parts table after successful transaction

    public static function updateInventory($crediential1) {
        $db = Database::getDB();
        $user_id = $crediential1->getUserID();
        $part_id = $crediential1->getPartID();
        $quantity = $crediential1->getQuantity();
        $trnQuantity = $crediential1->getStatus();
        $query = 'INSERT INTO transaction SET
                  user_id = :user_id,
                  part_id = :part_id,
                  quantity = :trnQuantity';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':part_id', $part_id);
        $statement->bindValue(':trnQuantity', $trnQuantity);
        $statement->execute();
        $statement->closeCursor();

        $query1 = 'UPDATE parts SET
                  quantity = :quantity
                  WHERE id = :part_id';
        $statement1 = $db->prepare($query1);
        $statement1->bindValue(':part_id', $part_id);
        $statement1->bindValue(':quantity', $quantity);
        $statement1->execute();
        $statement1->closeCursor();
    }

    // for getting inventory transaction list for the signed in user

    public static function getMyInventoryList($crediential) {
        $db = Database::getDB();
        $user_id = $crediential->getUserID();
        $query = 'SELECT * FROM transaction
                  WHERE user_id = :user_id
                  ORDER BY id ASC';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        
        $inventorys = array();
        foreach ($statement as $row) {
            $part1 = PartDB::getPart($row['part_id']);
            $partno = $part1->getPartNo();
            $partname = $part1->getPartName();
            $rem_quantity = $part1->getQuantity();
            $partid = $part1->getID();
            $inventory = new Inventory($partno, $partname,$partid,$row['quantity'],$row['date_time'],$rem_quantity);
            $inventorys[] = $inventory;
        }
        return $inventorys;
    }
    
}
?>