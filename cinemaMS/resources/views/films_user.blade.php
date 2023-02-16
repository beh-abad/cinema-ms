<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/films_user.css">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
</head>

<body class="mn" style="direction: rtl;">
    <div class='parent'>
        <div class="ch_1">
            <div class="ch_1_1">
                @include('head_page_names')
            </div>
        </div>
        <div class="ch_3">
            <h2 style="align-self:flex-start;padding-right:40px;padding-top:20px;">
                تصاویر فیلم های برگزیده: </h2>
            <span class="slider">
                <span class="image">
                    <img src='storage/best_images/{{ $b_i[2] }}' width="auto" height="auto">
                </span>
                <span class="image">
                    <img src='storage/best_images/{{ $b_i[3] }}'>
                </span>
                <span class="image">
                    <img src='storage/best_images/{{ $b_i[4] }}'>
                </span>
                <span class="image">
                    <img src='storage/best_images/{{ $b_i[5] }}'>
                </span>
                <span class="image">
                    <img src='storage/best_images/{{ $b_i[6] }}'>
                </span>
            </span>
            <div style="height:4px;border-width:0;;background-color:gray">
            </div>
            <div>
                <div class="alert alert-primary" style="margin-top: 15px;
                width:1000px">
                    در این قسمت یک فیلم را انتخاب نمایی و برای جزئیات بیشتر روی آن کلیک نمایید.
                </div>
            </div>
        </div>
        <div class="ch_4">
            <?php
            $index = $data_index - 1;
            ?>
            @while ($rows >= 0)
                <?php
                if ($rows != 0) {
                    $counter = 4;
                } else {
                    $counter = $box_numbers;
                }
                ?>
                <ul class="films_row" type="none">
                    @while ($counter > 0)
                        <li class="crd" onclick="window.location.href='buybill/{{ $data[$index]['id'] }}'">
                            <div class="d1">
                                <img src="storage/film_images/{{ $data[$index]['image_name'] }}" width="250px"
                                    height="200px">
                            </div>
                            <div class="d2">
                                <p>
                                    {{ $data[$index]['film_name'] }}
                                </p>
                            </div>
                            <div class="d3">
                                <p>
                                    <a href="buybill/{{ $data[$index] }}">
                                        ...اطلاعات بیشتر
                                    </a>
                                </p>
                            </div>
                        </li>
                        <?php $counter = $counter - 1;
                        $index = $index - 1;?>
                    @endwhile
                </ul>
                <?php $rows = $rows - 1; ?>
            @endwhile
        </div>
        <div class="ch_5">
            @include('footer')
        </div>
    </div>
    <script src="js/comment.js"></script>
</body>

</html>
