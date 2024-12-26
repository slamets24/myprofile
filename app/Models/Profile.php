<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'about_me',
        'profile_picture',
        'resume_url'
    ];

    public function socialMedia(): HasMany
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function workExperiences(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
