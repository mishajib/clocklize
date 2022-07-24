<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'image',
        'role',
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

    // Roles
    const ADMIN  = 'admin';
    const MEMBER = 'member';
    public static $roles = [self::ADMIN, self::MEMBER];

    protected $appends = ['total_day_present'];


    // Check user role
    public function hasRole($role): bool
    {
        return auth()->user()->role == $role;
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function getTotalDayPresentAttribute()
    {
        $month = request()->month ?? Carbon::now()->format('Y-m');
        return $this->attendances()->whereMonth('created_at', Carbon::parse($month)->format('m'))
            ->whereYear('created_at', Carbon::parse($month)->format('Y'))->count();
    }
}
