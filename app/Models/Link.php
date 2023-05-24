<?php

namespace App\Models;


use A17\Twill\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    protected $fillable = [
        'published',
        'title',
        'url',
        'project_id',
    ];

}
