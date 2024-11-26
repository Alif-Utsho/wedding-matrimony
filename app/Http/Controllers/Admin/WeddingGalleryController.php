<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\WeddingGallery;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WeddingGalleryController extends Controller {
    public function manage($id) {
        $show_data = WeddingGallery::where('wedding_id', $id)->latest()->get();

        return view('backend.weddinggallery.manage', compact('show_data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'wedding_id' => 'required|exists:weddings,id',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath = ImageService::uploadImage($request->file('image'), '', 'wedding_galleries');

        WeddingGallery::create([
            'image'      => $imagePath,
            'wedding_id' => $request->wedding_id,
        ]);

        Toastr::success('WeddingGallery uplaoded successfully');

        return redirect()->back();
    }

    public function delete($id) {
        $weddinggallery = WeddingGallery::findOrFail($id);

        if ($weddinggallery->image && File::exists(public_path($weddinggallery->image))) {
            File::delete(public_path($weddinggallery->image));
        }

        $weddinggallery->delete();

        Toastr::success('WeddingGallery deleted successfully!', 'Success');

        return redirect()->route('admin.weddinggallery.manage', $weddinggallery->id);
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'weddinggallery_id' => 'required|integer|exists:wedding_galleries,id',
            'status'            => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $weddinggallery = WeddingGallery::find($request->weddinggallery_id);
        $weddinggallery->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => $request->status ? 'WeddingGallery added to front page successfully!' : 'WeddingGallery removed from front page successfully!',
        ]);
    }

}
