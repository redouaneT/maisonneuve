<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;


class DashboardController extends Controller
{
    public function index()
    {
        $count = Etudiant::count();
        return view('template/adminlte/admin/dashboard', ['count' => $count]);
    }
}
