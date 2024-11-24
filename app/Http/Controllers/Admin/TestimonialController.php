<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller {
    public function manage() {
        $show_data = Testimonial::latest()->get();

        return view('backend.testimonial.manage', compact('show_data'));
    }

    public function add() {
        return view('backend.testimonial.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:100',
            'description' => 'required|string|max:250',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'location'    => 'required|string',
            'status'      => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath = ImageService::uploadImage($request->file('image'), '', 'testimonials');

        $testimonial = Testimonial::create([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'image'       => $imagePath,
            'status'      => $request->boolean('status'),
        ]);

        if ($request->has('tags')) {
            $testimonial->tags()->sync($request->tags);
        }

        Toastr::success('Testimonial created successfully!', 'Success');

        return redirect()->route('admin.testimonial.manage');
    }

    public function edit($id) {
        $testimonial = Testimonial::find($id);

        return view('backend.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'testimonial_id' => 'required|integer',
            'title'          => 'required|string|max:100',
            'description'    => 'required|string|max:250',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'location'       => 'required|string',
            'status'         => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $testimonial = Testimonial::find($request->testimonial_id);
        $imagePath   = ImageService::uploadImage($request->file('image'), $testimonial->image, 'testimonials');

        $testimonial->update([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'image'       => $imagePath,
            'status'      => $request->boolean('status'),
        ]);

        if ($request->has('tags')) {
            $testimonial->tags()->sync($request->tags);
        }

        Toastr::success('Testimonial updated successfully!', 'Success');

        return redirect()->route('admin.testimonial.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'testimonial_id' => 'required|integer|exists:testimonials,id',
            'status'         => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $testimonial = Testimonial::find($request->testimonial_id);
        $testimonial->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => $request->status ? 'Testimonial added to front page successfully!' : 'Testimonial removed from front page successfully!',
        ]);
    }

    public function delete($id) {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image && File::exists(public_path($testimonial->image))) {
            File::delete(public_path($testimonial->image));
        }

        $testimonial->delete();

        Toastr::success('Testimonial deleted successfully!', 'Success');

        return redirect()->route('admin.testimonial.manage');
    }

}
