<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAbout = About::latest('id')->get();
        return view('admin.about.list_about', compact('listAbout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create_about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'short_title' => ['required', 'max:255'],
            'short_description' => ['required'],
            'long_description' => ['required'],
            'about_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = 'upload/admin_images/';
            Image::make($image)->resize(523, 605)->save($path . $pathName);
        }

        About::create([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'about_image' => $pathName,
        ]);

        $notification = array(
            'message' => 'Created About Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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
        $getAboutById = About::where('id', $id)->first();

        return view('admin.about.edit_about', compact('getAboutById'));
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
            'short_description' => ['required'],
            'long_description' => ['required'],
            'about_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = 'upload/admin_images/';
            Image::make($image)->resize(523, 605)->save($path . $pathName);
        }

        About::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'about_image' => $pathName,
        ]);

        $notification = array(
            'message' => 'Updated About Successfully',
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
        About::destroy($id);

        $notification = array(
            'message' => 'Deleted Home Slide Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}