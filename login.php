<?php
    include_once 'layout/header.php';
?>


<div class="login">

<h3 style="text-align: center; color:green; padding:10px;">Online Exam LogIn Form</h3>

<form method="POST" action="">

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Your Email Address" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <input type="submit" class="btn btn-primary" id="loginSubmit" name="loginSubmit" value="LogIn">

</form>



</div>



<?php

    include_once 'layout/footer.php';
    
?>

<script>

    $('#loginSubmit').on('click',function(e) {

        e.preventDefault();

        let email_id = $('#email').val();
        let password = $('#password').val();

        if(email_id == '' || password == ''){

            alert("Please provide valid details !!!!");

        }else {

        $.ajax({
            url:'Helper/Helper.php',
            type:'POST',
            data:{
                'email_id':email_id,
                'password':password,
                'action':'login',
            },
            success:function(response){

                if(response == 2) {

                    alert("You have successfully Logged In !!!!");
                    location.href = 'admin/index.php';

                }else if(response == 1) {

                    alert("You have successfully Logged In !!!!");
                    location.href = 'user/index.php';

                }else {

                    alert("Login Details Does not match with any user !!! try Again!!");
                    location.reload();

                }
            }

        });

        }

    });


</script>