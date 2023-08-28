<?php

namespace ThinkOne\NovaLaravelFilemanager\Tests;

use Illuminate\Http\Request;
use Laravel\Nova\Nova;

class NLFileManagerToolConfigurationTest extends TestCase
{
    /** @test */
    public function menu()
    {
        $tool = \ThinkOne\NovaLaravelFilemanager\NLFileManager::make()
            ->title('Browse files')
            ->icon('document-search');

        /** @var \Laravel\Nova\Menu\MenuSection $menuSection */
        $menuSection = $tool->menu(app(Request::class));
        $this->assertInstanceOf(\Laravel\Nova\Menu\MenuSection::class, $menuSection);
        $this->assertEquals('Browse files', $menuSection->name);
        $this->assertEquals('document-search', $menuSection->icon);

        $tool->hideMenu();
        $this->assertNull($tool->menu(app(Request::class)));
    }

    /** @test */
    public function only_images_and_files()
    {
        $tool = \ThinkOne\NovaLaravelFilemanager\NLFileManager::make();

        $this->assertFalse(isset(Nova::$jsonVariables['novaLaravelFileManager']));
        $tool->boot();

        $this->assertCount(2,  Nova::$jsonVariables['novaLaravelFileManager']['types']);
        $this->assertEquals('Images',  Nova::$jsonVariables['novaLaravelFileManager']['types'][0]);
        $this->assertEquals('Files',  Nova::$jsonVariables['novaLaravelFileManager']['types'][1]);

        $tool = \ThinkOne\NovaLaravelFilemanager\NLFileManager::make()->onlyImages();
        $tool->boot();
        $this->assertCount(1,  Nova::$jsonVariables['novaLaravelFileManager']['types']);
        $this->assertEquals('Images',  Nova::$jsonVariables['novaLaravelFileManager']['types'][0]);

        $tool = \ThinkOne\NovaLaravelFilemanager\NLFileManager::make()->onlyFiles();
        $tool->boot();
        $this->assertCount(1,  Nova::$jsonVariables['novaLaravelFileManager']['types']);
        $this->assertEquals('Files',  Nova::$jsonVariables['novaLaravelFileManager']['types'][0]);
    }

    /** @test */
    public function change_url()
    {
        $tool = \ThinkOne\NovaLaravelFilemanager\NLFileManager::make();
        $tool->boot();

        $this->assertEquals('/filemanager?type=_TYPE_',  Nova::$jsonVariables['novaLaravelFileManager']['url']);

        $tool = \ThinkOne\NovaLaravelFilemanager\NLFileManager::make()->lfmUrl('foo-bar');
        $tool->boot();

        $this->assertEquals('foo-bar?type=_TYPE_',  Nova::$jsonVariables['novaLaravelFileManager']['url']);
    }
}
