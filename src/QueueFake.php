<?php

namespace OhSeeSoftware\LaravelQueueFake;

use Illuminate\Support\Facades\Queue;

class QueueFake
{
    public static function wrap(callable $callable): void
    {
        $queue = Queue::getFacadeRoot();
        Queue::fake();

        call_user_func($callable);

        Queue::swap($queue);
    }
}
