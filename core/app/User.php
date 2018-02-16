<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\Access\Authorizable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable {

    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'username', 'password', 'region', 'active', 'confirmation_code',
        'confirmed', 'provider', 'provider_token', 'tagline', 'bio', 'avatar', 'facebook', 'linkedin', 'twitter', 'github', 'web', 'youtube'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPrettyTimeAttribute() {
        $dt = new Carbon($this->published_at);
        return $dt->toFormattedDateString();
    }

    public function favourites() {
        return $this->belongsToMany(Entities\Video::class, 'favourites');
    }

    public function channels() {
        return $this->belongsToMany(Entities\Channel::class)->withTimestamps();
    }

    public function categories() {
        return $this->belongsToMany(Entities\Category::class)->withTimestamps();
    }

    public function history() {
        return $this->belongsToMany(Entities\Video::class, 'histories')->withTimestamps();
    }

}
