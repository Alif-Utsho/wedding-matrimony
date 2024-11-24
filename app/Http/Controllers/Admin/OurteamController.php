<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Ourteam;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OurteamController extends Controller {
    public function manage() {
        $show_data = Ourteam::latest()->get();

        return view('backend.ourteam.manage', compact('show_data'));
    }

    public function add() {
        return view('backend.ourteam.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:200|unique:ourteams,title',
            'designation' => 'required|string|max:50',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'advisor'     => 'nullable',
            'status'      => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath = ImageService::uploadImage($request->file('image'), '', 'ourteams');

        $ourteam = Ourteam::create([
            'title'       => $request->title,
            'designation' => $request->designation,
            'image'       => $imagePath,
            'advisor'     => $request->boolean('advisor'),
            'status'      => $request->boolean('status'),
        ]);

        Toastr::success('A Team Member created successfully!', 'Success');

        return redirect()->route('admin.ourteam.manage');
    }

    public function edit($id) {
        $ourteam = Ourteam::find($id);

        return view('backend.ourteam.edit', compact('ourteam'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'ourteam_id'  => 'required|integer',
            'title'       => [
                'required',
                'string',
                'max:200',
            ],
            'designation' => 'required|string|max:50',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'advisor'     => 'nullable',
            'status'      => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $ourteam   = Ourteam::find($request->ourteam_id);
        $imagePath = ImageService::uploadImage($request->file('image'), $ourteam->image, 'ourteams');

        $ourteam->update([
            'title'       => $request->title,
            'designation' => $request->designation,
            'image'       => $imagePath,
            'advisor'     => $request->boolean('advisor'),
            'status'      => $request->boolean('status'),
        ]);

        Toastr::success('A Team Member updated successfully!', 'Success');

        return redirect()->route('admin.ourteam.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'ourteam_id' => 'required|integer|exists:ourteams,id',
            'status'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $ourteam = Ourteam::find($request->ourteam_id);
        $ourteam->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status toggled of a Team Member!',
        ]);
    }

    public function delete($id) {
        $ourteam = Ourteam::findOrFail($id);

        if ($ourteam->image && File::exists(public_path($ourteam->image))) {
            File::delete(public_path($ourteam->image));
        }

        $ourteam->delete();

        Toastr::success('A Team Member deleted successfully!', 'Success');

        return redirect()->route('admin.ourteam.manage');
    }

}
