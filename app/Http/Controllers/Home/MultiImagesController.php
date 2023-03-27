<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\MultiImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class MultiImagesController extends Controller
{
    public const PUBLIC_PATH = 'upload/admin_images/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMultiImages = MultiImages::latest('id')->get();

        return view('admin.about.images.list_images', compact('listMultiImages'));
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
        $getImageById = MultiImages::where('id', $id)->first();

        return view('admin.about.images.edit_images', compact('getImageById'));
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
            'about_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = 'upload/admin_images/';
            Image::make($image)->resize(171, 170)->save($path . $pathName);
        }

        $multiImages = MultiImages::where('id', $id)->first();
        $imageExist = public_path(MultiImagesController::PUBLIC_PATH . $multiImages->multi_image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }

        MultiImages::updateOrCreate(['id' => $id], [
            'multi_image' => $pathName,
        ]);

        $notification = array(
            'message' => "Updated About's Image Successfully",
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