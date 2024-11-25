<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Wedding;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WeddingController extends Controller {
    public function manage() {
        $show_data = Wedding::latest()->get();

        return view('backend.wedding.manage', compact('show_data'));
    }

    public function add() {

        return view('backend.wedding.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'couple_name'  => 'required|string|max:200',
            'couple_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'location'     => 'required|string|max:200',
            'date'         => 'required|date',
            'description'  => 'nullable|string|max:500',
            'status'       => 'required|in:on,off',
            'type'         => 'required|in:image_based,video_based',

            'image1'       => 'required_if:type,image_based|image|mimes:jpeg,png,jpg|max:2048',
            'image2'       => 'required_if:type,image_based|image|mimes:jpeg,png,jpg|max:2048',
            'image3'       => 'required_if:type,image_based|image|mimes:jpeg,png,jpg|max:2048',

            'thumbnail'    => 'required_if:type,video_based|image|mimes:jpeg,png,jpg|max:2048',
            'video'        => 'required_if:type,video_based|nullable|string|max:500',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $coupleImagePath = ImageService::uploadImage($request->file('couple_image'), '', 'weddings');
        $image1Path      = $request->file('image1') ? ImageService::uploadImage($request->file('image1'), '', 'weddings') : null;
        $image2Path      = $request->file('image2') ? ImageService::uploadImage($request->file('image2'), '', 'weddings') : null;
        $image3Path      = $request->file('image3') ? ImageService::uploadImage($request->file('image3'), '', 'weddings') : null;
        $thumbnailPath   = $request->file('thumbnail') ? ImageService::uploadImage($request->file('thumbnail'), '', 'weddings') : null;

        $wedding = Wedding::create([
            'couple_name'  => $request->couple_name,
            'couple_image' => $coupleImagePath,
            'location'     => $request->location,
            'date'         => $request->date,
            'description'  => $request->description,
            'status'       => $request->status === 'on',
            'video_based'  => $request->type == 'video_based' ? true : false,
            'image1'       => $image1Path,
            'image2'       => $image2Path,
            'image3'       => $image3Path,
            'thumbnail'    => $thumbnailPath,
            'video'        => $request->type == 'video_based' ? $request->video : null,
        ]);

        Toastr::success('Wedding created successfully!', 'Success');

        return redirect()->route('admin.wedding.manage');
    }

    public function edit($id) {
        $wedding = Wedding::find($id);

        return view('backend.wedding.edit', compact('wedding'));
    }

    public function update(Request $request) {
        $wedding = Wedding::findOrFail($request->wedding_id);

        $validator = Validator::make($request->all(), [
            'couple_name'  => 'required|string|max:200',
            'couple_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Allow skipping update
            'location' => 'required|string|max:200',
            'date'         => 'required|date',
            'description'  => 'nullable|string|max:500',
            'status'       => 'required|in:on,off',
            'type'         => 'required|in:image_based,video_based',

            'image1'       => Rule::requiredIf($request->type === 'image_based' && !$wedding->image1),
            'image2'       => Rule::requiredIf($request->type === 'image_based' && !$wedding->image2),
            'image3'       => Rule::requiredIf($request->type === 'image_based' && !$wedding->image3),
            'image1'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image2'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image3'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'thumbnail'    => 'required_if:type,video_based|image|mimes:jpeg,png,jpg|max:2048',
            'video'        => 'required_if:type,video_based|nullable|string|max:500',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $coupleImage = $request->hasFile('couple_image')
        ? ImageService::uploadImage($request->file('couple_image'), $wedding->couple_image, 'weddings')
        : $wedding->couple_image;

        $thumbnail = $request->hasFile('thumbnail')
        ? ImageService::uploadImage($request->file('thumbnail'), $wedding->thumbnail, 'weddings')
        : $wedding->thumbnail;

        $image1 = ImageService::uploadImage($request->file('image1'), $wedding->image1, 'weddings');

        $image2 = ImageService::uploadImage($request->file('image2'), $wedding->image2, 'weddings');

        $image3 = ImageService::uploadImage($request->file('image3'), $wedding->image3, 'weddings');

        $wedding->update([
            'couple_name'  => $request->couple_name,
            'couple_image' => $coupleImage,
            'location'     => $request->location,
            'date'         => $request->date,
            'description'  => $request->description,
            'status'       => $request->status === 'on' ? 1 : 0,
            'video_based'  => $request->type == 'video_based' ? true : false,
            'thumbnail'    => $request->type === 'video_based' ? $thumbnail : null,
            'video'        => $request->type === 'video_based' ? $request->video : null,
            'image1'       => $request->type === 'image_based' ? $image1 : null,
            'image2'       => $request->type === 'image_based' ? $image2 : null,
            'image3'       => $request->type === 'image_based' ? $image3 : null,
        ]);

        Toastr::success('Wedding updated successfully!', 'Success');

        return redirect()->route('admin.wedding.manage');
    }

    public function togglefront(Request $request) {
        $validator = Validator::make($request->all(), [
            'wedding_id' => 'required|integer|exists:weddings,id',
            'status'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $wedding = Wedding::find($request->wedding_id);
        $wedding->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Wedding status toggled successfully!',
        ]);
    }

    public function delete($id) {
        $wedding = Wedding::findOrFail($id);

        if ($wedding->couple_image && File::exists(public_path($wedding->couple_image))) {
            File::delete(public_path($wedding->couple_image));
        }

        if ($wedding->image1 && File::exists(public_path($wedding->image1))) {
            File::delete(public_path($wedding->image1));
        }

        if ($wedding->image2 && File::exists(public_path($wedding->image2))) {
            File::delete(public_path($wedding->image2));
        }

        if ($wedding->image3 && File::exists(public_path($wedding->image3))) {
            File::delete(public_path($wedding->image3));
        }

        if ($wedding->thumbnail && File::exists(public_path($wedding->thumbnail))) {
            File::delete(public_path($wedding->thumbnail));
        }

        $wedding->delete();

        Toastr::success('Wedding deleted successfully!', 'Success');

        return redirect()->route('admin.wedding.manage');
    }

}
