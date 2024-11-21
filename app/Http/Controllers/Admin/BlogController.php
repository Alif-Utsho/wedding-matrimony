<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller {
    public function manage() {
        $show_data = Blog::latest()->get();

        return view('backend.blog.manage', compact('show_data'));
    }

    public function add() {
        $blog_categories = BlogCategory::get();
        $blog_tags       = Tag::get();

        return view('backend.blog.add', compact('blog_categories', 'blog_tags'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|max:200|unique:blogs,title',
            'short_description' => 'required|string|max:250',
            'description'       => 'nullable|string',
            'image'             => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'author_name'       => 'required|string|max:100',
            'author_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category'          => 'required|exists:blog_categories,id',
            'tags'              => 'nullable|array',
            'tags.*'            => 'exists:tags,id',
            'trending'          => 'nullable',
            'front_page'        => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath       = ImageService::uploadImage($request->file('image'), '', 'blogs');
        $authorImagePath = ImageService::uploadImage($request->file('author_image'), '', 'blogs');

        $blog = Blog::create([
            'category_id'       => $request->category,
            'title'             => $request->title,
            'description'       => $request->description,
            'image'             => $imagePath,
            'short_description' => $request->short_description,
            'author_name'       => $request->author_name,
            'author_image'      => $authorImagePath,
            'date'              => $request->date,
            'front_page'        => $request->boolean('front_page'),
            'trending'          => $request->boolean('trending'),
        ]);

        if ($request->has('tags')) {
            $blog->tags()->sync($request->tags);
        }

        Toastr::success('Blog created successfully!', 'Success');

        return redirect()->route('admin.blog.manage');
    }

    public function edit($id) {
        $blog            = Blog::find($id);
        $blog_categories = BlogCategory::get();
        $blog_tags       = Tag::get();

        return view('backend.blog.edit', compact('blog', 'blog_categories', 'blog_tags'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'blog_id'           => 'required|integer',
            'title'             => [
                'required',
                'string',
                'max:200',
                Rule::unique('blogs', 'title')->ignore($request->blog_id),
            ],
            'short_description' => 'required|string|max:250',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author_name'       => 'required|string|max:100',
            'author_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category'          => 'required|exists:blog_categories,id',
            'tags'              => 'nullable|array',
            'tags.*'            => 'exists:tags,id',
            'trending'          => 'nullable',
            'front_page'        => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $blog            = Blog::find($request->blog_id);
        $imagePath       = ImageService::uploadImage($request->file('image'), $blog->image, 'blogs');
        $authorImagePath = ImageService::uploadImage($request->file('author_image'), $blog->author_image, 'blogs');

        $blog->update([
            'category_id'       => $request->category,
            'title'             => $request->title,
            'description'       => $request->description,
            'image'             => $imagePath,
            'short_description' => $request->short_description,
            'author_name'       => $request->author_name,
            'author_image'      => $authorImagePath,
            'date'              => $request->date,
            'front_page'        => $request->boolean('front_page'),
            'trending'          => $request->boolean('trending'),
        ]);

        if ($request->has('tags')) {
            $blog->tags()->sync($request->tags);
        }

        Toastr::success('Blog updated successfully!', 'Success');

        return redirect()->route('admin.blog.manage');
    }

    public function togglefront(Request $request) {
        $validator = Validator::make($request->all(), [
            'blog_id'    => 'required|integer|exists:blogs,id',
            'front_page' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $blog = Blog::find($request->blog_id);
        $blog->update(['front_page' => $request->front_page]);

        return response()->json([
            'success' => true,
            'message' => $request->front_page ? 'Blog added to front page successfully!' : 'Blog removed from front page successfully!',
        ]);
    }

    public function delete($id) {
        $blog = Blog::findOrFail($id);

        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }

        if ($blog->author_image && File::exists(public_path($blog->author_image))) {
            File::delete(public_path($blog->author_image));
        }

        $blog->delete();

        Toastr::success('Blog deleted successfully!', 'Success');

        return redirect()->route('admin.blog.manage');
    }

    public function categorymanage() {
        $show_data = BlogCategory::latest()->get();

        return view('backend.blog.categorymanage', compact('show_data'));
    }

    public function categorystore(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:blog_categories,name',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return redirect()->back();
        }

        $blogCategory       = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name);
        $blogCategory->save();

        Toastr::success('Blog category created successfully.');

        return redirect()->back();
    }

    public function categoryupdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:blog_categories,name',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return redirect()->back();
        }

        $blogCategory       = BlogCategory::find($request->category_id);
        $blogCategory->name = $request->name;
        $blogCategory->slug = Str::slug($request->name);
        $blogCategory->save();

        Toastr::success('Blog category updated successfully.');

        return redirect()->back();
    }

    public function categorydelete($id) {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();

        Toastr::success('Blog category deleted successfully.');

        return redirect()->back();
    }

    public function tagmanage() {
        $show_data = Tag::latest()->get();

        return view('backend.blog.tagmanage', compact('show_data'));
    }

    public function tagstore(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:tags,name',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return redirect()->back();
        }

        $blogTag       = new Tag();
        $blogTag->name = $request->name;
        $blogTag->save();

        Toastr::success('Blog Tag created successfully.');

        return redirect()->back();
    }

    public function tagupdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:tags,name',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return redirect()->back();
        }

        $blogTag       = Tag::find($request->tag_id);
        $blogTag->name = $request->name;
        $blogTag->save();

        Toastr::success('Blog Tag updated successfully.');

        return redirect()->back();
    }

    public function tagdelete($id) {
        $blogTag = Tag::find($id);
        $blogTag->delete();

        Toastr::success('Blog Tag deleted successfully.');

        return redirect()->back();
    }

}
