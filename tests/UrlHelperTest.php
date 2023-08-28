<?php

namespace ThinkOne\NovaLaravelFilemanager\Tests;

use ThinkOne\NovaLaravelFilemanager\Helpers\Url;

class UrlHelperTest extends TestCase
{
    /** @test */
    public function add_or_update_args()
    {
        $url = Url::addOrUpdateArgs('https://test.bar:9000/example/path?quex=33&baz=foo&qux=77', 'baz', 'qux');

        $this->assertEquals('https://test.bar:9000/example/path?quex=33&baz=qux&qux=77', $url);
    }
}
