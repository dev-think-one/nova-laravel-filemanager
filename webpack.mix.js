let mix = require('laravel-mix')

require('./nova.mix')

mix
    .setPublicPath('dist')
    .js('resources/js/field.js', 'js')
    .js('resources/js/tool.js', 'js')
    .vue({ version: 3 })
    .sass('resources/sass/field.scss', 'css')
    .sass('resources/sass/tool.scss', 'css')
    .nova('think.studio/nova-laravel-filemanager')
