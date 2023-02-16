$(document).ready(function () {
    fetchCityRecords($('#province_selection').val());
    $('#province_selection').on('change', function () {
        fetchCityRecords($(this).val());
    });
    $('#city_selection').on('change', function () {
        fetchPlaceRecords($(this).val());
    });
});

function fetchCityRecords(here_id) {
    $.ajax({
        url: "../selectacity/" + here_id,
        type: "GET",
        dataType: 'JSON',
        success: function (response) {
            $('#city_selection').empty();
            var len = 0;          
            if (response['city_data'] != null) {
                len = response['city_data'].length;
            }
            if (len > 0) {                
                for (var i = 0; i < len; i++) {
                    var c_name = response['city_data'][i].city_name;
                    var c_id = response['city_data'][i].city_id;
                    var tr_str = "<option value=" + c_id + ">" + c_name + "</option>";
                    $('#city_selection').append(tr_str);
                }                   
            }    
        }
    });
}

function fetchPlaceRecords(here_id) {
    $.ajax({
        url: '../editaplace' + here_id,
        type: 'get',
        dataType: 'json',
        success: function (response) {
            $('#place_selection').empty();
            var len = 0;
            if (response['place_data'] != null) {
                len = response['place_data'].length;
            }
            if (len > 0) {         
                for (var i = 0; i < len; i++) {
                    var p_name = response['place_data'][i].place_name;
                    var p_id = response['place_data'][i].id;
                    var tr_str = "<option value=" + p_id + ">" + p_name + "</option>";
                    $('#place_selection').append(tr_str);
                }
            }
        }
    });
}