<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Footer;
use App\Models\HomeSlide;
use App\Models\MultiImages;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homeSlide = HomeSlide::latest('id')->first();

        $about = About::latest('id')->first();

        $images = MultiImages::latest('id')->get();

        $portfolios = Portfolio::latest('id')->get();

        $blogs = Blog::with('blogCategory')->latest('id')->take(3)->get();

        $footer = Footer::first();

        return view('frontend.index', compact(
            'homeSlide',
            'about',
            'images',
            'portfolios',
            'blogs',
            'footer'
        ));
    }
}