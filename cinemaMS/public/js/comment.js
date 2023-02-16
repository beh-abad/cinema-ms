$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        var all_data = $('form').serialize();
        var temp = $("#comment_box").html();
        $.ajax(
            {
                url: '../comment',
                method: 'POST',
                dataType: 'JSON',
                data: all_data,
                success: function (response) {              
                    $("form").after(`
                    <div id="comment_box" style="margin-top:60px; ">
                            <p>
                              ${response['data'][0].user_name}
                            </p>
                            <textarea readonly cols="85" rows="5">
                              ${response['data'][0].body}
                            </textarea><br><br>
                    </div>`)
                }
            }
        )
    })
})