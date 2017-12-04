<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Zando test</title>
        <link rel="stylesheet" href="{!! url('css/app.css') !!}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    </head>
    <body>
        <div class="container">
            <form action="{!! route('importProducts') !!}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_products" id="import_products"><br>
                <input type="submit" value="SAVE PRODUCTS">
            </form>
        </div>
    </body>
    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
</html>
