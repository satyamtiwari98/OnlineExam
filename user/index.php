<?php

    include_once 'layout/header.php';

?>


<div class="main">


</div>


<?php

    include_once 'layout/footer.php';

?>

<script>
    $(document).ready(function(){

        getSubjects();

    });


    function getSubjects(){
        $.ajax({
            url:'../Helper/Helper.php',
            type:'POST',
            data:{
                'action':'GetSubjects',
            },
            success:function(response){

                let data = JSON.parse(response);
                
                for(var i = 0; i<data.length;i++){

                    $('.main').append('<div class="card" style="width: 18rem;"><img src="../assets/uploads/php.png" class="card-img-top" alt="This is a php image"><div class="card-body"><h5 class="card-title">'+data[i]['subject_name']+'</h5><p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p><a href="master.php?id='+data[i]['subject_id']+'" class="btn btn-outline-success">Lets start The Quiz</a></div></div>');

                }

               

            }
        });
    }
</script>