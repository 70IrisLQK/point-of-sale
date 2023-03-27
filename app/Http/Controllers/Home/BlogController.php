<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public const PUBLIC_PATH = 'upload/admin_images/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBlogs = Blog::with('blogCategory')->latest('id')->get();
        return view('admin.blog.list_blog', compact('listBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBlogCategories = BlogCategory::get();
        return view('admin.blog.create_blog', compact('listBlogCategories'));
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
            'tags' => ['required', 'max:255'],
            'description' => ['required'],
            'blog_category_id' => ['required'],
            'blog_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save(BlogController::PUBLIC_PATH . $pathName);
        }
        Blog::create([
            'title' => $request->title,
            'blog_category_id' => $request->blog_category_id,
            'tags' => $request->tags,
            'description' => $request->description,
            'image' => $pathName,
        ]);

        $notification = array(
            'message' => 'Created Blog Successfully',
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getBlogById = Blog::find($id);
        $listBlogCategories = BlogCategory::get();

        return view('admin.blog.edit_blog', compact('getBlogById', 'listBlogCategories'));
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
            'tags' => ['required', 'max:255'],
            'description' => ['required'],
            'blog_category_id' => ['required'],
            'blog_image' => ['required', 'image', 'mimes:png,jpq,gif,jpeg'],
        ]);

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save(BlogController::PUBLIC_PATH . $pathName);
        }

        $blog = Blog::where('id', $id)->first();
        $imageExist = public_path(BlogController::PUBLIC_PATH . $blog->image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }

        Blog::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'blog_category_id' => $request->blog_category_id,
            'tags' => $request->tags,
            'description' => $request->description,
            'image' => $pathName,
        ]);

        $notification = array(
            'message' => 'Updated Blog Successfully',
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

        $blog = Blog::where('id', $id)->first();
        $imageExist = public_path(BlogController::PUBLIC_PATH . $blog->image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }

        Blog::destroy($id);

        $notification = array(
            'message' => 'Deleted Blog Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}