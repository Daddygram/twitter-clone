<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $with = [
        'user',
        'comments.user'
    ];
    protected $withCount = [
        'likes'
    ];
    protected $fillable = [
        'user_id',
        'tweet',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }
}
