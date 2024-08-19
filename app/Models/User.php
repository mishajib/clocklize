<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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
