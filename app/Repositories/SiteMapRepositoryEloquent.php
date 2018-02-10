<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SiteMapRepository;
use App\Entities\SiteMap;
use App\Validators\SiteMapValidator;

/**
 * Class SiteMapRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SiteMapRepositoryEloquent extends BaseRepository implements SiteMapRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SiteMap::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
