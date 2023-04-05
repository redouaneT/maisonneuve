<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    // ...
    public function switch($locale)
    {
        if (in_array($locale, config('app.available_locales'))) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
