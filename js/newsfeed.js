$(document).ready(function(){
    $("#language").change(function(){
        $.ajax({
            url: "?action=celebrities&language=" + $(this).val(), 
            datatype : "json",
            contentType: "application/json; charset=utf-8",
            success: function(result) {
                $("#celebrity").html(result);
                $("#celebrity").val("");
        }});
    });


    $("#celebrity").change(function(){
        $.ajax({
            url: "?action=tweets&language=" + $("#language").val() + "&celebrity=" + $(this).val(), 
            datatype : "json",
            contentType: "application/json; charset=utf-8",
            datatype : "application/json",
            success: function(result){
                $("#tweets").html(result);
        }});
    });
});