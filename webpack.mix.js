const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

// 「API for JavaScript Frameworks」に書かれているとおり、Laravel
// 　mixのバージョン6から仕様が変わったことが原因のようです。
//
// そのため、vueを使いたいならwebpack.mix.jsに下記のように記述しましょう。

    //webpack.mix.js
    //vueのバージョンが2の場合は下記のように明示的にする
    mix.js('resources/js/app.js', 'public/js').vue({ version: 2 }) //⇦これ
        .postCss('resources/css/app.css', 'public/css', [
        ]);