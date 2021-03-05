<?php
// -----------------------------------This is Subject Class Which deals with Subject table---------------------------

require_once 'Dbcon.php';


class Result extends Dbcon {

    const table_result = 'Result'; // This the table name of Subject
    public $connect;
    public $subject_id;
    public $user_id;
    public $scored;

    public function __construct()
    {
        $lets_connect = new Dbcon();
        $this->connect=$lets_connect->connect;
                // Check connection
if ($this->connect->connect_error) {
    die("Connection failed: " . $this->connect->connect_error);
  }
        
    }

    public function InsertResult($result,$user_id,$subject_id){
        $this->scored = $result;
        $this->user_id = $user_id;
        $this->subject_id = $subject_id;

        $sqlQuery = "INSERT INTO `".self::table_result."` (`user_id`,`result`,`subject_id`) VALUES ('$this->user_id','$this->scored','$this->subject_id')";

        // die($sqlQuery);

        $result = $this->connect->query($sqlQuery);

        if($result == True){
            return 1;
        }else {
            return 0;
        }


    }




}