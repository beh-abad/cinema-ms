
$(document).ready(function () {
        $(".btn.btn-primary").on("click", function (event) {
            var html_var=  " <tr class='row_1'> " +
            "<td>" +
             "<input type='checkbox' name='check[]' value='{{ $place->id }}" +
             "class='form-check' style='width:20px; height:20px;'>" +
            "</td> " +                                   
            "<td>" +
                "<div style='width: 40px;margin-bottom:20px;align-self:right;border-radius:45px' " +
                    "class='btn btn-primary'>+</div>" +
            "</td>" +
            "<td>" +
                "{{ $place->place_name }}" +
            "</td>" +
            "<td>" +
                "{{ $place->_province->province_name }}" +
            "</td>" +
            "<td>"+
                "{{ $place->_city->city_name }}"+
            "</td>"+
            "<td>"+
                "{{ $place->address }}"+
            "</td>"+
            "<td>"+
                "<input type='text' placeholder='نام سالن یا شماره سالن' name='salon[]'" +
                   " class='form-control'" +
                    "style='margin-bottom:20px; background-color:rgba(193, 235, 255);'><br>" +
            "</td>" +
            "<td id='time_picker'>" +                         
                "<div style='display:flex; flex-direction:row;'>"+
                   " <p style='margin: 5px;'>"+
                       " روز:"+
                    "</p>"+
                    "<select name='day' class='form-select'"+
                        "style='margin-bottom:20px;"+
                    "background-color:rgba(193, 235, 255);'>"+
                        "<option>"+
                            "-------------"+
                        "</option>"+
                        "<option value='شنبه'>شنبه</option>"+
                        "<option value='یکشنبه'>یکشنبه</option>"+
                        "<option value='دوشنبه'>دوشنبه</option>"+
                        "<option value='سه شنبه'>سه شنبه</option>"+
                        "<option value='چهارشنبه'>چهارشنبه</option>"+
                        "<option value='پنجشنبه'>پنجشنبه</option>"+
                        "<option value='جمعه'>جمعه</option>"+
                    "</select>"+
                    "<p style='margin: 5px;'>"+
                       " ساعت:"+
                   " </p>"+
                    "<input type='text' placeholder='زمان اکران' name='time[{{ $place->id }}]'"+
                        "class='form-control'"+
                        "style='margin-bottom:20px;" +
                        "background-color:rgba(193, 235, 255);'><br>"+
                "</div>"+
            "</td>"+
       " </tr> ";

            var temp= $(this).closest('tr');
            var temp2= temp.html();
            $(this).closest('tr').after(html_var);
        });
});

