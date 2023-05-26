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

            /*
             * TODO: When this code is run, the new link database entry has the
             *       correct project_id set, but also has a deleted_at value set.
             * */
            $project->links()->create([
                'published' => true,
                'title' => 'auto generated',
                'url' => 'https://google.com',
            ]);

            /*
             * TODO: When this code is run:
             *       - When the project_id line is included, the new link
             *         database entry has the correct project_id set, but
             *         also has a deleted_at value set.
             *       - When the project_id line is commented out,
             *         the project_id is null, and the deleted_at is null.
             * */

//            $link = Link::make();
//            $link->published = true;
//            $link->title = 'generated title';
//            $link->url = 'https://google.com';
//            $link->project_id = $project->id;
//            $link->save();

            /*
             * TODO: restore doesn't seem to work here.
             * */
//            Link::withTrashed()->where('project_id', $project->id)->restore();

        });
    }

}
