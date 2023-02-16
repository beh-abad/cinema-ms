<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link href="bootstrap/css/ui.js" rel="stylesheet">
    <link rel="stylesheet" href="css/users_admin.css">
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
                    جدول کاربران
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
                                    آدرس ایمیل
                                </th>
                                <th>
                                    تاریخ ثبت نام
                                </th>
                                <th>
                                    روز ثبت نام
                                </th>
                                <th>
                                    زمان ثبت نام
                                </th>
                                <th>
                                    تاریخ آخرین ورود
                                </th>
                                <th>
                                    روز آخرین ورود
                                </th>
                                <th>
                                    زمان آخرین ورود
                                </th>
                                <th>
                                    شماره شناسایی
                                </th>
                            </tr>
                            @foreach ($users as $i)
                                <tr class="row_1">
                                    <td>
                                        <button class="btn btn-danger "
                                            onclick="window.location.href='../deleteauser/{{ $i['id'] }}'">
                                            <img src="icons/person-dash.svg" alt="بیرون کردن حذف اطلاعات کاربر">
                                        </button>
                                    </td>
                                    <td>
                                        {{ $i['name'] }}
                                    </td>
                                    <td>
                                        {{ $i['email'] }}
                                    </td>
                                    <td>
                                        {{ $i['date_registered'] }}
                                    </td>
                                    <td>
                                        {{ $i['day_registered'] }}
                                    </td>
                                    <td>
                                        {{ $i['time_registered'] }}
                                    </td>
                                    <td>
                                        {{ $i['date_login'] }}
                                    </td>
                                    <td>
                                        {{ $i['day_login'] }}
                                    </td>
                                    <td>
                                        {{ $i['time_login'] }}
                                    </td>
                                    <td>
                                        {{ $i['id'] }}
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
