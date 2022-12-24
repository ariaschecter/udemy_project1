<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BlogController extends Controller
{
    public function AllBlog() {
        $blogs = Blog::latest()->get();
        return view('admin.blog.blog_all', compact('blogs'));
    } // End Method

    public function AddBlog() {
        $blogCategories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.blog_add', compact('blogCategories'));
    } // End Method

    public function StoreBlog(Request $request) {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_image' => 'required',
            'blog_description' => 'required',
            'blog_tags' => 'required',
        ], [
            'blog_name.required' => 'Blog Name is Required',
            'blog_title.required' => 'Blog Title is Required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/blog/' . $name_gen;
        Image::make($image)->resize(430, 327)->save($save_url);

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    } // End Method
}
