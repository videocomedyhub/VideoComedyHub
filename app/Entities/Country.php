<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Country extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode'];

}
