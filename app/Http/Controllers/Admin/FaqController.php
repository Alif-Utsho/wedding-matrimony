<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller {

    public function manage() {
        $show_data = FAQ::latest()->get();

        return view('backend.faq.manage', compact('show_data'));
    }

    public function add() {

        return view('backend.faq.add');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:250',
            'answer'   => 'required|string|max:250',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        FAQ::create([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        Toastr::success('FAQ created successfully!', 'Success');

        return redirect()->route('admin.faq.manage');
    }

    public function edit($id) {

        $faq = FAQ::find($id);

        return view('backend.faq.edit', compact('faq'));
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:250',
            'answer'   => 'required|string|max:250',
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->all() as $error) {
                Toastr::error($error, 'Validation Error');
            }

            return back()->withErrors($validator)->withInput();
        }

        $faq = FAQ::find($request->faq_id);

        $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        Toastr::success('FAQ updated successfully!', 'Success');

        return redirect()->route('admin.faq.manage');
    }

    public function delete($id) {

        $faq = FAQ::findOrFail($id);
        $faq->delete();

        Toastr::success('FAQ deleted successfully!', 'Success');

        return redirect()->route('admin.faq.manage');
    }

}
