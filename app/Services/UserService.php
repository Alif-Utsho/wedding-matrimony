<?php

namespace App\Services;

use App\Models\City;
use App\Models\ProfileLike;
use App\Models\ProfileView;
use App\Models\User;
use App\Models\UserCareer;
use App\Models\UserHobby;
use App\Models\UserImage;
use App\Models\UserPreference;
use App\Models\UserProfile;
use App\Models\UserSocialmedia;
use App\Models\UserVerification;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService {

    public function createUser(array $data): User {
        $slug      = Str::slug($data['name']);
        $userExist = User::where('slug', $slug)->count();

        if ($userExist) {
            $slug .= '-' . ($userExist + 1);
        }

        return User::create([
            'name'        => $data['name'],
            'slug'        => $slug,
            'email'       => $data['email'],
            'phone'       => $data['phone'],
            'profile_for' => $data['profile_for'],
            'password'    => Hash::make($data['password']),
        ]);
    }

    public function updateUser($data, $user) {
        $updated_user = User::where('id', $user->id)->update([
            'name'  => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        return $updated_user;
    }

    public function updateUserProfile($data, $user) {
        // Process image if uploaded

        $imagePath   = null;
        $editProfile = UserProfile::where('user_id', $user->id)->first();

        if (isset($data['image']) && $data['image']->isValid()) {

            if ($editProfile && $editProfile->image) {
                $existingImagePath = public_path($editProfile->image);

                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }

            }

            $file            = $data['image'];
            $destinationPath = public_path('frontend/uploads/profile');
            $fileName        = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $imagePath = 'frontend/uploads/profile/' . $fileName;
        }

        // Update or create user profile
        $userProfile = UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender'         => $data['gender'],
                'city_id'        => $data['city_id'],
                'religion'       => $data['religion'],
                'language'       => $data['language'],
                'birth_date'     => $data['birth_date'],
                'height'         => $data['height'],
                'weight'         => $data['weight'],
                'fathers_name'   => $data['fathers_name'],
                'mothers_name'   => $data['mothers_name'],
                'address'        => $data['address'],
                'marital_status' => $data['marital_status'] ?? null,
                'age'            => $data['age'] ?? null,
                'image'          => $imagePath ?? $editProfile->image ?? null,
            ]
        );

        // Update or create user career
        UserCareer::updateOrCreate(
            ['user_id' => $user->id, 'user_profile_id' => $userProfile->id],
            [
                'type'         => $data['type'],
                'company_name' => $data['company_name'],
                'salary'       => $data['salary'],
                'experience'   => $data['experience'],
                'degree'       => $data['degree'],
                'college'      => $data['college'],
                'school'       => $data['school'],
            ]
        );

        // Update hobbies

        $hobbies = $data['hobbies'] ?? [];

        if (isset($hobbies[0]) && is_string($hobbies[0])) {
            $hobbies = explode(',', $hobbies[0]);
        }

        if (!empty($hobbies)) {

            UserHobby::where('user_profile_id', $userProfile->id)->delete();

            foreach ($hobbies as $hobbyId) {

                $hobbyId = (int) $hobbyId;

                if ($hobbyId > 0) {
                    UserHobby::create([
                        'user_id'         => $user->id,
                        'user_profile_id' => $userProfile->id,
                        'hobby_id'        => $hobbyId,
                    ]);
                }

            }

        }

        // Update social media links
        UserSocialmedia::updateOrCreate(
            ['user_id' => $user->id, 'user_profile_id' => $userProfile->id],
            [
                'whatsApp'  => $data['whatsApp'],
                'facebook'  => $data['facebook'],
                'instagram' => $data['instagram'],
                'youtube'   => $data['youtube'],
                'linkedin'  => $data['linkedin'],
                'x'         => $data['x'],
            ]
        );

        return $userProfile;
    }

    public function uploadProfileImages($images, $userId) {
        $userProfile = UserProfile::where('user_id', $userId)->first();

        $counter = 0;

        foreach ($images as $image) {
            $destinationPath = public_path('frontend/uploads/userimages');

            $fileName = time() . '_' . $image->getClientOriginalName();

            $image->move($destinationPath, $fileName);

            $imagePath = 'frontend/uploads/userimages/' . $fileName;

            UserImage::create([
                'user_id'         => $userId,
                'user_profile_id' => $userProfile->id,
                'image'           => $imagePath,
            ]);
            $counter++;
        }

        return $counter;
    }

    public function deleteImage($id) {
        try {
            $userImage = UserImage::findOrFail($id);
            $imagePath = public_path($userImage->image);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $userImage->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    public function getUsers($data) {

        $userQuery = User::whereStatus(true)->latest()->whereHas('profile');

        if (Auth::guard('user')->check()) {
            $userQuery->where('id', '<>', Auth::guard('user')->id());
        } elseif (Auth::guard('api')->check()) {
            $userQuery->where('id', '<>', Auth::guard('api')->id());
        }

        if (!empty($data['gender'])) {
            $gender = $data['gender'];
            $userQuery->whereHas('profile', function ($query) use ($gender) {
                $query->where('gender', $gender);
            });
        }

        if (!empty($data['religion'])) {
            $religion = $data['religion'];
            $userQuery->whereHas('profile', function ($query) use ($religion) {
                $query->where('religion', $religion);
            });
        }

        if (!empty($data['marital_status'])) {
            $marital_status = $data['marital_status'];
            $userQuery->whereHas('profile', function ($query) use ($marital_status) {
                $query->where('marital_status', $marital_status);
            });
        }

        if (!empty($data['age_range'])) {
            $ageRange = explode('-to-', $data['age_range']);

            if (count($ageRange) == 2) {
                $minAge = $ageRange[0];
                $maxAge = $ageRange[1];

                $userQuery->whereHas('profile', function ($query) use ($minAge, $maxAge) {
                    $query->whereBetween('age', [$minAge, $maxAge]);
                });
            }

        }

        if (!empty($data['location'])) {
            $city = City::where('name', $data['location'])->first();

            if ($city) {
                $userQuery->whereHas('profile', function ($query) use ($city) {
                    $query->where('city_id', $city->id);
                });
            }

        }

        if (!empty($data['height_range'])) {
            $heightRange = explode('-to-', $data['height_range']);

            if (count($heightRange) == 2) {
                $minHeight = $heightRange[0];
                $maxHeight = $heightRange[1];

                $userQuery->whereHas('profile', function ($query) use ($minHeight, $maxHeight) {
                    $query->whereBetween('height', [$minHeight, $maxHeight]);
                });
            }

        }

        if (!empty($data['jobtype'])) {
            $jobtype = $data['jobtype'];
            $userQuery->whereHas('profile.career', function ($query) use ($jobtype) {
                $query->where('type', $jobtype);
            });
        }

        if (!empty($data['college']) && $data['college'] > 0) {

            $userQuery->whereHas('profile.career', function ($query) {

                $query->where('college', '>', 0);

            });

        }

        if (!empty($data['college']) && $data['college'] > 0) {

            $users = $userQuery->get()->filter(function ($user) {
                return $user->where('college', '>', 0);
            });
        }

        if (!empty($data['degree']) && $data['degree'] > 0) {

            $users = $userQuery->get()->filter(function ($user) {
                return $user->where('degree', '>', 0);
            });
        }

        if (!empty($data['filtered_me']) && $data['filtered_me']) {
            $userId = Auth::guard('api')->check() ? Auth::guard('api')->id() : Auth::guard('user')->id();

            if ($userId) {
                $viewerIds = ProfileView::where('user_id', $userId)->pluck('viewer_id');

                $userQuery->whereIn('id', $viewerIds);
            }

        }

        if (!empty($data['already_viewed']) && $data['already_viewed']) {
            $viewerId = Auth::guard('api')->check() ? Auth::guard('api')->id() : Auth::guard('user')->id();

            if ($viewerId) {
                $userIds = ProfileView::where('viewer_id', $viewerId)->pluck('user_id');

                $userQuery->whereIn('id', $userIds);
            }

        }

        if (!empty($data['availability'])) {
            $availability = $data['availability'];

            if ($availability === 'online') {
                $userQuery->where('active_status', true);
            } elseif ($availability === 'offline') {
                $userQuery->where('active_status', false);
            }

        }

        if (!empty($data['profiletype'])) {
            $profiletype = $data['profiletype'];

            if ($profiletype === 'premium') {
                $users = $userQuery->get()->filter(function ($user) {
                    return $user->isPremium();
                });
            } elseif ($profiletype === 'free') {
                $users = $userQuery->get()->filter(function ($user) {
                    return !$user->isPremium();
                });
            } else {
                $users = $userQuery->where('profile_visibility', '<>', 'no-visible')->limit(100)->get();
            }

        } else {
            $users = $userQuery->where('profile_visibility', '<>', 'no-visible')->limit(100)->get();
        }

        return $users;
    }

    public function updateSetting($settingKey, $settingValue, $userId) {
        $user = User::find($userId);

        $user->$settingKey = $settingValue;
        $user->save();

        return [
            'success' => true,
            'message' => ucfirst(str_replace('_', ' ', $settingKey)) . ' updated successfully!',
        ];
    }

    public function getMatchingUsers($userId) {
        $userProfile = UserProfile::where('user_id', $userId)->first();

        $oppositeGender = $userProfile->gender === 'Male' ? 'Female' : 'Male';

        $cityId = $userProfile->city_id;

        if ($userProfile->gender === 'Male') {
            $ageMax    = $userProfile->age;
            $heightMax = $userProfile->height;
        } else {
            $ageMin    = $userProfile->age;
            $heightMin = $userProfile->height;
        }

        $query = UserProfile::where('user_id', '!=', $userId)
        // ->where('city_id', $cityId)
            ->where('gender', $oppositeGender)
            ->where('religion', $userProfile->religion);

        if ($userProfile->gender === 'Male') {
            $query->where('age', '<', $ageMax)
                ->where('height', '<', $heightMax);
        } else {
            $query->where('age', '>', $ageMin)
                ->where('height', '>', $heightMin);
        }

        $matchingProfiles = $query->pluck('user_id');

        $matchingUsers = User::with('profile', 'profile.career')->whereIn('id', $matchingProfiles)->where('profile_visibility', '<>', 'no-visible')->inRandomOrder()->get();

        return $matchingUsers;
    }

    public function getMatchingProfiles_pro($userId) {
        $userProfile     = UserProfile::where('user_id', $userId)->first();
        $userPreferences = $userProfile->preferences;

        $query = UserProfile::query()->where('user_id', '!=', $userId);

        if ($userPreferences->preferred_gender) {
            $query->where('gender', $userPreferences->preferred_gender);
        }

        if ($userPreferences->preferred_city_id) {
            $query->where('city_id', $userPreferences->preferred_city_id);
        }

        if ($userPreferences->preferred_min_age && $userPreferences->preferred_max_age) {
            $query->whereBetween('age', [$userPreferences->preferred_min_age, $userPreferences->preferred_max_age]);
        }

        if ($userPreferences->preferred_min_height && $userPreferences->preferred_max_height) {
            $query->whereBetween('height', [$userPreferences->preferred_min_height, $userPreferences->preferred_max_height]);
        }

        $matchingProfiles = $query->with(['user', 'hobbies'])->get();

        $matchingProfiles = $matchingProfiles->map(function ($profile) use ($userPreferences) {
            $score = 0;

            if ($profile->gender == $userPreferences->preferred_gender) {
                $score += 10;
            }

            if ($profile->city_id == $userPreferences->preferred_city_id) {
                $score += 15;
            }

            if (in_array($profile->hobby_id, $userPreferences->hobbies)) {
                $score += 5;
            }

            // $profile->match_score = $score;

            return $profile;
        })->sortByDesc('match_score');

        return response()->json($matchingProfiles);
    }

    public function getProfileCompletion($userId) {
        $userProfile     = UserProfile::where('user_id', $userId)->first();
        $userCareer      = UserCareer::where('user_id', $userId)->first();
        $userSocialmedia = UserSocialmedia::where('user_id', $userId)->first();
        $userHobbies     = UserHobby::where('user_id', $userId)->exists();

        // Define fields to check for completion
        $fields = [
            'name'         => Auth::guard('user')->user()->name,
            'gender'       => $userProfile->gender ?? null,
            'city_id'      => $userProfile->city_id ?? null,
            'birth_date'   => $userProfile->birth_date ?? null,
            'height'       => $userProfile->height ?? null,
            'weight'       => $userProfile->weight ?? null,
            'fathers_name' => $userProfile->fathers_name ?? null,
            'mothers_name' => $userProfile->mothers_name ?? null,
            'address'      => $userProfile->address ?? null,
            'image'        => $userProfile->image ?? null,
            'type'         => $userCareer->type ?? null,
            'company_name' => $userCareer->company_name ?? null,
            'salary'       => $userCareer->salary ?? null,
            'experience'   => $userCareer->experience ?? null,
            'degree'       => $userCareer->degree ?? null,
            'college'      => $userCareer->college ?? null,
            'school'       => $userCareer->school ?? null,
            'whatsApp'     => $userSocialmedia->whatsApp ?? null,
            'facebook'     => $userSocialmedia->facebook ?? null,
            'instagram'    => $userSocialmedia->instagram ?? null,
            'x'            => $userSocialmedia->x ?? null,
            'youtube'      => $userSocialmedia->youtube ?? null,
            'linkedin'     => $userSocialmedia->linkedin ?? null,
            'hobbies'      => $userHobbies ? 'filled' : null,
        ];

        // Count completed fields
        $completedFields = array_filter($fields, fn($value) => !empty($value));
        $totalFields     = count($fields);
        $completedCount  = count($completedFields);

        // Calculate percentage
        $completionPercentage = ($completedCount / $totalFields) * 100;

        return round($completionPercentage);
    }

    public function toggleLike($userId, $likerId) {
        $alreadyLiked = ProfileLike::where('user_id', $userId)
            ->where('liker_id', $likerId)
            ->exists();

        if (!$alreadyLiked) {
            ProfileLike::create([
                'user_id'  => $userId,
                'liker_id' => $likerId,
            ]);

            return ['message' => 'Profile liked'];
        } else {
            ProfileLike::where('user_id', $userId)->where('liker_id', $likerId)->delete();

            return ['message' => 'Profile unliked'];
        }

    }

    public function listLikedProfiles($likerId) {
        $likedProfiles = ProfileLike::with('user')
            ->where('liker_id', $likerId)
            ->get();

        return $likedProfiles;
    }

    public function verifySubmit($userId, $data) {
        try {
            $imagePath     = ImageService::uploadImage($data["image"], "", "verification");
            $imageBackPath = ImageService::uploadImage($data["image_back"], "", "verification");
            UserVerification::create([
                'user_id'    => $userId,
                'name'       => 'NID',
                'image'      => $imagePath,
                'image_back' => $imageBackPath,
            ]);

            User::find($userId)->update(['verified' => 0]);

            return true;
        } catch (Exception $ex) {
            return false;
        }

    }

    public function downloadProfilePdf($userId) {
        $user        = User::findOrFail($userId);
        $profile     = UserProfile::where('user_id', $userId)->first();
        $career      = UserCareer::where('user_id', $userId)->first();
        $hobbies     = UserHobby::where('user_id', $userId)->with('hobby')->get();
        $socialmedia = UserSocialmedia::where('user_id', $userId)->first();

        $pdf = Pdf::loadView('pdf.profile', [
            'user'        => $user,
            'profile'     => $profile,
            'career'      => $career,
            'hobbies'     => $hobbies,
            'socialmedia' => $socialmedia,
        ]);

        return $pdf->download($user->name . '.pdf');
    }

    public function updatePreference($data, $userId) {
        $user = User::findOrFail($userId);

        $preferences = UserPreference::updateOrCreate(
            ['user_id' => $userId],
            $data
        );

        return $preferences;
    }

}
