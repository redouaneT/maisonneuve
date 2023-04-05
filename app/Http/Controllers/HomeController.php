<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->simplePaginate(10);

        return view('template/adminlte/index', compact('articles'));
    }
}
