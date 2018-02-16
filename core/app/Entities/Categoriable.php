<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Categoriable extends Model
{
    protected $fillable = ['category_id', 'categoriable_id', 'categoriable_type'];
}
