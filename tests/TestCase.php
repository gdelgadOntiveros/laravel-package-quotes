<?php

namespace Gdelgado\Quotes\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Gdelgado\Quotes\Providers\QuotesServiceProvider;

class TestCase extends BaseTestCase
{

    protected function getPackageProviders($app)
    {
        return [
            QuotesServiceProvider::class,
        ];
    }
}