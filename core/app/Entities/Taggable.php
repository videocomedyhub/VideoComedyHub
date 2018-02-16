<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Taggable extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['tag_id', 'taggable_id', 'taggable_type'];

}
