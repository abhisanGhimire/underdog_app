<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clash Royale</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


            div.item {
                vertical-align: top;
                display: inline-block;
                text-align: center;
                width: 120px;
            }

            img {
                width: 100px;
                height: 100px;
            }

            .caption {
                display: block;
            }
        </style>
    </head>

    <body>
        <center>
            <h1>ALL CARDS</h1>
        </center>
        @for($i=0;$i<count($test->items);$i++)
            <div class="item">
                <img src={{ $test->items[$i]->iconUrls->medium }} alt="img missing">
                <label class="caption">{{ $test->items[$i]->name }}</label>
                <label class="caption">{{ $test->items[$i]->maxLevel }}</label>
            </div> @endfor
    </body>

</html>
