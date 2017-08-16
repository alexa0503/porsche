let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/assets/js/app.js', 'public/js')
//   .sass('resources/assets/sass/app.scss', 'public/css');
mix.scripts(['resources/assets/js/wx.js'], 'public/js/wx.js');
mix.copy('bower_components/hammerjs/hammer.min.js','public/js');
mix.copy('bower_components/velocity/velocity.min.js','public/js');
mix.copy('bower_components/velocity/velocity.ui.min.js','public/js');
