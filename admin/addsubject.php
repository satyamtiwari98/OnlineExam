<?php

    include_once 'layout/header.php';

?>
<h3 style="color: green; text-align:center; padding:20px;">Add Subject For The Quiz</h3>

<div class="main">

    <form action="" method="POST">

    <div class="mb-3">
    <label for="subject" class="form-label">Add Subject</label>
    <input type="text" class="form-control" id="subject" name="subject"  placeholder="Enter Subject Name" required>
  </div>

  <input type="submit" class="btn btn-primary" id="addsubjectSubmit" name="addsubjectSubmit" value="Add Subject">

    </form>
</div>






<?php 

    include_once 'layout/footer.php';


?>



<script>

    $('#addsubjectSubmit').click(function(e) {
        
        e.preventDefault();

        var subject = $('#subject').val();

        if(subject == '') {

            alert("Please provide valid details !!!");

        }else {

        $.ajax({
            url:'../Helper/Helper.php',
            type:'POST',
            data:{
                'subject':subject,
                'action':'addsubject',
            },
            success:function(response){

                if(response == 1) {

                    alert("Subject Created Successfully !!!");
                    location.reload();

                }else {

                    alert("Something went wrong !!!!!");

                }

            }
        });

        }

    });
</script>