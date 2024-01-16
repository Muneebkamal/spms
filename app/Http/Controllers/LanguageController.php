<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLanguage(Request $request, $language)
    {
        if (in_array($language, config('app.available_locales'))) {
            App::setLocale($language);
            session()->put('locale', $language);
        }
        return redirect()->back();
    }
}
