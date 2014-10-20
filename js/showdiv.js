$(document).ready(function() {
    $('input[type="radio"]').click(function(){
        if($(this).attr("value") === "addschedule") {
            $("#addweeklyschedule").show();
            $("#editweeklyschedule").hide();
            $("#removeweeklyschedule").hide();
        }
        if($(this).attr("value") === "editschedule") {
            $("#editweeklyschedule").show();
            $("#addweeklyschedule").hide();
            $("#removeweeklyschedule").hide();
        }
        if($(this).attr("value") === "removeschedule") {
            $("#removeweeklyschedule").show();
            $("#addweeklyschedule").hide();
            $("#editweeklyschedule").hide();
        }
    });
});