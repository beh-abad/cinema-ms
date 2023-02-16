<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
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
                    سفارشات
                </div>
                <div class="ch_4">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    نام مشتری
                                </th>
                                <th>
                                    کد مشتری
                                </th>
                                <th>
                                    نام فیلم
                                </th>
                                <th>
                                    کد فیلم
                                </th>
                                <th>
                                    تاریخ خرید 
                                </th>
                                <th>
                                    روز خرید
                                </th>
                                <th>
                                    زمان خرید
                                </th>
                                <th>
                                    کد سفارش
                                </th>
                            </tr>
                            @foreach ($orders as $i)
                                <tr class="row_1">
                                    <td>
                                        <button class="btn btn-danger "
                                            onclick="window.location.href='./deleteanorder/{{ $i->id }}'">
                                            <img src="icons/trash.svg">
                                        </button>
                                    </td>
                                    <td>
                                        {{ $i['who_ordered_name'] }}
                                    </td>
                                    <td>
                                        {{ $i['who_ordered_id'] }}
                                    </td>

                                    <td>
                                        {{ $i['order_name'] }}
                                    </td>
                                    <td>
                                        {{ $i['film_id'] }}
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
                                        {{ $i['id'] }}
                                    </td>ّ
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
