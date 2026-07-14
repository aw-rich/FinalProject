<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    /** @use HasFactory<\Database\Factories\IdeaFactory> */
    use HasFactory;

    protected $casts = [
        'links' => AsarrayObject::class,
        'status' => IdeaStatus::class,
    ];

    public funtion user()
    {
        return $this->belongsTo(User::class);
    }
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }
}

