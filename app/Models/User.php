<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    
    //accessor examples
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function getRoleAttribute($value)
{
    if ($value == 1) {
        return 'Admin';
    } elseif ($value == 0) {
        return 'Customer';
    }

    return $value; // fallback for unexpected values
}

    // mutator examples
   

    public function setRoleAttribute($value)
    {
        if ($value === 'Admin') {
            $this->attributes['role'] = 1;
        } elseif ($value === 'Customer') {
            $this->attributes['role'] = 0;
        } else {
            $this->attributes['role'] = $value; 
        }
    }
    
}
