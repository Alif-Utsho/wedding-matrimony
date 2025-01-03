<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\SpecialPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialPackageController extends Controller {

    public function manage() {
        $show_data = SpecialPackage::latest()->get();

        return view('backend.specialpackage.manage', compact('show_data'));
    }

    public function add() {
        $accesses = Access::get();

        return view('backend.specialpackage.add', compact('accesses'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'       => 'nullable',
            'details'    => 'nullable|string',
            'accesses'   => 'nullable|array',
            'accesses.*' => 'exists:accesses,id',
            'status'     => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $specialPkg = SpecialPackage::create([
            'name'    => $request->name,
            'details' => $request->details,
            'status'  => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $specialPkg->accesses()->sync($request->accesses);
        }

        Toastr::success('Special Package created successfully!', 'Success');

        return redirect()->route('admin.specialpkg.manage');
    }

    public function edit($id) {
        $specialPackage = SpecialPackage::with('accesses')->find($id);
        $accesses       = Access::get();

        return view('backend.specialpackage.edit', compact('specialPackage', 'accesses'));
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'       => 'nullable',
            'details'    => 'nullable|string',
            'accesses'   => 'nullable|array',
            'accesses.*' => 'exists:accesses,id',
            'status'     => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $specialPackage = SpecialPackage::with('accesses')->findOrFail($request->id);

        $specialPackage->update([
            'name'    => $request->name,
            'details' => $request->details,
            'status'  => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $specialPackage->accesses()->sync($request->accesses);
        } else {
            $specialPackage->accesses()->sync([]);
        }

        Toastr::success('Special Package updated successfully!', 'Success');

        return redirect()->route('admin.specialpkg.manage');
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

        $specialPackage = SpecialPackage::with('accesses')->find($request->id);
        $specialPackage->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Special Package status toggled successfully!',
        ]);
    }

    public function delete($id) {
        $specialPackage = SpecialPackage::with('accesses')->findOrFail($id);
        $specialPackage->accesses()->detach();
        $specialPackage->delete();

        Toastr::success('Special Package deleted successfully!', 'Success');

        return redirect()->route('admin.specialpkg.manage');
    }

}
