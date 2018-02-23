<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Video extends Model implements Transformable {

    use TransformableTrait;
    use Sluggable;

    protected $fillable = [
        'video_id',
        'title',
        'slug',
        'description',
        'channel_id',
        'duration',
        'default_thumbnail',
        'medium_thumbnail',
        'high_thumbnail',
        'active',
        'featured',
        'published_at',
        'seo_title',
        'seo_description',
        'platform', // default is youtube
        'count', // this is diff from watched, since only loggedin users  uses watched
//        '', '',
    ];

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

    public function getThumbnailAttribute() {
        if ($this->high_thumbnail)
            return $this->high_thumbnail;
        if ($this->medium_thumbnail)
            return $this->medium_thumbnail;
        return $this->default_thumbnail;
    }

    public function getPrettyTimeAttribute() {
        $dt = new Carbon($this->published_at);
        return $dt->diffForHumans();
    }

    public function getAtomTimeAttribute() {
        $dt = new Carbon($this->published_at);
        return $dt->tz('UTC')->toAtomString();
    }

    public function getAtomDurationAttribute() {
        $d = explode(':', $this->duration);
        $du = 'PT';
        if (count($d) === 3) {
            $du .= (int)array_shift($d) . 'H';
        }
        $du .= (int)array_shift($d) . 'M';
        $du .= (int)array_shift($d) . 'S';
        return $du;
    }

    public function getSecondsAttribute() {
        return $this->duration;
    }

    public function categories() {
        return $this->morphToMany(Category::class, 'categoriable');
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
