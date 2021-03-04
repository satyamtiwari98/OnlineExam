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




        
            





    }


}