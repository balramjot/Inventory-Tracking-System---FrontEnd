<?php
class ChangePassword {
    private $id;
    private $password;

    public function __construct($id, $password) {
        $this->id = $id;
        $this->password = $password;
    }

    public function getUserID() {
        return $this->id;
    }

    public function getPassword() {
        return $this->password;
    }
}
?>