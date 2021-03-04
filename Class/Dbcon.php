<?php
// ---------------------------------------DataBase Connection Class------------------------

class Dbcon {

    public $ServerName = "localhost"; // Your Host Name
    public $DataBase = "OnlineExam"; // Your DataBase Name
    public $UserName = "root"; // Your User name
    public $password = ""; // Your Password
    public $connect;

    function __construct()
    {
        $this->connect =  new mysqli($this->ServerName, $this->UserName, $this->password, $this->DataBase);

        
    }
}