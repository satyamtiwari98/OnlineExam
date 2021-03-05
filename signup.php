<?php
    include_once 'layout/header.php';
?>


<div class="signup">

<h3 style="text-align: center; color:green; padding:10px;">Online Exam SignUp Form</h3>

<form method="POST" action="">

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Your Email Address" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="mobile" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" id="mobile" name="mobile" aria-describedby="mobileHelp" placeholder="Enter Your Mobile Number" required>
    <div id="mobileHelp" class="form-text">We'll never share your mobile number with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <input type="submit" class="btn btn-primary" id="signupSubmit" name="signupSubmit" value="SignUp">

</form>



</div>



<?php
    include_once 'layout/footer.php';
?>

<script>

$('#signupSubmit').on('click',function(e){
    e.preventDefault();


var name = $('#name').val();
var email_id = $('#email').val();
var mobile_number = $('#mobile').val();
var password = $('#password').val();

if(name == '' || email_id == '' || mobile_number == '' || password == ''){

  alert("Please provide valid Details !!!");

}else {

$.ajax({
    url:'Helper/Helper.php',
    type:'POST',
    data:{
        'name':name,
        'email_id':email_id,
        'mobile':mobile_number,
        'password':password,
        'action':'signup',
    },
    success:function(response){
        console.log(response);
        if(response == 1){
            alert("You have been Registered Successfully !!!!");
            location.href = 'login.php';

        }else{
            alert("Sorry You Cannot Register Here !!!!");
            location.reload();
        }

    }
});

}


});

</script>