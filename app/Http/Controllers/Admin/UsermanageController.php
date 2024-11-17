<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsermanageController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function manage(){
        $users = User::latest()->get();

        return view('backend.user.manage', compact('users'));
    }

    public function add(){
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('backend.user.add', compact('hobbies'));
    }

    public function store(Request $request){
        $request->validate([
            'name'         => 'required|string|max:200',
            'email'        => 'required|email|string',
            'password'     => 'required|string',
            'gender'       => 'required|string',
            'city_id'      => 'required|string',
            'religion'     => 'required|string',
            'birth_date'   => 'required|date',
            'height'       => 'required|numeric|min:30|max:300',
            'weight'       => 'required|numeric|min:10|max:300',
            'fathers_name' => 'required|string|max:200',
            'mothers_name' => 'required|string|max:200',
            'address'      => 'required|string|max:255',
            'type'         => 'required|string',
            'phone'        => 'nullable|string|min:10|max:20',
            'company_name' => 'nullable|string|max:200',
            'salary'       => 'nullable|string|max:20',
            'experience'   => 'nullable|string|max:20',
            'degree'       => 'nullable|string|max:200',
            'college'      => 'nullable|string|max:200',
            'school'       => 'nullable|string|max:200',
            'whatsApp'     => 'nullable|string|max:200',
            'facebook'     => 'nullable|string|max:200',
            'instagram'    => 'nullable|string|max:200',
            'x'            => 'nullable|string|max:200',
            'youtube'      => 'nullable|string|max:200',
            'linkedin'     => 'nullable|string|max:200',
            'hobbies'      => 'nullable|array',
            'image'        => [
                'required',
                'image',
                'mimes:png,jpg,jpeg'
            ]
        ]);
        $user = $this->userService->createUser($request->all());

        $this->userService->updateUserProfile($request->all(), $user);

        Toastr::success('User Created Successfully');
        return redirect()->route('admin.user.manage');
    }
}
