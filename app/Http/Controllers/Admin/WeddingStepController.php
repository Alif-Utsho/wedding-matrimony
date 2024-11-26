<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\WeddingStep;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WeddingStepController extends Controller {
    public function manage() {
        $show_data = WeddingStep::get();

        return view('backend.weddingstep.manage', compact('show_data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'       => 'required|string|max:200',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath = ImageService::uploadImage($request->file('image'), '', 'wedding_steps');

        WeddingStep::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        Toastr::success('WeddingStep uplaoded successfully');

        return redirect()->back();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'weddingstep_id' => 'required|integer|exists:wedding_steps,id',
            'title'          => 'required|string|max:200',
            'description'    => 'required|string',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $weddingstep = WeddingStep::find($request->weddingstep_id);

        if ($request->hasFile('image')) {

            if ($weddingstep->image && File::exists(public_path($weddingstep->image))) {
                File::delete(public_path($weddingstep->image));
            }

            $imagePath          = ImageService::uploadImage($request->file('image'), '', 'wedding_steps');
            $weddingstep->image = $imagePath;
        }

        $weddingstep->title       = $request->title;
        $weddingstep->description = $request->description;
        $weddingstep->save();

        Toastr::success('Wedding Story updated successfully');

        return redirect()->back();
    }

    public function delete($id) {
        $weddingstep = WeddingStep::findOrFail($id);

        if ($weddingstep->image && File::exists(public_path($weddingstep->image))) {
            File::delete(public_path($weddingstep->image));
        }

        $weddingstep->delete();

        Toastr::success('WeddingStep deleted successfully!', 'Success');

        return redirect()->route('admin.weddingstep.manage', $weddingstep->id);
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'weddingstep_id' => 'required|integer|exists:wedding_steps,id',
            'status'         => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $weddingstep = WeddingStep::find($request->weddingstep_id);
        $weddingstep->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => $request->status ? 'WeddingStep added to front page successfully!' : 'WeddingStep removed from front page successfully!',
        ]);
    }

}
