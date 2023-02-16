<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link href="bootstrap/css/ui.js" rel="stylesheet">
    <link rel="stylesheet" href="css/films_admin.css">
    <link rel="stylesheet" href="css/panel_left.css">
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
                    کاربران
                </div>
                <div class="ch_4">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    نام
                                </th>
                                <th>
                                    شماره شناسایی
                                </th>
                                <th>
                                    پسورد
                                </th>
                            </tr>
                            @foreach ($admins as $i)
                                <tr class="row_1">
                                    <td>
                                        <button class="btn btn-danger "
                                            onclick="window.location.href='./admin/{{ $i['id'] }}'">
                                            <img src="icons/person-dash.svg">
                                        </button>
                                    </td>
                                    <td>
                                        {{ $i['name'] }}
                                    </td>
                                    <td>
                                        {{ $i['id'] }}
                                    </td>
                                    <td>
                                        {{ $i['password'] }}
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
