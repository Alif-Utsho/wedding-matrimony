<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Contactinfo;
use Illuminate\Http\Request;

class ContactinfoController extends Controller {
    public function edit() {
        return view('backend.contactinfo.edit');
    }

    public function update(Request $request) {
        $validatedData = $request->validate([
            'bio'      => 'required|string',
            'email'    => 'required|email|max:255',
            'phone'    => 'required|string|max:30',
            'address'  => 'required|string|max:255',
            'whatsapp' => 'required|string|max:100',
        ]);

        $contactinfo = Contactinfo::whereStatus(true)->first();

        if (!$contactinfo) {
            Toastr::error('Contact infos not found.');

            return redirect()->back();
        }

        $contactinfo->bio      = $request->bio;
        $contactinfo->email    = $request->email;
        $contactinfo->phone    = $request->phone;
        $contactinfo->address  = $request->address;
        $contactinfo->whatsapp = $request->whatsapp;

        $contactinfo->save();

        Toastr::success('Contact infos updated successfully.');

        return redirect()->back();
    }

}
