<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Tag;
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

    public function tagmanage(){
        $show_data = Tag::latest()->get();
        return view('backend.blog.tagmanage', compact('show_data'));
    }

    public function tagstore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:tags,name',
        ]);
    
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }
            return redirect()->back();
        }

        $blogTag = new Tag();
        $blogTag->name = $request->name;
        $blogTag->save();
    
        Toastr::success('Blog Tag created successfully.');
        return redirect()->back();
    }

    public function tagupdate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:tags,name',
        ]);
    
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }
            return redirect()->back();
        }

        $blogTag = Tag::find($request->tag_id);
        $blogTag->name = $request->name;
        $blogTag->save();
    
        Toastr::success('Blog Tag updated successfully.');
        return redirect()->back();
    }

    public function tagdelete($id){
        $blogTag = Tag::find($id);
        $blogTag->delete();
        
        Toastr::success('Blog Tag deleted successfully.');
        return redirect()->back();
    }
}
