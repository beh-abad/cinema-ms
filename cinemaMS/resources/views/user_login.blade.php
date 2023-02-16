<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user_login.css">
    <script src="js/jquery.js"></script>
</head>

<body style="direction: rtl;">
    <div class="bd_mn">
        <div class="add_a_film_panel">
            <div>
                <h1 style="margin-bottom:80px ">
                    ورود
                </h1>
            </div>
            <div class="panel_around">
                <div>
                    <form id="form" action="userlogin" method="POST">
                        @csrf
                        <input type="email" placeholder="آدرس ایمیل" name="email" class="form-control"><br>
                        <input type="password" placeholder="رمز عبور" name="pwd" class="form-control"><br>
                        <button type="reset" class="btn btn-danger" onclick="window.location.href='/'">لغو</button>
                        <button type="submit" class="btn btn-success">ورود</button><br><br>
                        <a href="../usersignup" style="font-size:18px;">هنوز ثبت نام نکرده ام</a><br>
                        <a href="../forgettingpassword" style="font-size:18px;">فراموشی رمز عبور</a><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src='js/add_a_item_validation.js'></script>

    <body>

</html>
