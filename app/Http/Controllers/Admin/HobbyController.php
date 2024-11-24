<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HobbyController extends Controller
{
    public function manage() {
        $show_data = Hobby::latest()->get();

        return view('backend.hobby.manage', compact('show_data'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        Hobby::create([
            'name' => $request->name,
        ]);

        Toastr::success('Hobby created successfully');
        return redirect()->back();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'hobby_id'    => 'required|integer|exists:hobbies,id',
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $hobby = Hobby::find($request->hobby_id);
        $hobby->update(['name' => $request->name]);

        Toastr::success('Hobby updated successfully');
        return redirect()->back();
    }

    public function delete($id) {
        $hobby = Hobby::findOrFail($id);

        $hobby->delete();

        Toastr::success('Hobby deleted successfully!', 'Success');
        return redirect()->route('admin.hobby.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'hobby_id'    => 'required|integer|exists:hobbies,id',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $hobby = Hobby::find($request->hobby_id);
        $hobby->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status toggled successfully!',
        ]);
    }
}
