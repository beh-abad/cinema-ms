<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>

<body class="bd_mn" style="direction: rtl;">
    <form action="addaplace" method="POST" class="form-control" enctype="multipart/form-data">
        @csrf
        <label for="address">آدرس دقیق:</label>
        <textarea style="text-align:left;" name="address" id="" cols="100" rows="6" placeholder="آدرس"
            class="ckeditor form-control"></textarea><br>
        <button style="width: 200px;" type="submit" class="btn btn-success">ثبت</button>
    </form>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
</body>

</html>
