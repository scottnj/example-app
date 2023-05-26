<?php

namespace App\Models;


use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    protected static function booted()
    {
        static::created(function ($project) {
            $project->links()->create([
                'published' => true,
                'title' => 'auto generated',
                'url' => 'https://google.com',
            ]);
        });
    }
}
