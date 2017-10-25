<?php

namespace Tests\Styleguide\Repositories;

use Tests\TestCase;

class PageRepositoryTest extends TestCase
{
    /**
     * @covers App\Http\Controllers\HomepageController
     * @covers App\Http\Controllers\ChildpageController
     * @covers App\Http\Controllers\ProfileController
     * @covers App\Http\Controllers\NewsController
     * @covers App\Http\Controllers\DirectoryController
     * @covers Styleguide\Repositories\PageRepository::getRequestData
     * @test
     */
    public function all_styleguide_routes_should_load_successfully()
    {
        // Check all repository routes to ensure they load
        collect(glob(base_path().'/styleguide/Pages/*.php'))
        ->reject(function ($filename) {
            return in_array(basename($filename), ['Page.php']);
        })
        ->each(function ($filename) {
            $path = app('Styleguide\Pages\\'.basename($filename, '.php'))->getPath();

            $response = $this->call('GET', $path);

            $this->assertTrue(is_string($path), 'ERROR: Path to styleguide page not found. Make sure it exists in the styleguide menu. Optionally you can added public $path = \'/styleguide/path/to/page\' in your styleguide Page class.');
            $this->assertEquals(200, $response->status(), 'Styleguide error at path: '.$path);
        });
    }
}
