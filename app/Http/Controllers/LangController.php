<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function changeLanguage(Request $requestو $locale)
    {
    	app()->setlocale($locale);
    	echo trans('language.message');
    }
}
