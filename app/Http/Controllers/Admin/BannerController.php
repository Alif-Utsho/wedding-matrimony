<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller {
    public function manage() {
        $show_data = Banner::latest()->get();

        return view('backend.banner.manage', compact('show_data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath = ImageService::uploadImage($request->file('image'), '', 'banners');

        Banner::create([
            'image' => $imagePath,
        ]);

        Toastr::success('Banner uplaoded successfully');
        return redirect()->back();
    }

    public function delete($id) {
        $banner = Banner::findOrFail($id);

        if ($banner->image && File::exists(public_path($banner->image))) {
            File::delete(public_path($banner->image));
        }

        $banner->delete();

        Toastr::success('Banner deleted successfully!', 'Success');
        return redirect()->route('admin.banner.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'banner_id'    => 'required|integer|exists:banners,id',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $banner = Banner::find($request->banner_id);
        $banner->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => $request->status ? 'Banner added to front page successfully!' : 'Banner removed from front page successfully!',
        ]);
    }

}
