<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/ui.css">
    <link rel="stylesheet" href="../css/fam_images.css">
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
                    فیلم جدید
                </div>
                <div class="ch_4">
                    <div id="message_div">
                        @if ($errors->any())
                            <div style="margin-top:10px;" class="alert alert-danger">
                                <ul>
                                    @error('file1')
                                        {{ $message }}<br>
                                    @enderror
                                    @error('file2')
                                        {{ $message }}<br>
                                    @enderror
                                    @error('file3')
                                        {{ $message }}<br>
                                    @enderror
                                    @error('file4')
                                        {{ $message }}<br>
                                    @enderror
                                    @error('file5')
                                        {{ $message }}<br>
                                    @enderror
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div id="message_div">
                        @if (Session::has('mess'))
                            <div style="margin-top:10px;" class="alert alert-success" style="text-align: right; font-size:18px;">
                                {{ session('mess') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        
                        <div class="add_a_film_panel">
                            <div id="fr_lf">
                                <form action="famimages" method="POST" enctype='multipart/form-data'
                                    class="form-control" accept=".jpg, .jpeg, .png">
                                    @csrf
                                    <label for="name">تصویر اول:</label><br>
                                    <input type="file" placeholder=":تصویر اول" name="file1" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="name">تصویر دوم:</label><br>
                                    <input type="file" placeholder="تصویر دوم" name="file2" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="name">تصویر سوم:</label><br>
                                    <input type="file" placeholder="تصویر سوم" name="file3" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="name">تصویر چهارم:</label><br>
                                    <input type="file" placeholder="تصویر چهارم" name="file4" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="name">تصویر پنجم:</label><br>
                                    <input type="file" placeholder="تصویر پنجم" name="file5" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="js/message_cleaner.js"></script>
</body>

</html>
