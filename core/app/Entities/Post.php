<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    protected $fillable = ['user_id', 'title', 'slug', 'image', 'body', 'guest', 'active', 'seo_title' , 'seo_description', 'seo_keywords'];

        /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new Scopes\ActiveScope());
    }
    
    public function user() {
        return $this->belongsTo(App\User::class);
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
