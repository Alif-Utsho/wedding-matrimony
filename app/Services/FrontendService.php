<?php

namespace App\Services;

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontendService
{

    public function getUsers($data){
        $userQuery = User::whereStatus(true)->latest()->whereHas('profile');

        if(Auth::guard('user')->check()) {
            $userQuery->where('id', '<>', Auth::guard('user')->id());
        } elseif(Auth::guard('api')->check()) {
            $userQuery->where('id', '<>', Auth::guard('api')->id());
        }

        if (!empty($data['gender'])) {
            $gender = $data['gender'];
            $userQuery->whereHas('profile', function($query) use ($gender) {
                $query->where('gender', $gender);
            });
        }

        if (!empty($data['religion'])) {
            $religion = $data['religion'];
            $userQuery->whereHas('profile', function($query) use ($religion) {
                $query->where('religion', $religion);
            });
        }
    
        if (!empty($data['age_range'])) {
            $ageRange = explode('-to-', $data['age_range']);
            if (count($ageRange) == 2) {
                $minAge = $ageRange[0];
                $maxAge = $ageRange[1];

                $userQuery->whereHas('profile', function($query) use ($minAge, $maxAge) {
                    $query->whereBetween('age', [$minAge, $maxAge]);
                });
            }
        }
    
        if (!empty($data['location'])) {
            $city = City::where('name', $data['location'])->first();
            if($city){
                $userQuery->whereHas('profile', function($query) use ($city) {
                    $query->where('city_id', $city->id);
                });
            }
        }

        return $users = $userQuery->where('profile_visibility', '<>', 'no-visible')->limit(100)->get();
    }
}
