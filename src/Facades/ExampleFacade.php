<?php

namespace OhSeeSoftware\LaravelPackageBoilerplate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OhSeeSoftware\LaravelPackageBoilerplate\Skeleton\SkeletonClass
 */
class ExampleFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-package-boilerplate';
    }
}
