<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory() {
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogCategories'));
    } // End Method
}
