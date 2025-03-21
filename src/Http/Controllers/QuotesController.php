<?php

namespace Gdelgadontiveros\LaravelPackageQuotes\Http\Controllers;

use Gdelgadontiveros\LaravelPackageQuotes\Services\HttpRequestService;
use Illuminate\Http\Request;

class QuotesController
{
    
    protected $quoteService;

    public function __construct(HttpRequestService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', 1);

        $limit = $request->query('limit', 10);
        $skip = ($page - 1) * $limit;

        return response()->json($this->quoteService->getAllQuotes($limit, $skip));
    }

    public function random()
    {
        return response()->json($this->quoteService->getRandomQuote());
    }

    public function show($id)
    {
        return response()->json($this->quoteService->getQuote($id));
    }

}