<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller {
    public function manage() {
        $show_data = City::latest()->get();

        return view('backend.city.manage', compact('show_data'));
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

        City::create([
            'name' => $request->name,
        ]);

        Toastr::success('City created successfully');

        return redirect()->back();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|integer|exists:cities,id',
            'name'    => 'required|string',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $city = City::find($request->city_id);
        $city->update(['name' => $request->name]);

        Toastr::success('City updated successfully');

        return redirect()->back();
    }

    public function delete($id) {
        $city = City::findOrFail($id);

        $city->delete();

        Toastr::success('City deleted successfully!', 'Success');

        return redirect()->route('admin.city.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|integer|exists:cities,id',
            'status'  => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $city = City::find($request->city_id);
        $city->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status toggled successfully!',
        ]);
    }

}
