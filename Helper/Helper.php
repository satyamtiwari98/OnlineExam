<?php
//----------------------------------This is Helper File--------------------------------------------------------

    include_once "../Class/User.php";
    include_once "../Class/Question.php";
    include_once "../Class/Subject.php";
    include_once "../Class/Result.php";
    

if(isset($_POST['action'])) {

    $action = $_POST['action'];

    switch($action) {

        case 'signup':
            $name = $_POST['name'];
            $email_id = $_POST['email_id'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];

            $userObject = new User();
            $result = $userObject->SignUp($name,$email_id,$mobile,$password);

            echo $result;

            break;

        case 'login':
            $email_id = $_POST['email_id'];
            $password = $_POST['password'];

            $userObject = new User();
            $result = $userObject->LogIn($email_id,$password);

            echo $result;

            break;

        case 'addsubject':
            $subject_name = $_POST['subject'];

            $subjectObject = new Subject();
            $result = $subjectObject->AddSubject($subject_name);

            echo $result;

            break;

        case 'GetSubjects':
            $subjectObject = new Subject();
            $result = $subjectObject->GetSubjects();

            echo json_encode($result);


            break;

        case 'AddQuestion':
            $subject_id = $_POST['subject'];
            $question = $_POST['question'];
            $option1 = $_POST['option1'];
            $option2 = $_POST['option2'];
            $option3 = $_POST['option3'];
            $option4 = $_POST['option4'];
            $answer = $_POST['answer'];

            $questionObject = new Question();
            $result = $questionObject->AddQuestions($question,$option1,$option2,$option3,$option4,$answer,$subject_id);

            echo $result;

            break;


        case 'getRandomQuestions':
            $subject_id = $_POST['subject_id'];

            $questionObject = new Question();
            $result = $questionObject->GetRandomQuestions($subject_id);

            echo json_encode($result);

            break;

        case 'result':
            $user_id = $_POST['user_id'];
            $subject_id = $_POST['subject_id'];
           
            $result = 0;
            $unattemped=0;
            $wrong=0;
            for($i=0;$i<10;$i++){
                if($_POST['answer'.$i]==$_POST['ques'.$i]){
                    $result+=1;
                }else if($_POST['ques'.$i]==""){
                    $unattemped+=1;
                }else{
                    $wrong+=1;
                }
            }

            $arr = array('result'=>$result,'unattemped'=>$unattemped,'wrong'=>$wrong);

            $resultObject = new Result();
            $result = $resultObject->InsertResult($result,$user_id,$subject_id);
        
            echo json_encode($arr);
            break;




        
            





    }


}