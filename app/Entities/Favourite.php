<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Favourite extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['user_id', 'video_id'];
    
    public function user() {
        return $this->belongsTo(App\User::class);
    }
    
    public function video() {
        return $this->belongsTo(Video::class);
    }

}
