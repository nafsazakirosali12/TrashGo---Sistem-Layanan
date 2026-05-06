<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_us()
    {
        return view('masyarakat.pages.about_us');
    }

}

