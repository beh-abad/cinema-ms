
$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        all_data = $("form").serialize();
        $.ajax(
            {
                url: $(this).attr("action"),
                method: $(this).attr("method"),
                data: all_data,
                success: function (response) {
                    if (response.result == -1) {
                        $.each(response.error, function (name, msg) {
                            alert(msg);
                        });
                    }
                    else {
                        $("form").unbind("submit").submit();                      
                    }
                }
            }
        );
    });
});