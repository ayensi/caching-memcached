<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuoteController extends Controller
{
    public function index()
    {
        if (Cache::has('quotes'))
        {
            print 'From cache';
            return Cache::get('quotes');
        }
        else
        {
            print 'From db';
            $quotes = $this->getQuotes();
            Cache::put('quotes',$quotes,now()->addMinutes(10));
            return $quotes;
        }
    }
    public function deleteCache()
    {
        Cache::forget('quotes');
        return response()->json([
            'message' => 'Deleted cache.'
        ],200);
    }
    private function getQuotes()
    {
        return Quote::all();
    }
}
