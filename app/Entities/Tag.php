<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model implements Transformable {

    use TransformableTrait;
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    public function videos() {
        return $this->morphedByMany(Video::class, 'taggable');
    }

    public function channels() {
        return $this->morphedByMany(Channel::class, 'taggable');
    }

    public function categories() {
        return $this->morphedByMany(Category::class, 'taggable');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
