<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/take_bill.css">
</head>

<body class="main_body" style="direction: rtl;">
    <div>
        <h4>بلیت ورود به سینما</h4>
        <div class="l1">
        </div>
        <div>
            <div class="r1">
                <p>شماره شناسایی: </p>
                <p>نام مشتری: </p>
                <p>نام فیلم: </p>
                <p>نام مکان: </p>
                <p>آدرس: </p>
                <p>سالن: </p>
                <p>روز اکران: </p>
                <p>زمان اکران: </p>
                <p>تاریخ ثبت سفارش: </p>
                <P>روز ثبت سفارش: </P>
                <p>زمان ثبت سفارش: </p>
            </div>
            <div class="r3">
                <p>{{ $order[0]->who_ordered_id }}</p>    
                <p>{{ $order[0]->who_ordered_name }}</p>          
                <p>{{ $order[0]->order_name }}</p>
                <p>{{ $place[0]->place_name }}</p>
                <p>{{ $place[0]->_province->province_name }},
                    {{ $place[0]->_city->city_name }},
                    {{ $place[0]->address }}</p>
                <p>{{ $salon }}</p>
                <p>{{ $day }}</p>
                <p>{{ $time }}</p>
                <p>{{ $order[0]->date_registered }}</p>
                <p>{{ $order[0]->day_registered }}</p>
                <p>{{ $order[0]->time_registered }}</p>
            </div>
        </div>

    </div>
</body>

</html>
