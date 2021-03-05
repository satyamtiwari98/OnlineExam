<?php

    include_once 'layout/header.php';

?>


<div class="main">

    <form method="POST" action="" id="quizForm">
    <input type="text" name="action" value="result" id="disabled">

    </form>

</div>

<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Result</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-primary" id="tryagain">Try Again</button>
      </div>
    </div>
  </div>
</div>




<?php

    include_once 'layout/footer.php';

?>

<script>
    $(document).ready(function() {
    
        $('#disabled').hide();
        $('.answer').hide();

        getRandomQuestions();


       

    });

    function getRandomQuestions(){
        var subject_id = '<?php echo $_GET['id']; ?>';
        var user_id = '<?php echo $_SESSION['user']['user_id']; ?>';

        $.ajax({
            url:'../Helper/Helper.php',
            type:'POST',
            data:{
                'subject_id':subject_id,
                'action':'getRandomQuestions',
            },
            success:function(response){
                var data = JSON.parse(response);
                console.log(data);
                for(var i = 0; i<data.length;i++){

                    $('#quizForm').append(' <div class="form-group"><label for="exampleFormControlFile1">Ques'+(i+1)+'.'+data[i]['question']+'</label></div><br><div class="form-check"><input class="form-check-input" type="radio" name="ques'+i+'"  value="'+data[i]['option1']+'"><label class="form-check-label" for="flexRadioDefault1">'+data[i]['option1']+'</label></div><div class="form-check"><input class="form-check-input" type="radio" name="ques'+i+'"   value="'+data[i]['option2']+'"><label class="form-check-label" for="flexRadioDefault1">'+data[i]['option2']+'</label></div><div class="form-check"><input class="form-check-input" type="radio" name="ques'+i+'"  value="'+data[i]['option3']+'"><label class="form-check-label" for="flexRadioDefault1">'+data[i]['option3']+'</label></div><div class="form-check"><input class="form-check-input" type="radio" name="ques'+i+'" value="'+data[i]['option4']+'"><label class="form-check-label" for="flexRadioDefault1">'+data[i]['option4']+'</label><input class="form-check-input" type="radio" name="ques'+i+'" value="" style="display:none;" checked></div><br><br><hr>');
                    $('#quizForm').append('<input style="display:none;" type="text" name="answer'+i+'" value="'+data[i]['answer']+'">');

                   
                    

                }
                $('#quizForm').append('<input style="display:none;" type="text" name="subject_id" value="'+subject_id+'">');

                $('#quizForm').append('<input style="display:none;" type="text" name="user_id" value="'+user_id+'">');

                $('#quizForm').append('<input type="submit" name="quizSubmit" class="btn btn-outline-success" id="quizSubmit" value="Submit">');

               


            }

        });
    }

$('#tryagain').click(function(){
    location.reload();
});


$('#close').click(function(){
    location.href = "index.php";
});
    $('#quizForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:'../Helper/Helper.php',
            type:'POST',
            data:$('#quizForm').serialize(),
            success:function(response){
            var data= JSON.parse(response);
            console.log(data);
            $('.modal-body').append('<p>Scored : <b style="color:red;">'+data['result']+'</b> out of 10.</p><p>Unattempted : <b style="color:red;">'+data['unattemped']+'</b> out of 10.</p><p>Wrong : <b style="color:red;">'+data['wrong']+'</b> out of 10.</p>');
            $('#myModal').modal('show');
        }

        });



    });






</script>