<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
//use Sluggable;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model implements Transformable {

    use TransformableTrait;
    use Sluggable;

    protected $fillable = ['user_id', 'title', 'slug', 'body', 'active', 'seo_title', 'seo_description', 'seo_keywords', 'position'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot() {
        parent::boot();

        static::addGlobalScope(new Scopes\ActiveScope());
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
