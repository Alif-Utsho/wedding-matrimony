<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function manage(){
        $show_data = Blog::latest()->get();
        return view('backend.blog.manage', compact('show_data'));
    }

    public function add(){
        $blog_categories = BlogCategory::get();
        return view('backend.blog.add', compact('blog_categories'));
    }

    public function categorymanage(){
        $show_data = BlogCategory::latest()->get();
        return view('backend.blog.categorymanage', compact('show_data'));
    }

    public function categorystore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:blog_categories,name',
        ]);
    
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }
            return redirect()->back();
        }

        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name); 
        $blogCategory->save();
    
        Toastr::success('Blog category created successfully.');
        return redirect()->back();
    }

    public function categoryupdate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:blog_categories,name',
        ]);
    
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }
            return redirect()->back();
        }

        $blogCategory = BlogCategory::find($request->category_id);
        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name); 
        $blogCategory->save();
    
        Toastr::success('Blog category updated successfully.');
        return redirect()->back();
    }

    public function categorydelete($id){
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();
        
        Toastr::success('Blog category deleted successfully.');
        return redirect()->back();
    }
}
