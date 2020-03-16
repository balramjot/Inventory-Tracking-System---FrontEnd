<?php
class DashboardUser {
    private $id;
    private $first_name;

    public function __construct($id, $first_name) {
        $this->id = $id;
        $this->first_name = $first_name;
    }

    public function getUserID() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->first_name;
    }
}
?>