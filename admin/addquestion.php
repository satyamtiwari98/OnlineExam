<?php

    include_once 'layout/header.php';

?>

<h3 style="color: green; text-align:center; padding:20px;">Add Subject For The Quiz</h3>

<div class="main">



<form action="" method="POST">

<div class="mb-3">
    <label for="subjectOption" class="form-label">Add Subject</label>
<select class="form-select" id="subjectOption" name="subjectOption" aria-label="Default select example" required>

  <option >Select Subject</option>
  
</select>
</div>

    <div class="mb-3">
    <label for="question" class="form-label">Add Question</label>
    <input type="text" class="form-control" id="question" name="question"  placeholder="Enter Your Question" required>
  </div>

  <div class="mb-3">
    <label for="option1" class="form-label">Option 1</label>
    <input type="text" class="form-control" id="option1" name="option1"  placeholder="Enter Your First Option" required>
  </div>

  <div class="mb-3">
    <label for="option2" class="form-label">Option 2</label>
    <input type="text" class="form-control" id="option2" name="option2"  placeholder="Enter Your Second Option" required>
  </div>

  <div class="mb-3">
    <label for="option3" class="form-label">Option 3</label>
    <input type="text" class="form-control" id="option3" name="option3"  placeholder="Enter Your Third Option" required>
  </div>

  <div class="mb-3">
    <label for="option4" class="form-label">Option 4</label>
    <input type="text" class="form-control" id="option4" name="option4"  placeholder="Enter Your Fourth Option" required>
  </div>



  <div class="mb-3">
    <label for="answer" class="form-label">Answer</label>
    <select class="form-select" id="answer" name="answer" aria-label="Default select example" required>

  <option >Select Subject</option>
  <option id="selectoption1"></option>
  <option id="selectoption2" ></option>
  <option id="selectoption3"></option>
  <option id="selectoption4"></option>

  
</select>
  </div>

  <input type="submit" class="btn btn-outline-success" id="addquestionSubmit" name="addquestionSubmit" value="Add Question">

    </form>





</div>


<?php 

    include_once 'layout/footer.php';

?>

<script>

    $(document).ready(function(){

        getSubjectOptions();
    });


    function getSubjectOptions(){

        $.ajax({

            url:'../Helper/Helper.php',
            type:'POST',
            data:{
                'action':'GetSubjects',
            },
            success:function(response){
                let data = JSON.parse(response);
                for(var i =0;i<data.length;i++){

                    $('#subjectOption').append('<option value="'+data[i]['subject_id']+'">'+data[i]['subject_name']+'</option');

                }

            }

        });
        
    }

    $('#option1').on('change',function(){

        var option1 = $('#option1').val();

        $('#selectoption1').attr("value",option1);
        $('#selectoption1').text(option1);

    });


    $('#option2').on('change',function(){

        var option2 = $('#option2').val();

        $('#selectoption2').attr("value",option2);
        $('#selectoption2').text(option2);

    });


    $('#option3').on('change',function(){

        var option3 = $('#option3').val();

        // $('#answer').append('<option value="'+option3+'">'+option3+'</option>');
        $('#selectoption3').attr("value",option3);
        $('#selectoption3').text(option3);

    });



    $('#option4').on('change',function(){

        var option4 = $('#option4').val();

        // $('#answer').append('<option value="'+option4+'">'+option4+'</option>');
        $('#selectoption4').attr("value",option4);
        $('#selectoption4').text(option4);

    });


    $('#addquestionSubmit').on('click',function(){
        var subject = $('#subjectOption').val();
        var question = $('#question').val();
        var option1 = $('#option1').val();
        var option2 = $('#option2').val();
        var option3 = $('#option3').val();
        var option4 = $('#option4').val();
        var answer = $('#answer').val();

        $.ajax({
            url:'../Helper/Helper.php',
            type:'POST',
            data:{
                'subject':subject,
                'question':question,
                'option1':option1,
                'option2':option2,
                'option3':option3,
                'option4':option4,
                'answer':answer,
                'action':'AddQuestion',

            },
            success:function(response){
                console.log(response);

                if(response == 1){
                    alert("Questions Added Successfully !!!");
                    location.reload();
                }else{
                    alert("OOPS Something went wrong !!!!");
                    location.reload();
                }

            }
        })


    });

</script>