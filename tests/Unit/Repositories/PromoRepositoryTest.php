<?php

namespace Tests\App\Repositories;

use Tests\TestCase;
use Mockery as Mockery;

class PromoRepositoryTest extends TestCase
{
    /**
     * @covers App\Repositories\PromoRepository::__construct
     * @covers App\Repositories\PromoRepository::getRequestData
     * @test
     */
    public function getting_promos_with_custom_page_accordion_should_return_accordion_page()
    {
        // Fake return
        $return = [
            'promotions' => [],
        ];

        // Always force homepage
        config(['app.hero_rotating_controllers' => ['HomepageController']]);

        // Create a fake data request
        $data = app('Factories\Page')->create(1, [
            'page' => [
                'controller' => 'HomepageController',
            ],
            'data' => [
                'accordion_promo_group_id' => $this->faker->numberbetween(1, 3),
            ],
        ]);

        // Mock the connector and set the return
        $wsuApi = Mockery::mock('Waynestate\Api\Connector');
        $wsuApi->shouldReceive('sendRequest')->with('cms.promotions.listing', Mockery::type('array'))->once()->andReturn($return);

        // Get the promos
        $promos = app('App\Repositories\PromoRepository', ['wsuApi' => $wsuApi])->getRequestData($data);

        $this->assertArrayHasKey('accordion_page', $promos);
    }

    /**
     * @covers App\Repositories\PromoRepository::getHomepagePromos
     * @test
     */
    public function getting_homepage_promos_should_return_array()
    {
        // Fake return
        $return = [
            'promotions' => [],
        ];

        // Mock the connector and set the return
        $wsuApi = Mockery::mock('Waynestate\Api\Connector');
        $wsuApi->shouldReceive('sendRequest')->with('cms.promotions.listing', Mockery::type('array'))->once()->andReturn($return);

        // Get the promos
        $promos = app('App\Repositories\PromoRepository', ['wsuApi' => $wsuApi])->getHomepagePromos();

        $this->assertTrue(is_array($promos));
    }
}