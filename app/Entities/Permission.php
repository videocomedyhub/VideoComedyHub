<?php

namespace App\Entities;

use Zizaco\Entrust\EntrustPermission;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Permission.
 *
 * @package namespace App\Entities;
 */
class Permission extends EntrustPermission implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

}
