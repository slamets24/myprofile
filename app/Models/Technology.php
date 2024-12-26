<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    protected $fillable = [
        'name',
        'category'
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_technology')
            ->withTimestamps();
    }
}
