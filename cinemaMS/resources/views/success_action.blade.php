<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link href="bootstrap/css/ui.js" rel="stylesheet">
    <link rel="stylesheet" href="css/success_action.css">
</head>

<body style="direction: rtl;">
    <div class="bd_mn">
        <div class="add_a_film_panel">
            <div class="alert alert-success">
                <h5>سفارش شما با موفقیت ثبت شد.</h5>
                <h5>شما می توانید بلیت بگیرید.</h5>
            </div>
            <div class="__2">
                <form action="../successaction" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success">ادامه</button><br><br>
                </form>
            </div>
        </div>
    </div>


    <body>

</html>
