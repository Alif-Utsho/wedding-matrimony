<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function currentPackage()
    {
        $userPackage = $this->hasOne(UserPackage::class)
            ->where('expired_at', '>', now())
            ->with('package')
            ->first();

        if (!$userPackage) {
            $defaultPackage = Package::where('price', 0)->first();
            return $defaultPackage;
        }

        return $userPackage->package;
    }

    public function assignPackage($package)
    {
        return $this->userPackages()->create([
            'package_id' => $package->id,
            'expired_at' => now()->addDays($package->duration),
        ]);
    }

    public function hasAccessTo($feature)
    {
        $package = $this->currentPackage();
        $accesses = $package ? $package->accesses->pluck('name')->toArray() : [];

        return in_array($feature, $accesses);
    }
}
