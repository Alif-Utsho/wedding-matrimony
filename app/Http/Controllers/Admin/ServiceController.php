<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceController extends Controller {
    public function manage() {
        $show_data = Service::latest()->get();

        return view('backend.service.manage', compact('show_data'));
    }

    public function add() {
        return view('backend.service.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:200|unique:services,name',
            'title'  => 'required|string|max:100',
            'image'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'icon'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link'   => 'required|string',
            'status' => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $imagePath       = ImageService::uploadImage($request->file('image'), '', 'services');
        $authorImagePath = ImageService::uploadImage($request->file('icon'), '', 'services');

        $service = Service::create([
            'name'   => $request->name,
            'title'  => $request->title,
            'link'   => $request->link,
            'image'  => $imagePath,
            'icon'   => $authorImagePath,
            'status' => $request->boolean('status'),
        ]);

        if ($request->has('tags')) {
            $service->tags()->sync($request->tags);
        }

        Toastr::success('Service created successfully!', 'Success');

        return redirect()->route('admin.service.manage');
    }

    public function edit($id) {
        $service = Service::find($id);

        return view('backend.service.edit', compact('service'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|integer',
            'name'       => [
                'required',
                'string',
                'max:200',
                Rule::unique('services', 'name')->ignore($request->service_id),
            ],
            'title'      => 'required|string|max:100',
            'link'       => 'required|string',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'icon'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'     => 'nullable',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $service         = Service::find($request->service_id);
        $imagePath       = ImageService::uploadImage($request->file('image'), $service->image, 'services');
        $authorImagePath = ImageService::uploadImage($request->file('icon'), $service->icon, 'services');

        $service->update([
            'name'   => $request->name,
            'title'  => $request->title,
            'link'   => $request->link,
            'image'  => $imagePath,
            'icon'   => $authorImagePath,
            'status' => $request->boolean('status'),
        ]);

        if ($request->has('tags')) {
            $service->tags()->sync($request->tags);
        }

        Toastr::success('Service updated successfully!', 'Success');

        return redirect()->route('admin.service.manage');
    }

    public function togglestatus(Request $request) {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|integer|exists:services,id',
            'status'     => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided.',
            ], 422);
        }

        $service = Service::find($request->service_id);
        $service->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => $request->status ? 'Service added to front page successfully!' : 'Service removed from front page successfully!',
        ]);
    }

    public function delete($id) {
        $service = Service::findOrFail($id);

        if ($service->image && File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }

        if ($service->icon && File::exists(public_path($service->icon))) {
            File::delete(public_path($service->icon));
        }

        $service->delete();

        Toastr::success('Service deleted successfully!', 'Success');

        return redirect()->route('admin.service.manage');
    }

}
