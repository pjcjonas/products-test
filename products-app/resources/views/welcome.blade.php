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
        <style>
            .image_url{
                padding-bottom: 200px;
                width: 100%;
                display: block;
                background-position: 50% 50%;
                background-size: cover;
            }

            .card {
                margin-bottom: 40px;
                border: 2px solid black;
                padding:5px;
                text-align: center;
            }

            .addmargin {
                margin-bottom: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="{!! route('importProducts') !!}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_products" id="import_products"><br>
                <input type="submit" value="SAVE PRODUCTS">
            </form>
            <div class="clrearfix addmargin"></div>
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card">
                        <div class="image_url" style="background-image: url({!! $product['image_url'] !!})"></div>
                        <div class="card-body">
                            <h2 class="card-title">{{ $product['name'] }}</h2>
                            <h4 class="card-title">Price: {{ $product['price'] }}</h4>
                            <p class="card-text">
                                <span class="badge">Status: {{ $product['status'] }}</span>
                                <span class="badge">Approved: {{ $product['quality_approved'] }}</span>
                                <span class="badge">Status: {{ $product['status'] }}</span>
                                <span class="badge">SKU: {{ $product['sku'] }}</span>
                                <span class="badge">Brand: {{ $product['brand'] }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
</html>
