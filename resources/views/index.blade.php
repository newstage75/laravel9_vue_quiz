<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>

        <div id="app">
            <sample-component></sample-component>
            <hr>
              <p>中間のパラグラフ</p>
            <hr>
            <dynamic-component></dynamic-component>
            <hr>
            <my-component></my-component>
            <hr>
            <my-vue-kyoshitu></my-vue-kyoshitu>
            <hr>
            <my-showtime></my-showtime>

        </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>