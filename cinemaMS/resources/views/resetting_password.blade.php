<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/resetting_password.css">
    <script src="js/jquery.js"></script>
</head>

<body style="direction: rtl;">
    <div class="bd_mn">
        <div class="add_a_film_panel">
            <div>
                <h5 style="margin-bottom:80px ">
                    لطفا کد ارسالی را وارد کنید.
                </h5>
            </div>

            <div class="panel_around">
                <div>
                    <form action="resettingpassword" method="POST">
                        @csrf
                        <input type="password" placeholder="کد ارسال شده به آدرس ایمیل" name='cd'
                            class="form-control" style="width:300px;background-color:rgba(146, 207, 235, 0.37);"><br>
                        <input type="password" placeholder="رمز عبور جدید" name="npwd" class="form-control"
                            style="width:300px;background-color:rgba(146, 207, 235, 0.37);"><br>
                        <input type="password" placeholder="تکرار رمز عبور جدید" name="pwda" class="form-control"
                            style="width:300px;background-color:rgba(146, 207, 235, 0.37);"><br>    
                        <button type="submit" class="btn btn-success">بروزرسانی</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <script src='js/add_a_item_validation.js'></script>
    <body>
</html>
