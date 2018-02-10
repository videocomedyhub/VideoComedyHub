<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model implements Transformable {

    use TransformableTrait;
    use Sluggable;

//    protected $table = 'categories';
    public static $rules = [];

    protected $fillable = ['title', 'slug', 'image', 'description', 'seo_title', 'seo_description', 'featured', 'active',];

    public function getPrettyTimeAttribute() {
        $dt = new Carbon($this->created_at);
        return $dt->toFormattedDateString();
    }

    public function videos() {
        return $this->morphedByMany(Video::class, 'categoriable');
    }

    public function channels() {
        return $this->morphedByMany(Channel::class, 'categoriable');
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

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
