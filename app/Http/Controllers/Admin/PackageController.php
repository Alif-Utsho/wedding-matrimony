<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller {
    public function manage() {
        $show_data = Package::latest()->get();

        return view('backend.package.manage', compact('show_data'));
    }

    public function add() {
        $accesses = Access::get();

        return view('backend.package.add', compact('accesses'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:50|unique:packages,name',
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

        $package = Package::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'old_price' => $request->old_price,
            'duration'  => $request->duration,
            'details'   => $request->details,
            'popular'   => $request->boolean('popular') ? 1 : 0,
            'status'    => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $package->accesses()->sync($request->accesses);
        }

        Toastr::success('Package created successfully!', 'Success');

        return redirect()->route('admin.package.manage');
    }

    public function edit($id) {
        $package  = Package::find($id);
        $accesses = Access::get();

        return view('backend.package.edit', compact('package', 'accesses'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:50|unique:packages,name,' . $request->package_id,
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

        $package = Package::findOrFail($request->package_id);

        $package->update([
            'name'      => $request->name,
            'price'     => $request->price,
            'old_price' => $request->old_price,
            'duration'  => $request->duration,
            'details'   => $request->details,
            'popular'   => $request->boolean('popular') ? 1 : 0,
            'status'    => $request->boolean('status') ? 1 : 0,
        ]);

        if ($request->has('accesses')) {
            $package->accesses()->sync($request->accesses);
        } else {
            $package->accesses()->sync([]); // Clear all accesses if none provided
        }

        Toastr::success('Package updated successfully!', 'Success');

        return redirect()->route('admin.package.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|integer|exists:packages,id',
            'status'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $package = Package::find($request->package_id);
        $package->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Package status toggled successfully!',
        ]);
    }

    public function delete($id) {
        $package = Package::findOrFail($id);
        $package->accesses()->detach();
        $package->delete();

        Toastr::success('Package deleted successfully!', 'Success');

        return redirect()->route('admin.package.manage');
    }

}
