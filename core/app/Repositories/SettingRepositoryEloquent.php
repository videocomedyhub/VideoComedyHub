<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SettingRepository;
use App\Entities\Setting;
use App\Validators\SettingValidator;
use Cache;

/**
 * Class SettingRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SettingRepositoryEloquent extends BaseRepository implements SettingRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Setting::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getYouTubeApi() {
        return $this->findByField('group', 'youtube-api');
    }

    public function getSocialLinks() {
        $that = $this;
        $links = Cache::remember('social_links', 5000, function()use ($that) {
                    $lks = $this->findByField('group', 'social-link', ['key', 'value']);
                    $links = [];
                    foreach ($lks as $l) {
                        $links[$l->key] = $l->value;
                    }
                    return $links;
                });
        return $links;
    }

}
