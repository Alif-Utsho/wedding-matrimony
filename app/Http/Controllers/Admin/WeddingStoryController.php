<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\WeddingStory;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WeddingStoryController extends Controller {
    public function manage($id) {
        $show_data = WeddingStory::where('wedding_id', $id)->latest()->get();

        return view('backend.weddingstory.manage', compact('show_data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'wedding_id' => 'required|exists:weddings,id',
            'title'      => 'required|string|max:200',
            'date'       => 'nullable|date',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath = ImageService::uploadImage($request->file('image'), '', 'wedding_stories');

        WeddingStory::create([
            'title'      => $request->title,
            'date'       => $request->date,
            'image'      => $imagePath,
            'wedding_id' => $request->wedding_id,
        ]);

        Toastr::success('WeddingStory uplaoded successfully');

        return redirect()->back();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'weddingstory_id' => 'required|integer|exists:wedding_stories,id',
            'title'           => 'required|string|max:200',
            'date'            => 'nullable|date',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $weddingstory = WeddingStory::find($request->weddingstory_id);

        if ($request->hasFile('image')) {

            if ($weddingstory->image && File::exists(public_path($weddingstory->image))) {
                File::delete(public_path($weddingstory->image));
            }

            $imagePath           = ImageService::uploadImage($request->file('image'), '', 'wedding_stories');
            $weddingstory->image = $imagePath;
        }

        $weddingstory->title = $request->title;
        $weddingstory->date  = $request->date;
        $weddingstory->save();

        Toastr::success('Wedding Story updated successfully');

        return redirect()->back();
    }

    public function delete($id) {
        $weddingstory = WeddingStory::findOrFail($id);

        if ($weddingstory->image && File::exists(public_path($weddingstory->image))) {
            File::delete(public_path($weddingstory->image));
        }

        $weddingstory->delete();

        Toastr::success('WeddingStory deleted successfully!', 'Success');

        return redirect()->route('admin.weddingstory.manage', $weddingstory->id);
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'weddingstory_id' => 'required|integer|exists:wedding_stories,id',
            'status'          => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $weddingstory = WeddingStory::find($request->weddingstory_id);
        $weddingstory->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => $request->status ? 'WeddingStory added to front page successfully!' : 'WeddingStory removed from front page successfully!',
        ]);
    }

}
