<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/films_admin.css">
    <link rel="stylesheet" href="bootstrap/css/ui.css">
    <link rel="stylesheet" href="css/add_a_place.css">
    <link rel="stylesheet" href="css/panel_left.css">
    <script src="js/jquery.js"></script>
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
                    مکان جدید
                </div>
                <div class="ch_4">
                    <div class="ch_4_1">
                        <div class="add_a_place_panel">
                            <div id="fr_lf">
                                <form action="addaplace" method="POST" class="form-control"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="name">نام مکان:</label>
                                    <input type="text" placeholder="نام مکان" name="name"
                                        class="form-control"><br>
                                    <label for="province">استان محل مکان:</label>
                                    <select id="province_selection" name="province" class="form-select"
                                        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'>                                      
                                        @foreach ($provinces as $item)
                                            <option value={{ $item->id }}>{{ $item->province_name }}</option>
                                        @endforeach
                                    </select><br>
                                    <label for="city">شهر محل مکان:</label>
                                    <select id="city_selection" name="city" class="form-select"
                                        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'>
                                    </select><br>
                                    <label for="address">آدرس دقیق:</label>
                                    <textarea style="text-align=left;" name="address" id="" cols="30" rows="6" placeholder="آدرس"
                                        class="form-control"></textarea><br>
                            </div>
                            <div class='form-control' id="fr_rg">
                                <label for="map">iframe گوگل مپ (اختیاری):</label>
                                <a href="https://www.radcom.co/fa/kb/5413/" style="font-family: vazir;">اطلاعات
                                    بیشتر...</a><br>
                                <textarea style="text-align=left;" name="map" cols="30" rows="6"
                                    placeholder="<iframe src=https://www.google.com/map..></iframe>" class="form-control"></textarea><br>
                                <label for="capacity">حداکثر ظرفیت:</label>
                                <input type="text" placeholder="حداکثر ظرفیت" name="capacity"
                                    class="form-control"><br>
                                <label for="image_file">تصویر مکان :</label>
                                <input id="file" type="file" placeholder="(اختیاری) تصویر مکان" name="image_file"
                                    class="form-control"><br><br><br>
                                    <button style="width: 200px;" type="submit" class="btn btn-success">ثبت</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/fetch_place_records.js"></script>
    <script src="js/message_cleaner.js"></script>
    <script src="js/add_a_item_validation.js"></script>
</body>

</html>
