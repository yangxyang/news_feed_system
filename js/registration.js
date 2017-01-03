$(document).ready(function(){
    $("#register").click(function(){
       
        $("#regform").submit();
       
        /*
        $.post( 
            "register.php", 
            {   action: "register", 
                username: $("#username").val(),   
                firstname: $("#firstname").val(),
                lastname: $("#lastname").val(),
                email: $("#email").val(),
                password: $("#password").val()    
            },
            function(data) {
                alert("success");
            }
        );
        */

    
    });
});