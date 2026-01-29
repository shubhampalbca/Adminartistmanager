<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['title', 'file', 'user_id', 'description', 'postable_type', 'postable_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Post author: User, Admin, or Manager (polymorphic).
     */
    public function postable()
    {
        return $this->morphTo();
    }

    /**
     * Author display name (works for User, Admin, Manager).
     */
    public function getAuthorNameAttribute()
    {
        if ($this->postable) {
            return $this->postable->name ?? $this->postable->username ?? 'Unknown';
        }
        if ($this->user) {
            return $this->user->name;
        }
        return 'Unknown';
    }
}
