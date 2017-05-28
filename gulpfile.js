const elixir     = require('laravel-elixir');
const postStylus = require('poststylus');
const rupture    = require('rupture');

elixir.config.publicPath = 'public_html';
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix

        .stylus(['app.styl'], 'resources/assets/css', {
            use: [postStylus(['lost']), rupture()]
        })
        .stylus(['emotions.styl'], 'resources/assets/css/emotions.css', {
            use: [postStylus(['lost']), rupture()]
        })
        .webpack('vendor/bootstrap.js', 'resources/assets/js/dist/vendor.js')
        .styles([
            'vendor/sweetalert.css',
            'vendor/font-awesome.css',
            'app.css'
        ])
        .styles([
            'vendor/sweetalert.css',
            'vendor/font-awesome.css',
            'emotions.css'
        ], elixir.config.publicPath+'/css/all-emotions.css')
        .scripts([

            'dist/vendor.js',
            'vendor/sweetalert.min.js',
            'vendor/vue.js',
            'rootVm.js'

        ], elixir.config.publicPath+'/js/all.js')

        .scripts([

            'dist/vendor.js',
            'vendor/sweetalert.min.js',
            'vendor/vue.js',
            'rootVmEmotions.js'

        ], elixir.config.publicPath+'/js/all-emotions.js')

        .scripts([

            'dist/vendor.js',
            'vendor/sweetalert.min.js',
            'facesGenerator.js'

        ], elixir.config.publicPath+'/js/generator.js')

        .version([
            'css/all.css',
            'css/all-emotions.css',
            'js/all-emotions.js',
            'js/generator.js'
        ])
        .browserSync({

            proxy: 'perspectivas.dev'

        });

});