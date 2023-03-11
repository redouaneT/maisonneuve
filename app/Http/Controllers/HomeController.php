<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class HomeController extends Controller
{
    public function index()
    {
        $count = Etudiant::count();
        return view('template/adminlte/index', ['count' => $count]);
    }
}
