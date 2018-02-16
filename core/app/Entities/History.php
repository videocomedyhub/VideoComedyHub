<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class History extends Model implements Transformable
{
    use TransformableTrait;
    /**
     * @var string
     */
    protected $table = 'histories';

    protected $fillable = ['user_id', 'video_id', 'status'];
    
    public function user() {
        return $this->belongsTo(App\User::class);
    }
    
    public function video() {
        return $this->belongsTo(Video::class);
    }
    
    public function scopeWatched($query) {
        return $query->where('status', '1');
    }
    
    public function scopeLater($query) {
        return $query->where('status', '2');
    }

}
