<?php

namespace ThinkOne\NovaLaravelFilemanager\Tests;

use ThinkOne\NovaLaravelFilemanager\NLFMImage;

class NLFMImageFieldTest extends TestCase
{
    /** @test */
    public function correct_component()
    {
        $field = NLFMImage::make('Image');

        $this->assertEquals('nlfm-image', $field->component());
    }
    /** @test */
    public function custom_path()
    {
        $field = NLFMImage::make('Image');
        $this->assertEquals('filemanager', $field->meta()['filemanager_path']);

        $field->filemanagerPath('my/path');
        $this->assertEquals('my/path', $field->meta()['filemanager_path']);
    }

}
