$(document).ready(function(){
    $("#register").click(function(){
        $.get( "index.php"
        );
       $.post( "register.php", 
                    {   action: "register", 
                        username: $("#username").val,   
                        firstname: $("#firstname").val,
                        lastname: $("#lastname").val,
                        email: $("#email").val,
                        password: $("#password").val    } 
        );

    
    });
});