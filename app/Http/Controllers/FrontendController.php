<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeSlide;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homeSlide = HomeSlide::latest('id')->first();

        $about = About::latest('id')->first();

        return view('frontend.index', compact('homeSlide', 'about'));
    }
}