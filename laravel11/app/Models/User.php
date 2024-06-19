<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        'password',
        'role'
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

    public function canLogin(string $email, string $pass): bool {
        return auth()->attempt(['email' => $email, 'password' => $pass]);
    }

    public function logout() {
        auth()->logout();
    }

    public function getAuthUser() {
        return auth()->user();
    }

    public function isAuthenticated() {
        return auth()->check();
    }

    public function userExist(string $email) {
        return  User::where('email', $email)->exists();
    }

    public function createUser(string $name, string $email, string $pass) {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($pass);
        $user->role = 'member';
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
