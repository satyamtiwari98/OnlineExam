<?php
// -----------------------------------This is Question Class Which deals with Question table---------------------------

require_once 'Dbcon.php';


class Question extends Dbcon {

    const table_question = 'Question'; // This the table name of Subject
    public $connect;
    public $subject_id;
    public $question_id;
    public $question;
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $answer;

    public function __construct()
    {
        $lets_connect = new Dbcon();
        $this->connect=$lets_connect->connect;


                // Check connection
        if ($this->connect->connect_error) {

              die("Connection failed: " . $this->connect->connect_error);

        }

        
    }


    public function AddQuestions($question,$option1,$option2,$option3,$option4,$answer,$subject_id){

      $this->question = $question;
      $this->option1 = $option1;
      $this->option2 = $option2;
      $this->option3 = $option3;
      $this->option4 = $option4;
      $this->answer = $answer;
      $this->subject_id = $subject_id;

      $sqlQuery = "INSERT INTO `".self::table_question."` (`question`,`option1`,`option2`,`option3`,`option4`,`answer`,`subject_id`) VALUES ('$this->question','$this->option1','$this->option2','$this->option3','$this->option4','$this->answer','$this->subject_id')";

      $result = $this->connect->query($sqlQuery);


      if($result==True){
        return 1;
      }else{
        return 0;
      }



    }






  }