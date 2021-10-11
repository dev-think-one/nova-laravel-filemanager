# Laravel nova file selector form laravel filemanager
Simple package adds the ability to select an image from [UniSharp/laravel-filemanager](https://github.com/UniSharp/laravel-filemanager)

## Usage

```injectablephp
NLFMImage::make( 'Image', 'image' );
NLFMImage::make( 'Image', 'image' )
    ->filemanagerPath('/custom-link/files');
```

You can specify filemanagerPath in the main laravel-filemanager config file by adding the **filemanager_path** key
```
'filemanager_path' => '/custom-link/files'
```

## Installation

You can install the package via composer:

```bash
composer require unisharp/laravel-filemanager
# please check guide https://unisharp.github.io/laravel-filemanager/installation

composer require yaroslawww/nova-laravel-filemanager
```

## Routes

```injectablephp
Route::group([
    'prefix'     => config('lfm.filemanager_path'),
    'middleware' => [ 'web', 'auth' ],
], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
```

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/)
