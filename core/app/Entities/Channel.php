<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Channel extends Model implements Transformable {

    use TransformableTrait;
    use Sluggable;

    protected $fillable = ['channel_id', 'title', 'slug', 'description', 'region', 'published_at',
        'default_thumbnail', 'medium_thumbnail', 'high_thumbnail', 'active', 'featured', 'user_id', 'seo_title', 'seo_description', 'frequency', 'last_fetched'];

    public function getThumbnailAttribute() {
        if ($this->high_thumbnail)
            return $this->high_thumbnail;
        if ($this->medium_thumbnail)
            return $this->medium_thumbnail;
        return $this->default_thumbnail;
    }

    public function getPrettyTimeAttribute() {
        $dt = new Carbon($this->published_at);
        return $dt->toFormattedDateString();
    }
        public function getAtomTimeAttribute() {
        $dt = new Carbon($this->published_at);
        return $dt->tz('UTC')->toAtomString();
    }

    public function videos() {
        return $this->hasMany('App\Entities\Video');
    }

    public function categories() {
        return $this->morphToMany('App\Entities\Category', 'categoriable');
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function scopeFeatured($query) {
        return $query->where('featured', '1');
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
