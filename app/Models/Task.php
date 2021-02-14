<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status'
    ];

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
