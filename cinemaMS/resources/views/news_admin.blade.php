<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/news_admin.css">
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
                    جدول اخبار
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
                                    متن خبر
                                </th>
                                <th>
                                    تصویر
                                </th>
                                <th>
                                    تاریخ ثبت
                                </th>
                                <th>
                                    روز ثبت
                                </th>
                                <th>
                                    زمان ثبت
                                </th>
                                <th>
                                    تاریخ ویرایش
                                </th>
                                <th>
                                    روز ویرایش
                                </th>
                                <th>
                                    زمان ویرایش
                                </th>
                            </tr>
                            @foreach ($news as $i)
                                <tr class="row_1">
                                    <td>
                                        <div class="btn btn-danger" 
                                            onclick="window.location.href='./deletenews/{{ $i['news_id'] }}'">                                      
                                            <img src="icons/trash.svg">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn  btn-warning" 
                                            onclick="window.location.href='./editnews/{{ $i['news_id'] }}'">
                                            <img src="icons/pencil-square.svg">                                                   
                                        </div>
                                    </td>                                                  
                                    <td>
                                        <textarea style="outline:none;
                                        border-radius:5px;
                                        background:transparent;
                                        color:white;
                                        border:none;
                                                    " readonly cols="40" rows="3">
                                            {{ $i['news'] }}
                                        </textarea>
                                    </td>
                                    <td>
                                        <img src="storage/news_images/{{ $i['news_images'] }}" alt="تصویر ندارد."
                                            width="100" height="100">
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
                                        {{ $i['date_edited'] }}
                                    </td>
                                    <td>
                                        {{ $i['day_edited'] }}
                                    </td>
                                    <td>
                                        {{ $i['time_edited'] }}
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
