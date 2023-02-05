<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class post extends Model
{
    use HasFactory,SoftDeletes,Sluggable;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image',
        'deleted_at',
        'slug',
    ];
    public function sluggable(): array
    {
            return [
                'slug' => [
                    'source' =>'title'
                ]
                ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}


