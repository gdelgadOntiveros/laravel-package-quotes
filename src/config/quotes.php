<?php

return [
    'base_url' => env('QUOTES_BASE_URL', 'https://dummyjson.com'),
    'rate_limit' => env('QUOTES_RATE_LIMIT', 60),
    'max_request' => env('QUOTES_MAX_REQUEST', 60),
];