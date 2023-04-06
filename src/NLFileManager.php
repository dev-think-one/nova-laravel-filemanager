<?php
namespace ThinkOne\NovaLaravelFilemanager;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use ThinkOne\NovaLaravelFilemanager\Helpers\Url;
use ThinkOne\NovaLaravelFilemanager\Traits\Menuable;

class NLFileManager extends Tool
{
    use Menuable;

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-laravel-filemanager-tool', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-laravel-filemanager-tool', __DIR__.'/../dist/css/tool.css');

        Nova::provideToScript([
            'novaLaravelFileManager' => [
                'url'   => Url::addOrUpdateArgs($this->lfmUrl, 'type', '_TYPE_'),
                'types' => array_values(array_filter([
                    $this->displayImages?'Images':null,
                    $this->displayFiles?'Files':null,
                ])),
            ],
        ]);
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        if ($this->hideMenu) {
            return null;
        }

        return MenuSection::make($this->title ?: 'Files Manager')
            ->path('/nova-laravel-filemanager')
            ->icon($this->icon);
    }
}
