<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task(){
        return $this->hasMany(Task::class, 'user_id');
    }

    /**
     * Get the created_at date
     * @param date $value
     * @return date 
     */
    public function getCreatedAtAttribute($value)
    {
        return ($value) ? date('Y-m-d H:i:s', strtotime($value)) : $value;
    }

    /**
     * Get the updated_at date
     * @param date $value
     * @return date 
     */
    public function getUpdatedAtAttribute($value)
    {
        return ($value) ? date('Y-m-d H:i:s', strtotime($value)) : $value;
    }
}
