<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $request)
    {
        

        return response()->view('frontend.sitemap')->header('Content-Type', 'text/xml');
    }
}