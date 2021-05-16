<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Task extends Model
{
    use HasFactory;

    /**
     * append attibute to every model
     * 
     * @var array
     */
    protected $appends = ['file_url'];

    /**
     * hide attribute from all models
     */
    protected $hidden = ['media'];

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

    /**
     * get the task image's
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }


    /**
     * get media urls
     * 
     */
    public function getFileUrlAttribute()
    {
        $media =  $this->media->map(function ($item, $key) {
            return Storage::disk(UPLOAD_DISK)->url($item->path);
        })->all();

        return $media;
    }


    public static function boot()
    {
        parent::boot();
        self::deleting(function ($task) { 
            $task->media()->each(function ($media) {
                $media->delete();
            });
        });
    }
}
