<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link href="bootstrap/css/ui.js" rel="stylesheet">
    <link rel="stylesheet" href="css/places_admin.css">
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
                    جدول مکان ها
                </div>
                <div class="ch_4">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                    نام مکان
                                </th>
                                <th>
                                    استان مکان
                                </th>
                                <th>
                                    شهرستان مکان
                                </th>
                                <th>
                                    تصویر مکان
                                </th>
                                <th>
                                    ظرفیت باقی مانده
                                </th>
                                <th>
                                    آدرس گوگل مپ
                                </th>
                                <th>
                                    آدرس
                                </th>
                                <th>
                                    شناسه مکان
                                </th>
                            </tr>
                            @foreach ($places as $i)
                                <tr class="row_1">
                                    <td>
                                        <div class="btn btn-danger"
                                            onclick="window.location.href='./deleteaplace/{{ $i['id'] }}'" >
                                            <img src="icons/trash.svg">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn  btn-warning"
                                            onclick="window.location.href='./editaplace/{{ $i['id'] }}'">
                                            <img src="icons/pencil-square.svg">
                                        </div>
                                    </td>
                                    <td>
                                        {{ $i['place_name'] }}
                                    </td>
                                     <td>
                                        {{ $i->_province['province_name'] }}
                                    </td>
                                    <td>
                                        {{ $i->_city['city_name'] }}
                                    </td>
                                    <td>
                                        <img src="storage/place_images/{{ $i['place_image_name'] }}" alt="تصویر ندارد."
                                            width="100" height="100">
                                    </td>
                                    <td>
                                        {{ $i['capacity'] . ' نفر' }}
                                    </td>
                                    <td>
                                        <a href="{{ $i['google_map_iframe'] }}">
                                            <div class="btn btn-primary">
                                                ...
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <textarea style="outline:none;
                                        border-radius:5px;
                                        border:none;
                                        resize:none;
                                        color:white;
                                        background-color:rgba(240, 248, 255, 0)"
                                         readonly cols="20"
                                          rows="3">
                                            {{ $i['address'] }}
                                        </textarea>
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
