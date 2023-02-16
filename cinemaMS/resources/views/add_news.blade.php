<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/ui.css">
    <link rel="stylesheet" href="../css/add_news.css">
    <link rel="stylesheet" href="../css/panel_left.css">
    <script src="../js/jquery.js"></script>
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
                    خبر جدید
                </div>
                <div class="ch_4">
                    <div class="ch_4_1">
                        <div class="add_a_place_panel">
                            <div id="fr_lf">
                                <form action="addnews" method="POST" class="form-control"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="news_file">برای خبر یک عکس برگزیده انتخاب کنید:</label>
                                    <input type="file" name="file" class="form-control"><br>
                                    <label for="news">خبر را اینجا بنویسید:</label>
                                    <textarea class="ckeditor" style="text-align:right;" maxlength="500" name="news" cols="30" rows="6">
                                    </textarea><br>
                                    <button style="width: 200px;" type="submit" class="btn btn-success">ثبت</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script src="../js/add_a_item_validation.js"></script>
</body>
</html>
