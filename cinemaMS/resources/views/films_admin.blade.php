<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link href="bootstrap/css/ui.js" rel="stylesheet">
    <link rel="stylesheet" href="css/films_admin.css">
    <link rel="stylesheet" href="css/place_selection.css">
    <link rel="stylesheet" href="css/panel_left.css">
    <script src="js/message_cleaner.js"></script>
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
                    جدول فیلم ها
                </div>
                <div class="ch_4">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>
                                </th>
                                {{-- <th>

                                </th> --}}
                                <th>
                                    نام فیلم
                                </th>
                                <th>
                                    مدت فیلم
                                </th>
                                <th>
                                    کارگردان
                                </th>
                                <th>
                                    نام تهیه کننده
                                </th>
                                <th>
                                    لینک اطلاعات بیشتر
                                </th>
                                <th>
                                    کشور سازنده
                                </th>
                                <th>
                                    زبان فیلم
                                </th>
                                <th>
                                    قیمت بلیت
                                </th>
                                <th>
                                    کد فیلم
                                </th>
                                <th>
                                    لینک ifram-src فیلم
                                </th>
                                <th>
                                    نام تصویر فیلم
                                </th>
                            </tr>
                            @foreach ($data as $i)
                                <tr class="row_1">
                                    <td>
                                        <div class="btn btn-danger"
                                            onclick="window.location.href='./delete_an_item/{{ $i->id }}'">
                                            <img src="icons/trash.svg">
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <div class="btn btn-warning"
                                            onclick="window.location.href='./editafilm/{{ $i->id }}'">
                                            <img src="icons/pencil-square.svg">
                                        </div>
                                    </td> --}}
                                    <td>
                                        {{ $i->film_name }}
                                    </td>
                                    <td>
                                        {{ $i->running_time }}
                                    </td>
                                    <td>
                                        {{ $i->director_name }}
                                    </td>
                                    <td>
                                        {{ $i->ex_producer }}
                                    </td>
                                    <td>
                                        <a href="{{ $i->more_about }}" style="color: white">
                                            <div class="btn btn-primary">
                                                ...
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $i->country }}
                                    </td>
                                    <td>
                                        {{ $i->language }}
                                    </td>
                                    <td>
                                        {{ $i->price_of_film }}
                                    </td>
                                    <td>
                                        {{ $i->id }}
                                    </td>
                                    <td>
                                        <a href="{{ $i->film_iframe }}" style="color: white">
                                            <div class="btn btn-primary">
                                                ###
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $i->image_name }}
                                    </td>ّ
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/message_cleaner.js"></script>
</body>

</html>
