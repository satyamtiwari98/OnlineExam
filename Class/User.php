<?php
// -----------------------------------This is User Class Which deals with user table---------------------------

require_once 'Dbcon.php';
session_start();


class User extends Dbcon {

    const table_user = 'User'; // This the table name of user
    public $connect;
    public $user_id;
    public $email_id;
    public $name;
    public $mobile;
    public $password;

    public function __construct()
    {
        $lets_connect = new Dbcon();
        $this->connect=$lets_connect->connect;
                // Check connection
if ($this->connect->connect_error) {
    die("Connection failed: " . $this->connect->connect_error);
  }
        
    }


    public function SignUp($name,$email_id,$mobile,$password) {

        $this->name = $name;
        $this->email_id = $email_id;
        $this->mobile = $mobile;
        $this->password = $password;

        $sqlQuery = "INSERT INTO `".self::table_user."` (`name`,`email_id`,`mobile`,`password`,`is_admin`) VALUES ('$this->name','$this->email_id','$this->mobile','$this->password','0')";
        // die($sqlQuery);
        

        $result = $this->connect->query($sqlQuery);

        if($result == True) {

            return '1';

        }else {

            return '0';

        }

    }


    public function LogIn($email_id,$password) {

        $this->email_id = $email_id;
        $this->password = $password;

        $sqlQuery = "SELECT * from `".self::table_user."` WHERE `email_id`='$this->email_id' AND `password`='$this->password'";

        $result = $this->connect->query($sqlQuery);

        if($result->num_rows>0) {

            $user = $result->fetch_assoc();

            if($user['is_admin']==0) {

            $_SESSION['user']['email_id'] = $user['email_id'];
            $_SESSION['user']['name'] = $user['name'];

            return 1;

            }else if($user['is_admin']==1) {

                $_SESSION['admin']['email_id'] = $user['email_id'];
                $_SESSION['admin']['name'] = $user['name'];

                return 2;
            }
        }else {
            return 0;
        }
    }


}