<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PortfolioController extends Controller
{
    const PUBLIC_PATH = 'upload/admin_images/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPortfolios = Portfolio::latest('id')->get();
        return view('admin.portfolio.list_portfolio', compact('listPortfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create_portfolio');
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
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'portfolio_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1020, 519)->save(PortfolioController::PUBLIC_PATH . $pathName);
        }

        Portfolio::create([
            'portfolio_title' => $request->title,
            'portfolio_name' => $request->name,
            'portfolio_description' => $request->description,
            'portfolio_image' => $pathName,
        ]);

        $notification = array(
            'message' => 'Created Portfolio Successfully',
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
        $getPortfolioById  = Portfolio::find($id);
        return view('frontend.pages.portfolio_details', compact('getPortfolioById'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getPortfolioById = Portfolio::find($id);
        return view('admin.portfolio.edit_portfolio', compact('getPortfolioById'));
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
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'portfolio_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save(PortfolioController::PUBLIC_PATH . $pathName);
        }

        $portfolio = Portfolio::where('id', $id)->first();
        $imageExist = public_path(PortfolioController::PUBLIC_PATH . $portfolio->portfolio_image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        Portfolio::updateOrCreate(['id' => $id], [
            'portfolio_title' => $request->title,
            'portfolio_name' => $request->name,
            'portfolio_description' => $request->description,
            'portfolio_image' => $pathName,
        ]);

        $notification = array(
            'message' => 'Updated Portfolio Successfully',
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
        $portfolio = Portfolio::where('id', $id)->first();
        $imageExist = public_path(PortfolioController::PUBLIC_PATH . $portfolio->portfolio_image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }

        $portfolio->delete();
        $notification = array(
            'message' => 'Deleted Portfolio Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}