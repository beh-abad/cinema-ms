<html>
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link href="bootstrap/css/ui.js" rel="stylesheet">
    <link rel="stylesheet" href="css/films_admin.css">
</head>

<body class="bd_mn" style="direction: rtl;">
    <div class="div_mn">
        @include('panel_left');
        <div class="panel-right">
            <div class='parent'>
                <div class="ch_1">
                    <div class="ch_1_1">

                    </div>
                </div>             
                <div class="ch_3">
                    اطلاعات مدیر
                </div>
                <div class="ch_4">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>                              
                                <th>
                                    کد فیلم
                                </th>
                                <th>
                                    قیمت بلیت
                                </th>
                                <th>
                                    زبان فیلم
                                </th>
                                <th>
                                    کشور سازنده
                                </th>

                                <th>
                                    کارگردان
                                </th>
                                <th>
                                    مدت فیلم
                                </th>
                                <th>
                                    نام فیلم
                                </th>
                            </tr>
                            @foreach ($data as $i)
                                <tr class="row_1">                                 
                                    <td>
                                        {{ $i['id'] }}
                                    </td>
                                    <td>
                                        {{ $i['price_of_film'] }}
                                    </td>
                                    <td>
                                        {{ $i['language'] }}
                                    </td>
                                    <td>
                                        {{ $i['country'] }}
                                    </td>
                                    <td>
                                        {{ $i['director_name'] }}
                                    </td>
                                    <td>
                                        {{ $i['running_time'] }}
                                    </td>
                                    <td>
                                        {{ $i['film_name'] }}
                                    </td>ِ
                                    <td>
                                        <button class="btn btn-primary"
                                            onclick="window.location.href='{{ $i['more_about'] }}'">
                                            داستان فیلم
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger "
                                            onclick="window.location.href='./adminpanel/{{ $i['id'] }}'">
                                            حذف
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning"
                                            onclick="window.location.href='./editafilm/{{ $i['id'] }}'">
                                            ویرایش
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
