<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $records = News::paginate(6);
        return view('website.news.index', compact('records'));
    }

    public function show($id)
    {
        $new = News::findOrFail($id);
        return view('website.news.show', compact('new'));
    }
}
