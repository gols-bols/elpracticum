<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageWebController extends Controller
{
    public function home()
    {
        $page = Page::where('slug', 'home')->first();
        return view('pages.show', ['page' => $page]);
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', ['page' => $page]);
    }
}
