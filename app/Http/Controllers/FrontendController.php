<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeSlide;
use App\Models\MultiImages;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homeSlide = HomeSlide::latest('id')->first();

        $about = About::latest('id')->first();

        $images = MultiImages::latest('id')->get();

        return view('frontend.index', compact('homeSlide', 'about', 'images'));
    }
}