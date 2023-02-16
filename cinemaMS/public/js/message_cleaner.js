$(document).ready(function () {
    $("#message_div").queue(function () {
        $("*").click(function () {
            $("#message_div").remove();
        });
    });
})
