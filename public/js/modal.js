$(document).ready(function(){
    
    $("#LogBtn").click(function(){
        $("#LogModal").modal();
    });

    $("#RegBtn").click(function(){
        $("#RegModal").modal();
    });

    $("#ForgotBtn").click(function(){
        $("#LogModal").fadeOut(200);
        // $("#LogModal").hide();
        $("#ForgotModal").modal();
    });
});