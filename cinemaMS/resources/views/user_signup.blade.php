<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/user_signup.css">
    <script src="js/jquery.js"></script>
</head>

<body style="direction: rtl;">
    <div class="bd_mn">
        <div class="add_a_film_panel">
            <div>
                <h1 style="margin-bottom:80px ">
                    ثبت نام
                </h1>
            </div>
            <div class="panel_around">
                <div>
                    <form action="usersignup" method="POST">
                        @csrf
                        <input type="text" placeholder="نام کامل" name="name" class="form-control"><br>
                        <input type="email" placeholder="آدرس ایمیل" name="email" class="form-control"><br>
                        <input type="password" placeholder="رمز عبور" name="pwd" class="form-control"><br>
                        <input type="password" placeholder="تکرار رمز عبور" name="pwda" class="form-control"><br>
                        <button class="btn btn-danger" onclick="window.location.href='/'">لغو</button>
                        <button type="submit" class="btn btn-success">ثبت</button>ّ
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='js/add_a_item_validation.js'></script>

    <body>

</html>
