/*require('dotenv').config();*/

let mix = require('laravel-mix');

/*const VueLoaderPlugin = require('vue-loader/lib/plugin')*/

/*mix.options({
    extractVueStyles: 'public/assets/public/css/components.css'
});*/

/*mix.sass('resources/assets/sass/app.scss', 'public/assets/public/css').options({
    processCssUrls: false
});*/

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/jquery.fancybox.min.css',
    'resources/assets/css/owl.carousel.min.css',
    'resources/assets/css/owl.theme.default.min.css',
    'resources/assets/css/animate.min.css',
    'resources/assets/css/slicknav.min.css',
    'resources/assets/css/magnific-popup.css',
    'resources/assets/css/normalize.css',
    'resources/assets/css/style.css',
    'resources/assets/css/responsive.css',
    'resources/assets/css/custom.css',
], 'public/assets/public/css/all.css');

/*mix.js([
    'resources/assets/js/jquery/jquery.min.js',
    'resources/assets/js/jquery/jquery-migrate.min.js',
    'resources/assets/js/jquery/popper.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/jquery.stellar.min.js',
    'resources/assets/js/particles.min.js',
    'resources/assets/js/facnybox.min.js',
    'resources/assets/js/jquery.magnific-popup.min.js',
    'resources/assets/js/masonry.pkgd.min.js',
    'resources/assets/js/circle-progress.min.js',
    'resources/assets/js/owl.carousel.min.js',
    'resources/assets/js/waypoints.min.js',
    'resources/assets/js/slicknav.min.js',
    'resources/assets/js/jquery.counterup.min.js',
    'resources/assets/js/easing.min.js',
    'resources/assets/js/wow.min.js',
    'resources/assets/js/jquery.scrollUp.min.js',
    'resources/assets/js/main.js',
], 'public/assets/public/js/all.js');*/

/*mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/assets/sass')
        },

    }
});*/

mix.copy('resources/assets/fonts', 'public/assets/public/fonts');
/*mix.copy('resources/assets/js/', 'public/assets/public/js/');*/

mix.browserSync({
    proxy: 'uotcareers.test',
    files: [
        'public/assets/public/css/{*,**!/!*}.css',
        'resources/assets/css/{*,**!/!*}.css',
        'resources/assets/js/{*,**!/!*}.js',
        'resources/views/modules/**/*.php',
        'Modules/**/Resources/css/views/*.php',
    ]
});
