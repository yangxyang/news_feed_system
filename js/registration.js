function validateForm() {
    var valid = true;     

    $("#regform").find('input:text').each(function(){
        $(this).val($.trim($(this).val()));
    });

    $( "div" ).removeClass("has-error");

    if (!/^\w+$/.test($( "#username" ).val())) {
        valid = false;
        $( "#username_field" ).addClass("has-error");
    }
    if (!/^[A-Za-z]+$/.test($( "#firstname" ).val())) {
        valid = false;
        $( "#firstname_field" ).addClass("has-error");
    }
    if (!/^[A-Za-z]+$/.test($( "#lastname" ).val())) {
        valid = false;
        $( "#lastname_field" ).addClass("has-error");
    }
    if (!/^\w+[\.\w+]*@[a-z]+\.[a-z][a-z]+$/.test($( "#email" ).val().toLowerCase())) {
        valid = false;
        $( "#email_field" ).addClass("has-error");
    }
    if ($( "#password" ).val().length < 4) {
        valid = false;
        $( "#password_field" ).addClass("has-error");
    }
    if($( "#password" ).val() !== $( "#confirm" ).val()) {
        valid = false;
        $( "#confirm_field" ).addClass("has-error");
    }

    return valid;
}
        
$(document).ready(function(){
    $("#register_button").click(function() {
        if (validateForm()) {
            $("#regform").submit();
        }

    });
});