<?php

namespace Gdelgadontiveros\LaravelPackageQuotes\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
// use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Gdelgadontiveros\Laravelpackagequotes\Providers\QuotesServiceProvider;

class TestCase extends BaseTestCase
{

    protected function getPackageProviders($app)
    {
        return [
            QuotesServiceProvider::class,
        ];
    }
}