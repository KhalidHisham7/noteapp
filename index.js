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



//login form

$("#loginform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
//    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(datatopost){
                window.location.href = "mainpageloggedin.php";
            }else{
                $('#loginmessage').html(data);
            }
        },
        error: function(){
            $("#loginmessage").html('<div class="alert alert-danger">There was an error with the Ajax Call. Please try again later.</div>');
        }

    });

});
