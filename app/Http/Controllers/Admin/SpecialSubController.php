<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\SpecialPackage;
use App\Models\SpecialPackageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialSubController extends Controller {

    public function manage() {
        $show_data = SpecialPackageCategory::with('specialpackage', 'accesses')->latest()->get();
        // dd($show_data);

        return view('backend.specialcategory.manage', compact('show_data'));
    }

    public function add() {
        $accesses   = Access::get();
        $categories = SpecialPackage::all();

        return view('backend.specialcategory.add', compact('accesses', 'categories'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'special_id' => 'required',
            'price'      => 'required|integer|min:0',
            'old_price'  => 'nullable|integer|min:0',
            'details'    => 'nullable|string',
            'duration'   => 'nullable',
            'accesses'   => 'nullable|array',
            'accesses.*' => 'exists:accesses,id',
            'popular'    => 'nullable',
            'status'     => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $specialPkg = SpecialPackageCategory::create([
            'special_id' => $request->special_id,
            'price'      => $request->price,
            'old_price'  => $request->old_price,
            'details'    => $request->details,
            'duration'   => $request->duration,
            'popular'    => $request->boolean('popular') ? 1 : 0,
            'status'     => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $specialPkg->accesses()->sync($request->accesses);
        }

        Toastr::success('Special Sub Package created successfully!', 'Success');

        return redirect()->route('admin.specialcategory.manage');
    }

    public function edit($id) {

        $specialPackage = SpecialPackageCategory::with('specialpackage', 'accesses')->find($id);

        $categories = SpecialPackage::all();
        $accesses   = Access::get();

        return view('backend.specialcategory.edit', compact('specialPackage', 'categories', 'accesses'));
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'special_id' => 'required',
            'price'      => 'required|integer|min:0',
            'old_price'  => 'nullable|integer|min:0',
            'details'    => 'nullable|string',
            'duration'   => 'nullable',
            'accesses'   => 'nullable|array',
            'accesses.*' => 'exists:accesses,id',
            'popular'    => 'nullable',
            'status'     => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $specialPackage = SpecialPackageCategory::with('specialpackage', 'accesses')->findOrFail($request->id);

        $specialPackage->update([
            'special_id' => $request->special_id,
            'price'      => $request->price,
            'old_price'  => $request->old_price,
            'details'    => $request->details,
            'duration'   => $request->duration,
            'popular'    => $request->boolean('popular') ? 1 : 0,
            'status'     => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $specialPackage->accesses()->sync($request->accesses);
        } else {
            $specialPackage->accesses()->sync([]);
        }

        Toastr::success('Special Sub Package updated successfully!', 'Success');

        return redirect()->route('admin.specialcategory.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|integer',
            'status'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $specialPackage = SpecialPackageCategory::with('specialpackage', 'accesses')->find($request->id);
        $specialPackage->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Special Sub Package status toggled successfully!',
        ]);
    }

    public function delete($id) {
        $specialPackage = SpecialPackageCategory::with('specialpackage', 'accesses')->findOrFail($id);
        $specialPackage->accesses()->detach();
        $specialPackage->delete();

        Toastr::success('Special Sub Package deleted successfully!', 'Success');

        return redirect()->route('admin.specialcategory.manage');
    }

}
