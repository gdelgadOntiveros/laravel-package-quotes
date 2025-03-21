<?php

namespace Gdelgado\Quotes\Services;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;

class HttpRequestService {

    /** attrib */
    private string $baseUrl;
    private int $rateLimit;
    private int $maxRequestTime;
    private array $cacheArray = [];
    private string $cacheName = 'quote:request';
    /** attrib */
    
    /** construct */
    public function __construct()
    {
        $this->baseUrl = config('quotes.base_url', 'https://dummyjson.com');
        $this->rateLimit = config('quotes.rate_limit', 60);
        $this->maxRequestTime = config('quotes.max_request', 60);
    }

    public function getAllQuotes(int $limit = 0, int $skip = 0)
    {
        return empty($this->cacheArray) ? 
            $this->requestHttp("{$this->baseUrl}/quotes?limit={$limit}&skip={$skip}") : 
            $this->cacheArray;
    }

    public function getRandomQuote()
    {
        return $this->requestHttp("{$this->baseUrl}/quotes/random");
    }

    public function getQuote(int $id)
    {
        $quotes = $this->getAllQuotes()['quotes'] ?? [];
        foreach ($quotes as $key => $value) {
            if ($value['id'] == $id) {
                return $value;
            }
        }
        $quote = $this->requestHttp("{$this->baseUrl}/quotes/{$id}");
        $this->addToCache($quote);

        return $quote;
    }

    private function addToCache(array $quote)
    {
        if (in_array($quote, $this->cacheArray)) {
            return;
        }
        $this->cacheArray[] = $quote;
    }

    private function requestHttp(string $url)
    {
        $executed = RateLimiter::attempt(
            'quoteid',
            $perMinute = $this->maxRequestTime,
            function() use ($url) {
                $response = Http::get($url)->json();
                Cache::put($this->cacheName, $response, $this->maxRequestTime);
            },
            $decayRate = $this->rateLimit,
        );

        return Cache::get($this->cacheName);
    }

}