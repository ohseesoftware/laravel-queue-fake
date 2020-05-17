<?php

namespace OhSeeSoftware\LaravelQueueFake\Tests;

use Illuminate\Queue\QueueManager;
use Illuminate\Support\Facades\Queue as QueueFacade;
use Illuminate\Support\Testing\Fakes\QueueFake as LaravelQueueFake;
use OhSeeSoftware\LaravelQueueFake\QueueFake;

class QueueFakeTest extends TestCase
{
    /** @test */
    public function it_calls_users_function()
    {
        // Given
        $value = false;

        // When
        QueueFake::wrap(function () use (&$value) {
            $value = true;
        });

        // Then
        $this->assertTrue($value);
    }

    /** @test */
    public function it_fakes_the_queue_while_calling_users_function()
    {
        // When
        QueueFake::wrap(function () {
            $this->assertInstanceOf(LaravelQueueFake::class, QueueFacade::getFacadeRoot());
        });
    }

    /** @test */
    public function it_replaces_queue_instance_after_calling_users_function()
    {
        // When
        QueueFake::wrap(function () {
            // no-op
        });

        // Then
        $this->assertInstanceOf(QueueManager::class, QueueFacade::getFacadeRoot());
    }
}
