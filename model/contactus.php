<?php
class Contact {
    private $id;
    private $user_id;
    private $name;
    private $email;
    private $subject;
    private $message;
    private $date_time;
    private $status;

    public function __construct($id, $user_id, $name, $email, $subject, $message, $date_time, $status) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->date_time = $date_time;
        $this->status = $status;
    }

    public function getID() {
        return $this->id;
    }

    public function getUserID() {
        return $this->user_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getMessage() {
        return $this->message;
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