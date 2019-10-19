<?php
require_once"../Includes/connection.php";
class MJcode{
    private $id;
    private $name;
    private $email;
    private $message;
    private $service;
    private $clock;

    public function __construct($name, $email, $message, $service, $clock){
       // $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->service = $service;
        $this->clock = $clock;
    }

    public static function insertContact(){
        $query = "INSERT INTO mjcode_Contact(name, email, message, service, clock) VALUES ('$name','$email', '$message','$service', '$date')";
        $res   = $query->execute();
        return true;
    }
}