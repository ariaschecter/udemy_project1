<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory() {
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogCategories'));
    } // End Method

    public function AddBlogCategory() {
        return view('admin.blog_category.blog_category_add');
    } // End Method

    public function StoreBlogCategory(Request $request) {
        $request->validate([
            'blog_category' => 'required|unique:blog_categories,blog_category'
        ], [
            'blog_category.required' => 'Blog Category Name is Required',
        ]);

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    } // End Method

    public function EditBlogCategory($id) {
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogCategory'));
    }

    public function UpdateBlogCategory(Request $request, BlogCategory $blogcategory) {
        $request->validate([
            'blog_category' => ['required', Rule::unique('blog_categories')->ignore($blogcategory)],
        ]);

        $blogcategory->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory(BlogCategory $blogcategory) {
        $blogcategory->delete();
        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
}
