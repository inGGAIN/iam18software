<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class iamCotroller extends Controller
{
    function iamSoft (Request $request)
    {
        return view('soft.soft');
    }
}
