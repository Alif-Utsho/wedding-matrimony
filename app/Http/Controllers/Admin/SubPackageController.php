<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Package;
use App\Models\SubPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubPackageController extends Controller {
    public function manage() {
        $show_data = SubPackage::with('package', 'package.accesses')->latest()->get();

        return view('backend.subpackage.manage', compact('show_data'));
    }

    public function add() {
        $accesses = Access::get();
        $packages = Package::all();

        return view('backend.subpackage.add', compact('accesses', 'packages'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'price'      => 'required|integer|min:0',
            'old_price'  => 'nullable|integer|min:0',
            'duration'   => 'required|integer|min:1',
            'details'    => 'nullable|string',
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

        $subPackage = SubPackage::create([
            'package_id' => $request->package_id,
            'price'      => $request->price,
            'old_price'  => $request->old_price,
            'duration'   => $request->duration,
            'details'    => $request->details,
            'popular'    => $request->boolean('popular') ? 1 : 0,
            'status'     => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $subPackage->accesses()->sync($request->accesses);
        }

        Toastr::success('Sub Package created successfully!', 'Success');

        return redirect()->route('admin.subpackage.manage');
    }

    public function edit($id) {
        $subPackage = SubPackage::with('package', 'package.accesses')->find($id);
        $packages   = Package::all();
        $accesses   = Access::get();

        return view('backend.subpackage.edit', compact('subPackage', 'packages', 'accesses'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'price'      => 'required|integer|min:0',
            'old_price'  => 'nullable|integer|min:0',
            'duration'   => 'required|integer|min:1',
            'details'    => 'nullable|string',
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

        $subPackage = SubPackage::with('package', 'package.accesses')->findOrFail($request->sub_package_id);

        $subPackage->update([
            'package_id' => $request->package_id,
            'price'      => $request->price,
            'old_price'  => $request->old_price,
            'duration'   => $request->duration,
            'details'    => $request->details,
            'popular'    => $request->boolean('popular') ? 1 : 0,
            'status'     => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $subPackage->package->accesses()->sync($request->accesses);
        } else {
            $subPackage->package->accesses()->sync([]);
        }

        Toastr::success('Sub Package updated successfully!', 'Success');

        return redirect()->route('admin.subpackage.manage');
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

        $package = SubPackage::with('package')->find($request->sub_package_id);
        $package->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Sub Package status toggled successfully!',
        ]);
    }

    public function delete($id) {
        $package = SubPackage::findOrFail($id);
        $package->accesses()->detach();
        $package->delete();

        Toastr::success('Sub Package deleted successfully!', 'Success');

        return redirect()->route('admin.subpackage.manage');
    }

}
