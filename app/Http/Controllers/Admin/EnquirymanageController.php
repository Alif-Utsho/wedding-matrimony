<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquirymanageController extends Controller
{
    public function manage(){
        $show_data = Enquiry::latest()->get();

        return view('backend.enquiry.manage', compact('show_data'));
    }
}
