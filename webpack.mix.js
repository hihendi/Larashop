const mix = require('laravel-mix');

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
mix.copy('node_modules/font-awesome/css/font-awesome.css', 'resources/assets/css')
mix.copy('node_modules/select2/dist/css/select2.min.css', 'resources/assets/css')
mix.copy('node_modules/sweetalert/dist/sweetalert.min.js', 'resources/assets/js')
mix.copy('node_modules/select2/dist/js/select2.min.js', 'resources/assets/js')
mix.copy('node_modules/font-awesome/fonts', 'public/fonts')
mix.copy('node_modules/font-awesome/fonts', 'public/build/fonts')
mix.styles(['resources/assets/css/*'], 'public/css/custom.css')
mix.scripts(['resources/assets/js/*'], 'public/js/custom.js')

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
mix.scripts(['public/js/*'], 'public/js/app.js')
mix.styles(['public/css/*'], 'public/css/app.css');