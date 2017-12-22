//Ajax call for the sign up form

//form is submitted?
$("#signupform").submit(function(event){
    event.preventDefault();
    //collect user input
    var dataToPost = $(this).serializeArray();
    console.log(dataToPost);
    
    //send them to signup.php using ajax
    $.ajax({
        url:"signup.php",
        type:"POST",
        data: dataToPost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error:function(){
            $("#signupmessage").html('<div class="alert alert-danger"> There was an error with the Ajax call. Please try again later.</div>');
        }
    });
});