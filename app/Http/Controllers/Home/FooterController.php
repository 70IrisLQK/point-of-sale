<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public const PUBLIC_PATH = 'upload/admin_images/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFooters = Footer::latest('id')->get();
        return view('admin.footer.list_footer', compact('listFooters'));
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
            'phone' => ['required'],
            'address' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'facebook' => ['required', 'max:255'],
            'twitter' => ['required', 'max:255'],
            'copyright' => ['required', 'max:255'],
            'description' => ['required'],
        ]);

        Footer::updateOrCreate(['id' => $id], [
            'number' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
            'short_description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Updated Footer Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getFooterById = Footer::where('id', $id)->first();

        return view('admin.footer.edit_footer', compact('getFooterById'));
    }
}