<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/films_admin.css">
    <link rel="stylesheet" href="../bootstrap/css/ui.css">
    <link rel="stylesheet" href="../css/add_a_film.css">
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
                    فیلم جدید
                </div>
                <div class="ch_4">
                    <div>
                        <div class="add_a_film_panel">
                            <div id="fr_lf">
                                <form id="submit_form" action="addafilm" method="POST" class="form-control"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="name">نام فیلم:</label><br>
                                    <input type="text" placeholder="نام فیلم" name="name"
                                        class="form-control"><br>
                                    <label for="duration">مدت زمان:</label><br>
                                    <input type="text" placeholder="مثلا: 1:35" name="duration"
                                        class="form-control"><br>
                                    <label for="dir_name">نام کارگردان:</label><br>
                                    <input type="text" placeholder="نام کارگردان" name="dir_name"
                                        class="form-control"><br>
                                    <label for="ex_producer">نام تهیه کننده:</label><br>
                                    <input type="text" placeholder="نام تهیه کننده" name="ex_producer"
                                        class='form-control'><br>
                                    <label for='about'>لینک اطلاعات بیشتر در مورد فیلم:</label><br>
                                    <textarea style="text-align=left;" name="about" cols="30" rows="6" placeholder="..." class="form-control"></textarea>
                            </div>
                            <div class='form-control' id="fr_rg">
                                <label for="cny">کشور سازنده:</label><br>
                                <input type="text" placeholder="کشور سازنده" name="cny" class="form-control"><br>
                                <label for="language">زبان فیلم:</label><br>
                                <input type="text" placeholder="زبان فیلم" name="language" class="form-control"><br>
                                <label for="price">قیمت (ریال):</label><br>
                                <input type="text" placeholder="مثلا: 200000" name="price"
                                    class="form-control"><br>
                                <label for="ifr">لینک iframe-src فیلم :</label>
                                <a href="https://jobteam.ir/ProductUser/540-YouTube-HTML"
                                    style="font-family: vazir;">اطلاعات بیشتر...</a><br>
                                <textarea maxlength="150" name="ifr" id="" cols="20" rows="5"
                                    placeholder="www.youtube.com/embed/... :مثلا" class="form-control"></textarea><br>
                                <label for="file1">تصویر فیلم:</label><br>
                                <input type="file" name="file1" class="form-control"><br>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="alert alert-primary" style="margin-top: 15px;">
                            در این قسمت مکان مورد نظر برای فیلم را انتخاب کنید.
                        </div>
                    </div>
                    <div>
                        {{-- <div
                            style="margin: 10px;
                        border:1px solid rgb(68, 68, 68);
                        width:98%;
                        padding:10px;">
                            @include('select_province_and_cities')
                        </div>--}}

                        <div
                            style="margin: 10px;
                    border:1px solid rgb(68, 68, 68);
                    width:98%;
                    padding:15px;
                    border-radius:20px;
                    border-color:rgba(13, 10, 230, 0.671);
                    font-size:20px;">
                            جدول مکان برای فیلم:
                        </div> 
                        <div class='bootstrap-table-1'>
                            <table class='table table-dark table-striped table-hover'>
                                <tr>
                                    <th>
                                        انتخاب
                                    </th>
                                    <th>
                                        نام مکان
                                    </th>
                                    <th>
                                        استان مکان
                                    </th>
                                    <th>
                                        شهر مکان
                                    </th>
                                    <th>
                                        آدرس
                                    </th>
                                    <th>
                                        زمان یا مکان
                                    </th>
                                </tr>
                                @foreach ($places as $place)
                                    <tr class='row_1'>
                                        <td>
                                            <input type='checkbox' name='check[{{ $place->id }}]'
                                                class='form-check' style='width:20px; height:20px;'>
                                        </td>
                                        <td>
                                            {{ $place->place_name }}
                                        </td>
                                        <td>
                                            {{ $place->_province->province_name }}
                                        </td>
                                        <td>
                                            {{ $place->_city->city_name }}
                                            <input name="place_id[{{ $place->id }}]" value="{{ $place->id }}"
                                                style="background:transparent; width:auto; border:none; color:white;"
                                                hidden>
                                        </td>
                                        <td>
                                            {{ $place->address }}
                                        </td>
                                        <td id='time_picker'>
                                            <div style='display:flex; flex-direction:row;'>
                                                <div style='display:flex; flex-direction:row;'>
                                                    <p style='margin: 5px;'>
                                                        نام یا شماره سالن (اختیاری)
                                                    </p>
                                                    <input type='text' placeholder='نام یا شماره سالن'
                                                        name='salon[{{ $place->id }}]' class='form-control'
                                                        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'><br>
                                                </div>
                                                <div style='display:flex; flex-direction:row;'>
                                                    <p style='margin: 5px;'>
                                                        روز:
                                                    </p>
                                                    <select name='day[{{ $place->id }}]' class='form-select'
                                                        style='margin-bottom:20px;
                                                background-color:rgba(193, 235, 255);
                                                width:auto;height:40px;'>
                                                        <option>
                                                            -------------
                                                        </option>
                                                        <option value='شنبه'>شنبه</option>
                                                        <option value='یکشنبه'>یکشنبه</option>
                                                        <option value='دوشنبه'>دوشنبه</option>
                                                        <option value='سه شنبه'>سه شنبه</option>
                                                        <option value='چهارشنبه'>چهارشنبه</option>
                                                        <option value='پنجشنبه'>پنجشنبه</option>
                                                        <option value='جمعه'>جمعه</option>
                                                    </select>
                                                </div>
                                                <div style='display:flex; flex-direction:row;'>
                                                    <p style='margin: 5px;'>
                                                        ساعت:
                                                    </p>
                                                    <input multiple="" type='text' placeholder='زمان اکران'
                                                        name='time[{{ $place->id }}]' class='form-control'
                                                        style='margin-bottom:20px; 
                                                    background-color:rgba(193, 235, 255);
                                                    width:130px;height:40px;'><br>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <button style='width: 200px;' type='submit' class='btn btn-success'>ثبت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='../js/fetch_place_records.js'></script>
    <script src='../js/message_cleaner.js'></script>
    <script src='../js/add_a_item_validation.js' ></script>
</body>

</html>
