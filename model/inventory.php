<?php
class Inventory {
    private $id;
    private $user_id;
    private $part_id;
    private $quantity;
    private $date_time;
    private $status;

    public function __construct($id, $user_id, $part_id, $quantity, $date_time, $status) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->part_id = $part_id;
        $this->quantity = $quantity;
        $this->date_time = $date_time;
        $this->status = $status;
    }

    public function getTransactionID() {
        return $this->id;
    }

    public function getUserID() {
        return $this->user_id;
    }

    public function getPartID() {
        return $this->part_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getDateTime() {
        $org_date = $this->date_time;
        $newDate = date("F d,Y", strtotime($org_date));
        return $newDate;
    }

    public function getStatus() {
        return $this->status;
    }
}
?>