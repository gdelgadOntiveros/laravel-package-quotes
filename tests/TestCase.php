<?php

namespace Gdelgadontiveros\LaravelPackageQuotes\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Gdelgadontiveros\LaravelPackageQuotes\Providers\QuotesServiceProvider;

class TestCase extends BaseTestCase
{

    protected function getPackageProviders($app)
    {
        return [
            QuotesServiceProvider::class,
        ];
    }
}