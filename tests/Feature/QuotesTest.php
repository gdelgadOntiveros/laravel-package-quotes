<?php

namespace Gdelgadontiveros\LaravelPackageQuotes\Tests\Feature;

use Gdelgadontiveros\LaravelPackageQuotes\Tests\TestCase;

class QuotesTest extends TestCase
{
    public function test_all_quotes()
    {
        $this->get('/api/quotes-ui?page=1&limit=10')->assertStatus(200);
    }

    public function test_random_quote()
    {
        $this->get('/api/quotes-ui/random')->assertStatus(200);
    }

    public function test_id_quote()
    {
        $id = rand(0, 5000);
        $this->get('/api/quotes-ui/'.$id)->assertStatus(200);
    }
}