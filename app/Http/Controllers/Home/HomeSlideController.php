<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class HomeSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listHomeSlides = HomeSlide::latest('id')->get();

        return view('admin.home_slider.list_slider', compact('listHomeSlides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getSlideById = HomeSlide::where('id', $id)->first();

        return view('admin.home_slider.edit_slider', compact('getSlideById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'short_title' => ['required', 'max:255'],
            'video_url' => ['required', 'max:255'],
            'home_slide' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = 'upload/admin_images/';
            Image::make($image)->resize(636, 852)->save($path . $pathName);
        }

        HomeSlide::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'short_title' => $request->short_title,
            'video_url' => $request->video_url,
            'home_slide' => $pathName,
        ]);

        $notification = array(
            'message' => 'Updated Home Slide Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}