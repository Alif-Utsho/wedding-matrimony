<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackagePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller {
    public function manage() {
        $show_data = Package::latest()->get();

        return view('backend.package.manage', compact('show_data'));
    }

    public function add() {

        return view('backend.package.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:50|unique:packages,name',
            'popular' => 'nullable',
            'status'  => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        Package::create([
            'name'    => $request->name,
            'popular' => $request->boolean('popular') ? 1 : 0,
            'status'  => $request->boolean('status') ? 1 : 0,
        ]);

        Toastr::success('Package created successfully!', 'Success');

        return redirect()->route('admin.package.manage');
    }

    public function edit($id) {
        $package = Package::find($id);

        return view('backend.package.edit', compact('package'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:50,' . $request->package_id,
            'popular' => 'nullable',
            'status'  => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $package = Package::findOrFail($request->package_id);

        $package->update([
            'name'    => $request->name,
            'popular' => $request->boolean('popular') ? 1 : 0,
            'status'  => $request->boolean('status') ? 1 : 0,
        ]);

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
        $package->delete();

        Toastr::success('Package deleted successfully!', 'Success');

        return redirect()->route('admin.package.manage');
    }

    public function PackagePaymentList() {
        $payment_list = PackagePayment::with('user')->get();

        return view('backend.package.payment', compact('payment_list'));
    }

}
