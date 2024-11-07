<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
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

    public function roleName(){
        return $this->belongsTo(Roles::class,'role','id');
        
    }

    public function hasRole($role): bool
    {
        return $this->roleName->name === $role;
    }

    public function hasPermission($permission){

        $role = Roles::where('id', $this->role)->first();
        return $role->hasPermission($permission);
    }

    public function posts(){
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function userDetails(){
        return $this->hasOne(UserDetails::class);
    }

    public function user_login_details(){
        return $this->hasMany(UserLogin::class)->orderBy('created_at', 'desc');
    }
}
