<?php
// -----------------------------------This is Subject Class Which deals with Subject table---------------------------

require_once 'Dbcon.php';


class Subject extends Dbcon {

    const table_subject = 'Subject'; // This the table name of Subject
    public $connect;
    public $subject_id;
    public $subject_name;

    public function __construct()
    {
        $lets_connect = new Dbcon();
        $this->connect=$lets_connect->connect;
                // Check connection
if ($this->connect->connect_error) {
    die("Connection failed: " . $this->connect->connect_error);
  }
        
    }

    public function AddSubject($subject_name){
        $this->subject_name = $subject_name;

        $sqlQuery = "INSERT INTO `".self::table_subject."` (`subject_name`) VALUES ('$this->subject_name')";
// die($sqlQuery);
        $result = $this->connect->query($sqlQuery);

        if($result == True){
            return 1;
        }else {
            return 0;
        }
    }




    public function GetSubjects(){
        $data = array();

        $sqlQuery = "SELECT * FROM `".self::table_subject."`";

        $result = $this->connect->query($sqlQuery);

        if($result->num_rows>0){
            $i=0;
            while($row=$result->fetch_assoc()){
                $data[$i]=$row;
                ++$i;
            }
        }
        return $data;
    }


}