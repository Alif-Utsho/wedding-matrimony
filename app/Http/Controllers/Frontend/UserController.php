<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\Message;
use App\Models\User;
use App\Models\UserCareer;
use App\Models\UserHobby;
use App\Models\UserImage;
use App\Models\UserProfile;
use App\Models\UserSocialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;


class UserController extends Controller {
    public function index() {
        return view('frontend.user.dashboard');
    }

    public function profile(){
        $user    = User::find(Auth::guard('user')->id());
        return view('frontend.user.profile', compact('user'));
    }

    public function profileEdit() {
        $user    = User::find(Auth::guard('user')->id());
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('frontend.user.profile-edit', compact('user', 'hobbies'));
    }

    public function profileEditSubmit(Request $request) {
        $userId = Auth::guard('user')->id();
        $user = User::find($userId);

        // Validate the request
        $request->validate([
            'name'         => 'required|string|max:200',
            'gender'       => 'required|string',
            'city_id'      => 'required|string',
            'birth_date'   => 'required|date',
            'height'       => 'required|numeric|min:30|max:300',
            'weight'       => 'required|numeric|min:10|max:300',
            'fathers_name' => 'required|string|max:200',
            'mothers_name' => 'required|string|max:200',
            'address'      => 'required|string|max:255',
            'type'         => 'required|string',
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
            // 'image'        => 'if $user->profile->image == null required else nullable|image|png, jpg, jpeg'
            'image'        => [
                Rule::requiredIf(!$user->profile || !$user->profile->image),
                'nullable',
                'image',
                'mimes:png,jpg,jpeg'
            ]
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $userProfile = UserProfile::where('user_id', $userId)->first();
            if($userProfile){
                $existingImagePath = public_path($userProfile->image);
    
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
            }

            $file = $request->file('image');        
            $destinationPath = public_path('frontend/uploads/profile');         
            $fileName = time() . '_' . $file->getClientOriginalName();        
            $file->move($destinationPath, $fileName);        
            $imagePath = 'frontend/uploads/profile/' . $fileName;
        }

        // Update user_profiles table
        $userProfile = UserProfile::updateOrCreate(
            ['user_id' => $userId],
            [
                'gender'       => $request->gender,
                'city_id'      => $request->city_id,
                'birth_date'   => $request->birth_date,
                'height'       => $request->height,
                'weight'       => $request->weight,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'address'      => $request->address,
                'age'          => $request->age,
                'image'        => $imagePath
            ]
        );

        UserCareer::updateOrCreate(
            ['user_id' => $userId, 'user_profile_id' => $userProfile->id],
            [
                'type'         => $request->type,
                'company_name' => $request->company_name,
                'salary'       => $request->salary,
                'experience'   => $request->experience,
                'degree'       => $request->degree,
                'college'      => $request->college,
                'school'       => $request->school,
            ]
        );

        UserHobby::where('user_profile_id', $userProfile->id)->delete();

        // Add new hobbies
        if ($request->hobbies) {
            foreach ($request->hobbies as $hobbyId) {
                UserHobby::create([
                    'user_id'         => $userId,
                    'user_profile_id' => $userProfile->id,
                    'hobby_id'        => $hobbyId,
                ]);
            }

        }

        UserSocialmedia::updateOrCreate(
            ['user_id' => $userId, 'user_profile_id' => $userProfile->id],
            [
                'whatsApp'  => $request->whatsApp,
                'facebook'  => $request->facebook,
                'instagram' => $request->instagram,
                'youtube'   => $request->youtube,
                'linkedin'  => $request->linkedin,
                'x'         => $request->x,
            ]
        );

        return redirect('/user/profile')->with('success', 'Profile Updated Successfully');
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'images' => [
                'required',
                'array',
                'min:1', 
            ],
            'images.*' => 'image|mimes:png,jpg,jpeg|max:2048', 
        ]);

        $userId = Auth::guard('user')->id();
        $userProfile = UserProfile::where('user_id', $userId)->first();

        if (!$userProfile) {
            return response()->json(['message' => 'User profile not found'], 404);
        }

        foreach ($request->file('images') as $image) {
            $destinationPath = public_path('frontend/uploads/userimages');
            
            $fileName = time() . '_' . $image->getClientOriginalName();

            $image->move($destinationPath, $fileName);

            $imagePath = 'frontend/uploads/userimages/' . $fileName;

            UserImage::create([
                'user_id'        => $userId,
                'user_profile_id'=> $userProfile->id,
                'image'          => $imagePath,
            ]);
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }

    public function deleteImage(Request $request) {
        $id = $request->imageId;
        $userImage = UserImage::findOrFail($id);
        $imagePath = public_path($userImage->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $userImage->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function chatList(Request $request) {
        $userId = Auth::guard('user')->id();

        $receiverIds = Message::where('sender_id', $userId)
                    ->latest()
                    ->pluck('receiver_id')
                    ->unique();
        $senderIds = Message::where('receiver_id', $userId)
                    ->latest()
                    ->pluck('sender_id')
                    ->unique();
        $chatListUserIds = $receiverIds->merge($senderIds)->unique();

        $chatListUsers = User::whereIn('id', $chatListUserIds)->get();

        foreach($chatListUsers as $chatuser){
            $message = Message::where('sender_id', $chatuser->id)->orWhere('receiver_id', $chatuser->id)->latest()->first();
            $chatuser->message = $message;
        }
        $chatListUsers;

        return view('frontend.user.chat-list', compact('chatListUsers'));
    }

    
}
