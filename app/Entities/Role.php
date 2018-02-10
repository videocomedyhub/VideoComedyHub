<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\EntrustRole;
/**
 * Class Role.
 *
 * @package namespace App\Entities;
 */
class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

}
