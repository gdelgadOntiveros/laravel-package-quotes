<?php

namespace Gdelgado\Quotes\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Gdelgado\Quotes\Tests\TestCase;

class QuotesTest extends TestCase
{
    /**
     * A basic feature test get all quotes.
     */
    public function test_all_quotes()
    {
        $response = $this->json('GET', '/api/quotes')->assertStatus(200);
    }

    public function test_random_quote()
    {
        $response = $this->json('GET', '/api/quotes/random')->assertStatus(200);
    }

    public function test_quote_id()
    {
        $id = rand(0, 5000);
        $response = $this->json('GET', '/api/quotes/')->assertStatus(200);
    }
}