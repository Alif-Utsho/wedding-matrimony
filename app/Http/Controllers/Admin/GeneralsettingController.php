<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Services\ImageService;
use Illuminate\Http\Request;

class GeneralsettingController extends Controller {
    public function edit() {
        return view('backend.generalsetting.edit');
    }

    public function update(Request $request) {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'favicon'     => 'nullable|mimes:jpeg,png,jpg,ico|max:1024',
        ]);

        $generalsetting = GeneralSetting::whereStatus(true)->first();

        if (!$generalsetting) {
            Toastr::error('General settings not found.');

            return redirect()->back();
        }

        $generalsetting->name          = $request->name;
        $generalsetting->email         = $request->email;
        $generalsetting->phone         = $request->phone;
        $generalsetting->address       = $request->address;
        $generalsetting->fb_link       = $request->fb_link;
        $generalsetting->linkedin_link = $request->linkedin_link;
        $generalsetting->x_link        = $request->x_link;
        $generalsetting->youtube_link  = $request->youtube_link;
        $generalsetting->description   = $request->description;

        $generalsetting->logo = ImageService::uploadImage(
            $request->file('logo'),
            $generalsetting->logo,
            "general_settings"
        );

        $generalsetting->favicon = ImageService::uploadImage(
            $request->file('favicon'),
            $generalsetting->favicon,
            "general_settings"
        );

        $generalsetting->save();

        Toastr::success('General settings updated successfully.');

        return redirect()->back();
    }

}
