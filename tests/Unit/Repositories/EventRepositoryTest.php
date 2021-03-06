<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use Mockery as Mockery;

class EventRepositoryTest extends TestCase
{
    /**
     * @covers App\Repositories\EventRepository::__construct
     * @covers App\Repositories\EventRepository::getEvents
     * @test
     */
    public function getting_events_with_api_error_should_return_empty_array()
    {
        // Fake return
        $return = app('Factories\ApiError')->create(1, true);

        // Mock the connector and set the return
        $wsuApi = Mockery::mock('Waynestate\Api\Connector');
        $wsuApi->shouldReceive('sendRequest')->with('calendar.events.listing', Mockery::type('array'))->once()->andReturn($return);
        $wsuApi->shouldReceive('nextRequestProduction')->once();

        // Get the events
        $events = app('App\Repositories\EventRepository', ['wsuApi' => $wsuApi])->getEvents($this->faker->randomDigit);

        // Make sure we have a blank events array
        $this->assertEquals($events, ['events' => []]);
    }

    /**
     * @covers App\Repositories\EventRepository::__construct
     * @covers App\Repositories\EventRepository::getEvents
     * @test
     */
    public function getting_events_grouped_by_date()
    {
        // Expected events to be returned
        $expected = app('Factories\Event')->create(2);

        // Maniuplate events to mimic the API return since they aren't grouped yet
        $return['events'] = collect($expected)->flatten(1)->toArray();

        // Mock the connector and set the return
        $wsuApi = Mockery::mock('Waynestate\Api\Connector');
        $wsuApi->shouldReceive('sendRequest')->with('calendar.events.listing', Mockery::type('array'))->once()->andReturn($return);
        $wsuApi->shouldReceive('nextRequestProduction')->once();

        // Get the events
        $events = app('App\Repositories\EventRepository', ['wsuApi' => $wsuApi])->getEvents($this->faker->randomDigit);

        $this->assertEquals($expected, $events['events']);
    }
}
